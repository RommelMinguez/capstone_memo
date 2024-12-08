<?php

namespace App\Http\Controllers;

use App\Models\CustomImage;
use App\Models\CustomOrder;
use App\Models\OrderNote;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\CustomOrderApproved;
use App\Notifications\CustomOrderCanceled;
use App\Notifications\CustomOrderPlaceOrder;
use App\Notifications\CustomOrderRejected;
use App\Notifications\CustomOrderStatusUpdated;
use App\Notifications\NewCustomCakeOrder;
use App\Notifications\OrderRejected;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CustomOrderController extends Controller
{
    public function create() {
        $tagGroups = Tag::all()->groupBy('category');
        $generatedImages = CustomImage::where('type', 'ai_generated')->orderBy('updated_at', 'desc')->limit(40)->get();

        return view('cakes.custom', compact('tagGroups', 'generatedImages'));
    }

    public function store(Request $request) {
        // dd(request()->all());
        $request->validate([
            'name' => 'required|string|max:255',
            // 'price' => 'required|numeric|min:0|max:999999.99',
            'description' => 'required|string',
            'age' => 'required|integer|min:1',
            'candle' => 'required|string|max:255',
            'dedication' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'additional-image.*' => 'nullable|image|max:10240',
            'imageInput' => 'nullable|image|max:10240',
        ]);

        // Check if `imageInput` exists; otherwise, use `ai_generated_image`
        $imagePath = null;
        if ($request->hasFile('imageInput')) {
            $imagePath = $request->file('imageInput')->store('public/images/custom-order');
        } else {
            $customImage = CustomImage::find($request->input('ai_generated_image'));
            if ($customImage) {
                $imagePath = $customImage->path;
            } else {
                throw ValidationException::withMessages([
                    'image' => 'No uploaded image or AI image found.',
                ]);
            }
        }

        // Create a record in the CustomOrder table
        $customOrder = CustomOrder::create([
            'image_src' => $imagePath,
            'cake_name' => $request->input('name'),
            // 'budget' => $request->input('price'),
            'description' => $request->input('description'),
            'age' => $request->input('age'),
            'candle_type' => $request->input('candle'),
            'dedication' => $request->input('dedication'),
            'quantity' => $request->input('quantity'),
            'status' => 'new',
            'user_id' => auth()->id(),
        ]);

        // Store additional images in CustomImage table
        $files = request()->file('additional-image');
        if (!empty($files)) {
            foreach ($files as $file) {
                $pathAdditional = $file->store('public/images/additional');
                CustomImage::create([
                    'type' => 'additional',
                    'path' => $pathAdditional,
                    'custom_order_id' => $customOrder->id,
                    'user_id' => auth()->id(),
                ]);
            }
        }

        // Sync tags with the CustomOrder
        if ($request->has('selected-tag')) {
            $customOrder->tags()->sync($request->input('selected-tag'));
        }

        // notification
        $user = User::where('is_admin', true)->first();
        $details = [
            'item_id' => $customOrder->id
        ];
        $user->notify(new NewCustomCakeOrder($details));


        session(['customOrder' => $customOrder->id, 'customOrderUser' => Auth::user()->id]);
        return redirect('/cakes/custom/order')->with('success', 'Please add Your Details!');
    }


    // CUSTOMER
    public function trackCustom () {
        $customOrders = Auth::user()->customOrders()->with('tags', 'customImages')->orderBy('updated_at', 'desc')->get()->groupBy('status');;
        return view('user.track-custom', compact('customOrders'));
    }

    public function trackCustomCancelOrder(CustomOrder $order) {
        // dd($order);

        if ($order->status == 'new' || $order->status == 'approved' || $order->status == 'pending') {
            $order->update([
                'status' => 'canceled'
            ]);

            // notification
            $user = User::where('is_admin', true)->first();
            $details = [
                'item_id' => $order->id
            ];
            $user->notify(new CustomOrderCanceled($details));


            return redirect('/user/custom-order')->with('success', 'Order Canceled Successfully.');
        }
        return redirect('/user/custom-order')->with('error', 'Something Went Wrong');
    }
    public function trackCustomPlaceOrder(CustomOrder $order) {
        // dd($order);

        if ($order->status == 'approved') {
            $order->update([
                'status' => 'pending'
            ]);

            // notification
            $user = User::where('is_admin', true)->first();
            $details = [
                'item_id' => $order->id
            ];
            $user->notify(new CustomOrderPlaceOrder($details));

            return redirect('/user/custom-order')->with('success', 'Order is now in queue to bake.');
        }
        return redirect('/user/custom-order')->with('error', 'Something Went Wrong');
    }



    function orderDetailsCreate() {
        if(!session('customOrder') || !(session('customOrderUser') == Auth::user()->id)) {
            return redirect('/cakes')->with('error', "403 FORBIDDEN: custom order doesn't exist.");
        }

        $item = CustomOrder::find(session('customOrder'));

        return view('cakes.order', compact('item'));
    }
    function orderDetailsUpdate(CustomOrder $order) {

        // dd(request()->all());

        request()->validate([
            'delivery_date' => ['required', 'date', 'after_or_equal:today'],
            'delivery_time' => ['required', 'date_format:H:i'],
            'payment_method' => ['required'],
            'address_id' => ['nullable', 'required_if:payment_method,cash on DELIVERY']
        ]);

        $datetime = request()->delivery_date . ' ' . request()->delivery_time . ':00';

        $order->update([
            'prefered_datetime' => $datetime,
            'payment_method' => request()->payment_method,
            'address_id' => request()->address_id
        ]);

        return redirect('/user/custom-order')->with('success', 'Custom order created successfully!');;
    }






    // ADMIN
    public function manageCustom () {
        $customOrders = CustomOrder::with('tags', 'customImages', 'user')->orderBy('updated_at', 'desc')->get();

        return view('user.admin.manage-custom', compact('customOrders'));
    }

    public function show(CustomOrder $order) {
        $order->load('tags', 'customImages', 'user');

        return response()->json($order);
    }

    public function approvedUpdate(CustomOrder $order) {
        // dump($order);
        // dd(request()->all());

        $validatedData = request()->validate([
            // 'response_status' => 'required|string',
            'given_price' => 'required|numeric',
            'note' => 'required|string'
        ]);

        if ($order->status == 'new') {
            $order->update([
                'status' => 'approved',
                'given_price' => $validatedData['given_price'],
                'given_note' => $validatedData['note']
            ]);

            // OrderNote::create([
            //     'note_message' => $validatedData['note'],
            //     'type' => 'approved-custom-order',
            //     'user_id' => Auth::user()->id,
            //     'custom_order_id' => $order->id
            // ]);


            // notification
            $user = $order->user;
            $details = [
                'item_id' => $order->id,
                'given_price' => $validatedData['given_price'],
                'given_note' => $validatedData['note']
            ];
            $user->notify(new CustomOrderApproved($details));

            return redirect('/admin/custom')->with('success', 'New Design Approved.');
        }
        return redirect('/admin/custom')->with('error', '403 FORBIDDEN: Order was Changed or Canceled');
    }
    public function rejectedUpdate(CustomOrder $order) {
        // dump($order);
        // dd(request()->all());

        if ($order->status == 'new') {
            $order->update([
                'status' => 'rejected',
            ]);

            // notification
            $user = $order->user;
            $details = [
                'item_id' => $order->id
            ];
            $user->notify(new CustomOrderRejected($details));

            return redirect('/admin/custom')->with('success', 'New Design Rejected.');
        }
        return redirect('/admin/custom')->with('error', '403 FORBIDDEN: Order was Changed or Canceled');
    }



    public function statusUpdate(CustomOrder $order) {
        $order->update([
            'status' => request()->item,
        ]);

        // notification
        $user = $order->user;
        $details = [
            'item_id' => $order->id,
            'status' => $order->status
        ];
        $user->notify(new CustomOrderStatusUpdated($details));

        return response()->json(['is_success' => 'true', 'status' => request()->item]);
    }
}

