<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\purchaseOrder; 
use App\Models\rregion; 
use Excel;  

class SalesController extends Controller
{
    public function generatePDF ()
    {
            return PurchaseOrder::all(); 
    }
}   
