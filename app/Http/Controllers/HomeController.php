<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Product::all();
         if (auth()->user()->role == 0){

             $role = 'users'; 
         }
        else{

            $role = 'admin';  
        }
         
        // Kirim data produk ke tampilan "product.home"
        return view('home', compact('products', 'role'));    }
}
