<?php

namespace App\Http\Controllers;

use App\Models\freeIssue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Sku;

class freeIssueController extends Controller
{
    /**
     * Display a listing of the resource.git push origin master

     */
    public function index()
    {
        // $freeIssues = freeIssue::all(); 
        $freeIssues = freeIssue::with('Sku')->get(); 
        return view('freeIssue.freeIssue_view', compact('freeIssues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = sku::all();
        return view('freeIssue.freeIssue', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $freeIssue = new freeIssue();
        $freeIssue->freeissue_name = $request->freeissue_name;
        $freeIssue->freeissue_type = $request->freeissue_type;
        $freeIssue->purchse_product = $request->purchse_product;
        $freeIssue->free_prodcut = $request->free_prodcut;
        $freeIssue->purchase_Quantity = $request->purchase_Quantity;
        $freeIssue->Free_Quantity = $request->Free_Quantity;
        $freeIssue->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(freeIssue $freeIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(freeIssue $freeIssue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, freeIssue $freeIssue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(freeIssue $freeIssue)
    {
        //
    }
}
