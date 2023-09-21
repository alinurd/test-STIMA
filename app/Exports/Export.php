<?php

namespace App\Exports;

use App\Models\order;


use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class Export implements FromView
{ 

    public function view(): View
    {
        $auth = auth()->user();
        $id = $auth->id;
        $role = $auth->role;
        if ($role == 1) {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', $id)->get();
        }

        if ($orders->count() > 0) {
            foreach ($orders as $order) {
                $product = $order->order_product;
                $user = $order->order_user;
                if ($product) {
                    // dd($product);

                    $order->productName = $product->name;
                }
                if ($user) {
                    // dd($user);

                    $order->userName = $user->name;
                }
            }
        }
        return view('export', compact('orders'));

      
    }
     
}
