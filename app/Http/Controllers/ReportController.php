<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Baptism;
use App\Models\Marriage;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('reports.index');
    }

    public function generateBaptismsReport(){
        //select all data from baptism model
        $baptisms = Baptism::all();

        //return pdf report with data
        return view('reports.baptism', compact('baptisms'));
    }

    public function generateMarriagesReport(){
        //select all data from baptism model
        $marriages = Marriage::all();

        //return pdf report with data
        return view('reports.marriage', compact('marriages'));

    }
    
    public function generateUsersReport(){

        //select all data from baptism model
        $users = User::all();

        //return pdf report with data
        return view('reports.user', compact('users'));

    }


    //function to generate pdf
    public function userpdf(){
        $user = User::all(); 
        $pdf = PDF::loadView('pdf.user_pdf', ['user' => $user]);
        smilify('success', 'PDF Downloaded');
        return $pdf->stream('Usersreport.pdf');
    }

    public function marriagepdf(){
        $marriage = Marriage::all(); 
        $pdf = PDF::loadView('pdf.marriage_pdf', ['marriage' => $marriage]);
        smilify('success', 'PDF Downloaded');
        return $pdf->stream('Marriagereport.pdf');
    }

    public function baptismpdf(){
        $baptism = Baptism::all(); 
        $pdf = PDF::loadView('pdf.baptism_pdf', ['baptism' => $baptism]);
        smilify('success', 'PDF Downloaded');
        return $pdf->stream('Baptismreport.pdf');
    }
}
