<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;

use Illuminate\Http\Request;

class AdminContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        $productCount = Product::count();
        $orders = order::all();
        $pendapatan = $orders->sum('total');
        if (auth()->user()->role == 0) {

            $role = 'users';
        } else {

            $role = 'admin';
        }

        // Kirim data produk ke tampilan "product.home"
        return view('admin.home', compact('products','role','productCount', 'pendapatan'));
    }
 
    //
}
