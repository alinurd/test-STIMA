<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth = auth()->user();
        $id = $auth->id;
        $products = Product::all();
        $orders = Order::where('user_id', $id)->get();

        $orderCount = $orders->count();
        $pendapatan = $orders->sum('total');
        if (auth()->user()->role == 0) {

            $role = 'users';
        } else {

            $role = 'admin';
        }

        // Kirim data produk ke tampilan "product.home"
        return view('user.home', compact('products', 'role', 'orderCount', 'pendapatan'));
     }
}