<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function generate(Request $request)
    {
        $data = [
            'to' => 'Sam Example',
            'subtotal' => '5.00',
            'tax' => '.35',
            'total' => '5.35'
        ];

        $pdf = Pdf::loadView('invoice', $data);

        # Option 1) Show the PDF in the browser
        return $pdf->stream();

        # Option 2) Download the PDF
        return $pdf->download('invoice.pdf');
    }
}