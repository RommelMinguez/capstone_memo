<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\CustomOrder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Notifications\OrderStatusUpdated;
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

        $countPerStatus_custom = CustomOrder::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status');

        $totalOrder_custom = CustomOrder::count();

        return view('user.admin.dashboard', [
            'statusCount' => $countPerStatus,
            'totalOrder' => $totalOrder,
            'bestSeller' => $bestSeller,
            'income' => $income,
            'latestOrders' => $latestOrders,
            'statusCount_custom' => $countPerStatus_custom,
            'totalOrder_custom' => $totalOrder_custom
        ]);
    }


    public function manageOrders() {
        $all = OrderItem::latest()->with('cake', 'order', 'order.user', 'order.address', 'order.orderItems.cake')->get();
        return view('user.admin.manage-orders', [
            'allOrders' => $all,
        ]);
    }

    public function updateStatus(Order $order) {
        DB::transaction(function () use ($order) {
            $order->update([
                'status' => request()->item,
            ]);
            $order->orderItems()->update([
                'status' => request()->item,
            ]);
        });

        $user = $order->user;
        $details = [
            'item_id' => $order->id,
            'status' => $order->status,
        ];
        $user->notify(new OrderStatusUpdated($details));

        return response()->json(['is_success' => 'true', 'status' => request()->item]);
    }
    public function showOrder(OrderItem $item) {
        $all = OrderItem::with('cake', 'order.user', 'order.address', 'order.orderItems.cake')->find($item->id);
        // $all = OrderItem::latest()->with('cake');

        return response()->json($all);
    }

    public function showSales() {
        $salesData = Order::selectRaw('YEAR(updated_at) as year, MONTH(updated_at) as month, DAY(updated_at) as day, SUM(total) as total_sales')
            ->where('status', 'completed')
            ->groupByRaw('YEAR(updated_at), MONTH(updated_at), DAY(updated_at)')
            ->orderByRaw('YEAR(updated_at), MONTH(updated_at), DAY(updated_at)')
            ->get()
            ->groupBy(fn ($item) => $item->year . '_' . $item->month)
            ->sortByDesc(fn ($group, $key) => $key);

        $totalSales = Order::where('status', 'completed')->sum('total');

        $topCakes = Cake::with(['orderItems' => function ($query) {
                $query->whereNotIn('status', ['canceled', 'rejected']);
            }])
            ->select('cakes.name', 'cakes.price', 'cakes.image_src', DB::raw('SUM(order_items.quantity) as total_quantity, SUM(order_items.sub_total) as total_sales'))
            ->join('order_items', 'cakes.id', '=', 'order_items.cake_id')
            ->whereNotIn('order_items.status', ['canceled', 'rejected'])
            ->groupBy('cakes.id', 'cakes.name', 'cakes.price', 'cakes.image_src')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();

        $topCustomers = User::with(['orders' => function ($query) {
                $query->whereNotIn('status', ['canceled', 'rejected']);
            }])
            ->select('users.first_name', 'users.last_name', 'users.email', 'users.image_src', DB::raw('COUNT(orders.id) as order_count'))
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->whereNotIn('orders.status', ['canceled', 'rejected'])
            ->groupBy('users.id', 'users.first_name', 'users.last_name', 'users.email', 'users.image_src')
            ->orderByDesc('order_count')
            ->limit(10)
            ->get();


        // dd($topCustomers);
        return view('user.admin.sales', compact(
            'salesData',
            'totalSales',
            'topCakes',
            'topCustomers'
        ));
    }
}
