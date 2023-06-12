<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Usuario;
use pdf;

class pdfController extends Controller
{
    public function gerapdf(){
    
        $investimentos = Usuario::all();

        $pdf = PDF::loadView('pdf', compact('investimentos'));

        
        return $pdf->setPaper('a4')->stream('investimentos_cadastrados.pdf');

    }
      
}
