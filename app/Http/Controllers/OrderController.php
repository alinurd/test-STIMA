<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id)
    {

        $data = Product::find($id);
        // dd($data);
        // Periksa apakah produk ditemukan
        if (!$data) {
            return redirect()->route('users.index')->with('error', 'Produk tidak ditemukan');
        }

        return view('product.form', compact('id', 'data'));
    }



    public function store(Request $request)
    {
        dd($request);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:500',
            'price' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);
        $validatedData['created_at'] = Carbon::now();
        $validatedData['created'] = auth()->user()->name;
        $validatedData['update'] = '';
        $validatedData['img'] = '';


        if ($request->hasFile('image')) {
            // Mendapatkan file gambar dari input
            $image = $request->file('image');

            // Menyimpan gambar dengan nama unik ke direktori tertentu (misalnya, storage/app/public/images)
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            // Menyimpan nama gambar ke dalam database
            $validatedData['img'] = $imageName;
        }


        Order::create($validatedData);

        session()->flash('success', 'order created successfully');
        return redirect()->route('orders.index')->with('success', 'order created successfully');
        // return redirect('/admin/order')->with('success', 'order created successfully');
    }
}
