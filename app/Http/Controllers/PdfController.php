<?php

namespace App\Http\Controllers;

use App\Models\Baptism;
use App\Models\Marriage;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfController extends Controller
{
    //

    public function generatePdf($id)
    {
        // Retrieve data for the specific baptism record
        $baptism = Baptism::findOrFail($id);

        // Load the view and pass the data
        // $pdf = PDF::loadView('pdf.baptism', ['baptism' => $baptism]);
        $pdf = PDF::loadView('pdf.baptism', ['baptism' => $baptism]);
        $pdf->setPaper('a4', 'landscape');

        
        //create a name
        $userName = $baptism->name;
        $pdf->setOption('title', $userName);
        $currentDate = now()->format('Y-m-d'); // Get the current date
        // Combine user name and date for the filename
        $filename = $userName . '_' . $currentDate . '.pdf'; // Create a filename with the user name and current date
        $fileName = str_replace(" ", "-", $filename);
        smilify('success', 'PDF Downloaded');
        // Download the PDF
        return $pdf->download($fileName);
    }

    //generate pdf for marriage model
    public function generatemarriagePdf($id)
{
    // Retrieve data for the specific baptism record
    $marriage = Marriage::findOrFail($id);
    // create a qrcode image
        // Load the view and pass the data
    // $pdf = PDF::loadView('pdf.baptism', ['baptism' => $baptism]);
    $pdf = PDF::loadView('pdf.marriage', ['marriage' => $marriage,]);


    
    //create a name
    $userName = $marriage->bride_first_name." ".$marriage->bride_last_name."&".$marriage->groom_first_name." ".$marriage->groom_last_name;
    $pdf->setOption('title', $userName);
    $currentDate = now()->format('Y-m-d'); // Get the current date
     // Combine user name and date for the filename
    $filename = 'Marriage_Cert_'.$userName . '_' . $currentDate . '.pdf'; // Create a filename with the user name and current date
    $fileName = str_replace(" ", "-", $filename);
    
    smilify('success', 'PDF Downloaded');

    // Download the PDF
    return $pdf->download($fileName);
}

}
