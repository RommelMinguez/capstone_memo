<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cart = Cart::with('cartItems.cake')
            ->firstOrCreate(
                [
                    'user_id' => Auth::user()->id,
                    'status' => 'open'
                ]
            );

       // $cart = Auth::user()->carts()->where('status', '=', 'open')->with('cartItems.cake')->first();
        return view('user.cart', ['cart' => $cart]);
    }



    public function store()
    {
        if (!Auth::check()) {
            return redirect()->guest(route('login'))->with('url.intented', url()->current());
        }

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
                'status' => 'open'
            ]
        );

        $cart->cartItems()->create(
            [
                'cake_id' => request()->cake_id,
                'quantity' => request()->quantity,
                'age' => request()->age,
                'candle_type' => request()->candle,
                'dedication' => request()->dedication
            ]
        );

        return redirect('cakes/'.request('cake_id'))->with('showModal', true);
    }



    public function remove()
    {
        $cart = Cart::firstOrCreate(
            [
                'user_id' => Auth::user()->id,
                'status' => 'remove'
            ]
        );

        CartItem::find(request('item_id'))->update([
            'cart_id' => $cart->id
        ]);

        return redirect('/user/cart');
    }


    public function update(Cart $cart)
    {
        $validatedData = request()->validate([
            'age' => ['required', 'integer', 'min:0', 'max:150'],
            'candle_type' => ['required'],
            'dedication' => ['required'],
            'quantity' => ['required', 'integer', 'min:1', "max:99"],
            'id' => ['required'],
        ]);

        $item = CartItem::find(request()->id);

        if ($item->cart->user_id !== Auth::user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $item->update($validatedData);

        return response()->json(['success' => true]);
    }

    public function checkOut() {
        session(['order' => request()->order]);
        // return redirect('/user/order')->with('order', request()->order);
        return redirect('/user/order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
