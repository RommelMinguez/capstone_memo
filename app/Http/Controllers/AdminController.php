<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        // $countPerStatus = OrderItem::select('status', DB::raw('count(*) as total'))
        //     ->groupBy('status')
        //     ->pluck('total', 'status')
        //     ->toArray();
        // $statusArr = ['pending', 'baking', 'ready', 'completed', 'canceled'];
        // $totalOrder = null;

        // foreach($statusArr as $status) {
        //     if (!array_key_exists($status, $countPerStatus)) {
        //         $countPerStatus[$status] = 0;
        //     }
        //     if($status != 'canceled') {
        //         $totalOrder += $countPerStatus[$status];
        //     }
        // }

        $countPerStatus = Order::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status');

        $totalOrder = Order::count();

        $bestSeller = OrderItem::join('cakes', 'order_items.cake_id', '=', 'cakes.id')
            ->select('cakes.id', 'cakes.name', DB::raw('COUNT(order_items.cake_id) as total_orders'))
            ->groupBy('cakes.id', 'cakes.name')
            ->orderBy('total_orders', 'DESC')
            ->first();

        $income = Order::whereIn('status', ['completed', 'review'])->sum('total');

        $latestOrders = OrderItem::with('order.user', 'cake')->latest()->limit(10)->get();

        return view('user.admin.dashboard', [
            'statusCount' => $countPerStatus,
            'totalOrder' => $totalOrder,
            'bestSeller' => $bestSeller,
            'income' => $income,
            'latestOrders' => $latestOrders
        ]);
    }


    public function manageOrders() {

        $all = OrderItem::latest()->with('cake', 'order.user', 'order.address', 'order.orderItems.cake')->get();

        return view('user.admin.manage-orders', [
            'allOrders' => $all,
        ]);
    }

    public function updateStatus(OrderItem $item) {
        $updated = $item->update([
            'status' => request()->item,
        ]);

        return response()->json(['is_success' => $updated, 'status' => request()->item]);
    }
    public function showOrder(OrderItem $item) {
        $all = OrderItem::with('cake', 'order.user', 'order.address', 'order.orderItems.cake')->find($item->id);
        // $all = OrderItem::latest()->with('cake');

        return response()->json($all);
    }
}
