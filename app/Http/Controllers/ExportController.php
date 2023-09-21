<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\Export;
use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new Export, 'Export-data-order.xlsx');
    }
}
