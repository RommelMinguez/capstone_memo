<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!session('order')) {
            return redirect('user/cart');
        }

        $items = CartItem::whereIn('id', session('order'))->with('cake')->get();

        return view('user.order', [
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        //validate order
        request()->validate([
            'delivery_date' => ['required', 'date', 'after_or_equal:today'],
            'delivery_time' => ['required', 'date_format:H:i'],
            //'address' => ['required'],
            'payment_method' => ['required'],
            'total' => ['required', 'numeric']
        ]);

        //get the items in order
        $items = CartItem::whereIn('id', request()->items)->with('cake')->get();

        //create an order record
        $order = Order::create([
            'user_id' => Auth::user()->id,
            //'status' => 'pending',
            'total' => request()->total,
            'prefered_date' => request()->delivery_date,
            'prefered_time' => request()->delivery_time,
            'address' => 'temporary address placeholdeer',
            'payment_method' => request()->payment_method,
        ]);

        //create an order_item record/s and update the cart_item status
        $checkOutCart = Cart::firstOrCreate(
            [
                'user_id' => Auth::user()->id,
                'status' => 'check-out'
            ]
        );
        $abandonedCart = Cart::firstOrCreate(
            [
                'user_id' => Auth::user()->id,
                'status' => 'abandoned'
            ]
        );
        $buyNowCart = Cart::firstOrCreate(
            [
                'user_id' => Auth::user()->id,
                'status' => 'buy-now'
            ]
        );

        foreach ($items as $item) {
            $order->orderItems()->create([
                'cake_id' => $item->cake->id,
                'status' => 'pending',
                'quantity' => $item->quantity,
                'age' => $item->age,
                'candle_type' => $item->candle_type,
                'dedication' => $item->dedication,
                'price' => $item->cake->price,
                'sub_total' => $item->cake->price * $item->quantity
            ]);

            if ($items[0]->cart_id == $abandonedCart->id) {
                $item->update([
                    'cart_id' => $buyNowCart->id,
                ]);
            } else {
                $item->update([
                    'cart_id' => $checkOutCart->id,
                ]);
            }
        }

        //redirect to user dashboard
        session()->forget('order');

        if (Auth::user()->is_admin) {
            return redirect('/admin')->with('success', 'You have place an Order Successfully');
        }

        return redirect('/user')->with('success', 'Your Order in now waiting for Confirmation');
    }

    public function buyNow()
    {
        request()->validate([
            'age' => ['required', 'integer', 'min:0', 'max:150'],
            'candle' => ['required'],
            'dedication' => ['required'],
            'quantity' => ['required', 'integer', 'min:1', "max:99"],
            'cake_id' => ['required'],
        ]);

        $cart = Cart::firstOrCreate(
            [
                'user_id' => Auth::user()->id,
                'status' => 'abandoned'
            ]
        );

        $order = $cart->cartItems()->create(
            [
                'cake_id' => request()->cake_id,
                'quantity' => request()->quantity,
                'age' => request()->age,
                'candle_type' => request()->candle,
                'dedication' => request()->dedication
            ]
        );

        session(['order' => [$order->id]]);
        return redirect('/user/order');
    }
}
