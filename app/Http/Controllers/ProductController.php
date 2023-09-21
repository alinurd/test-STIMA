<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Carbon;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();

        // Kirim data produk ke tampilan "product.home"
        return view('product.home', compact('products'));
        
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // dd();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:500',
            'price' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);
        $validatedData['created_at'] = Carbon::now();
        $validatedData['created'] = auth()->user()->name;
        $validatedData['update'] ='';
        // Simpan data produk ke dalam tabel "products" menggunakan model
        Product::create($validatedData);
        
        session()->flash('success', 'Product created successfully');
        return redirect()->route('products.index')->with('success', 'Product created successfully');
        // return redirect('/admin/product')->with('success', 'Product created successfully');
    }



}
