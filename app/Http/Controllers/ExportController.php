<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\Export;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;
use Dompdf\Options;
class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new Export, 'Export-data-order.xlsx');
    }

    public function export_pdf()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Generate the PDF content (replace with your HTML content)
        $html = '<html><body><h1>Hello, PDF!</h1></body></html>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF (optional: you can save it to a file)
        $dompdf->render();

        // Stream the PDF to the browser for download
        return $dompdf->stream('document.pdf');
    }
}
