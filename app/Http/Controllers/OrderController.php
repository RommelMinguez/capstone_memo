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
            'status' => 'pending',
            'total' => request()->total,
            'prefered_date' => request()->delivery_date,
            'prefered_time' => request()->delivery_time,
            'address' => 'temporary address placeholdeer',
            'payment_method' => request()->payment_method,
        ]);

        //create an order_item record/s and update the cart_item status
        $cart = Cart::firstOrCreate(
            [
                'user_id' => Auth::user()->id,
                'status' => 'check-out'
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
            $item->update([
                'cart_id' => $cart->id,
            ]);
        }

        //redirect to user dashboard
        session()->forget('order');
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
