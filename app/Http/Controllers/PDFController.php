<?php

namespace App\Http\Controllers;

use PDF;
use App\Reservation;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function download(Reservation $reservation)
    {
        // $pdf = PDF::loadView('pdf.invoice', compact('reservation'));
        
        // return $pdf->download('invoice.pdf');

        return view('pdf.invoice', compact('reservation'));
    }
}
