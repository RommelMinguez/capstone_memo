<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $countPerStatus = OrderItem::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();
        $statusArr = ['pending', 'baking', 'receive', 'review', 'completed', 'canceled'];
        $totalOrder = null;

        foreach($statusArr as $status) {
            if (!array_key_exists($status, $countPerStatus)) {
                $countPerStatus[$status] = 0;
            }
            if($status != 'canceled') {
                $totalOrder += $countPerStatus[$status];
            }
        }

        $bestSeller = OrderItem::join('cakes', 'order_items.cake_id', '=', 'cakes.id')
            ->select('cakes.id', 'cakes.name', DB::raw('COUNT(order_items.cake_id) as total_orders'))
            ->groupBy('cakes.id', 'cakes.name')
            ->orderBy('total_orders', 'DESC')
            ->first();


        $income = OrderItem::sum('sub_total') - OrderItem::where('status', 'canceled')->sum('sub_total');

        $latestOrders = OrderItem::with('order.user', 'cake')->latest()->limit(10)->get();

        return view('user.admin.dashboard', [
            'statusCount' => $countPerStatus,
            'totalOrder' => $totalOrder,
            'bestSeller' => $bestSeller,
            'income' => $income,
            'latestOrders' => $latestOrders
        ]);
    }
}
