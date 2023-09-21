<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\Export;
use App\Models\order;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\PDF;
class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new Export, 'Export-data-order.xlsx');
    }
    public function export_pdf(PDF $pdf)
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
                    $order->productName = $product->name;
                }

                if ($user) {
                    $order->userName = $user->name;
                }
            }

            // Generate and return the PDF here
            $pdf->loadView('export', [
                'orders' => $orders,
            ]);

            return $pdf->download('export-data-order.pdf');
        }

        return view('export', compact('orders'));
    }

}
