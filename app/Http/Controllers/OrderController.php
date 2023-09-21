<?php

namespace App\Http\Controllers;

use App\Mail\kirimemail;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
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
        // dd($orders);
        if (auth()->user()->role == 0) {
            $role = 'users';
        } else {

            $role = 'admin';
        }
        return view('order.home', compact('orders', 'role'));
    }
    public function create($id)
    {

        $data = Product::find($id);
        // dd($data);
        // Periksa apakah produk ditemukan
        if (!$data) {
            return redirect()->route('users.index')->with('error', 'Produk tidak ditemukan');
        }

        return view('order.form', compact('id', 'data'));
    }



    public function store(Request $request)
    {
        // dd(auth()->user()->id);
        $product = Product::findOrFail($request->product_id);

        // dd($product);
        $cekstok = false; // Initialize cekstok to false

        if ($product) {
            if ($product->stok >= $request->qty) { // Check if stock is sufficient
                $product->stok = $product->stok - $request->qty;
                $cekstok = true;
            }
        }

        if ($cekstok) { // Only proceed if stock is sufficient
            $validatedData = $request->validate([
                'price' => 'required|numeric',
                'total' => 'required|numeric',
                'product_id' => 'required|numeric',
                'qty' => 'required|numeric',
            ]);

            $validatedData['created_at'] = Carbon::now();
            $validatedData['user_id'] = auth()->user()->id;

            $ordercek = Order::create($validatedData);

            if ($ordercek) {
                $product->save(); // Save the updated stock
                Mail::to(auth()->user()->email)->send(new kirimemail($ordercek->code_id, $product->name ));

            }

            // dd('stok success');
            // session()->flash('success', 'Order created successfully');
            return redirect()->route('order.index')->with('success', 'Order created successfully');
        } else {

            // dd('stok tidak cukup');
            Mail::to(auth()->user()->email)->send(new kirimemail(null, $product->name));

            session()->flash('error', 'Stok product tidak cukup');
            return redirect()->route('home')->with('error', 'Stok product tidak cukup');
        }

        // return redirect('/admin/order')->with('success', 'order created successfully');
    }
}
