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
        return view('product.form');
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


          Product::create($validatedData);
        
        session()->flash('success', 'Product created successfully');
        return redirect()->route('products.index')->with('success', 'Product created successfully');
        // return redirect('/admin/product')->with('success', 'Product created successfully');
    }

     public function edit($id)
    { 
        
        $data = Product::find($id);
// dd($data);
        // Periksa apakah produk ditemukan
        if (!$data) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan');
        }

        return view('product.form', compact('id', 'data'));
    }



    public function update(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:500',
            'price' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        // Mengambil data produk yang akan diperbarui
        $product = Product::findOrFail($id);

        // Mengunggah gambar jika ada
        if ($request->hasFile('image')) {
            // Mengambil file gambar dari input
            $image = $request->file('image');

            // Menyimpan gambar dengan nama unik ke direktori tertentu (misalnya, storage/app/public/images)
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            // Memperbarui nama gambar dalam database
            $product->img = $imageName;
            $validatedData['img'] = $imageName;

        }

        // Memperbarui data produk
        $product->name = $validatedData['name'];
        $product->desc = $validatedData['desc'];
        $product->price = $validatedData['price'];
        $product->stok = $validatedData['stok'];

        // Tambahkan log waktu update dan user yang melakukan update
        $product->updated_at = Carbon::now();
        $product->update = auth()->user()->name;

        $product->save();

        // Setelah berhasil memperbarui, berikan notifikasi atau redirect ke halaman yang sesuai
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {

        $product = Product::findOrFail($id);

        if ($product != '') {
            $product->delete();
            $status = 'success';
         }

        return redirect()->route('products.index')->with('success', 'Product Delete successfully');



        // return redirect()->back()->with($status, $message);
    }

}
