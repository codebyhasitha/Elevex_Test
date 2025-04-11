<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PurchaseOrderExport;    
use App\Models\PurchaseOrder;
use App\Models\Sku;

class ExportController extends Controller
{
    
    public function exportExcel(Request $request)
    {
        $query = PurchaseOrder::query();

        if ($request->filled('region_id')) {
            $query->where('region_id', $request->region_id);
        }

        if ($request->filled('territory_id')) {
            $query->where('territory_id', $request->territory_id);
        }

        if ($request->filled('po')) {
            $query->where('po_number', 'like', '%' . $request->po . '%');
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('date', [$request->from_date, $request->to_date]);
        }

        $data = $query->get();

        return Excel::download(new PurchaseOrderExport($data), 'purchase_orders.xlsx');
    }

    public function exportPdf(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'region_id' => 'nullable|integer',
            'territory_id' => 'nullable|integer',
            'po' => 'nullable|string',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
        ]);

        // Build the query to get the filtered data
        $data = PurchaseOrder::query()
            ->when($validated['region_id'], fn($q) => $q->where('region_id', $validated['region_id']))
            ->when($validated['territory_id'], fn($q) => $q->where('territory_id', $validated['territory_id']))
            ->when($validated['po'], fn($q) => $q->where('po_number', 'LIKE', '%' . $validated['po'] . '%'))
            ->when($validated['from_date'] && $validated['to_date'], fn($q) =>
                $q->whereBetween('date', [$validated['from_date'], $validated['to_date']])
            )
            ->get();

        $pdf = Pdf::loadView('exports.purchase_orders_pdf', ['data' => $data]);

        return $pdf->download('purchase_orders.pdf');
    }

    public function printInvoiceBulk(Request $request)
{
    $validated = $request->validate([
        'region_id' => 'nullable|integer',
        'territory_id' => 'nullable|integer',
        'po' => 'nullable|string',
        'from_date' => 'nullable|date',
        'to_date' => 'nullable|date',
    ]);

    // Fetch the purchase orders based on the filter parameters
    $data = PurchaseOrder::with(['zone', 'region', 'territory', 'distributor'])
        ->when($request->input('region_id'), fn($q) => $q->where('region_id', $request->input('region_id')))
        ->when($request->input('territory_id'), fn($q) => $q->where('territory_id', $request->input('territory_id')))
        ->when($request->input('po'), fn($q) => $q->where('po_number', 'LIKE', '%' . $request->input('po') . '%'))
        ->when($request->input('from_date') && $request->input('to_date'), fn($q) =>
            $q->whereBetween('date', [$request->input('from_date'), $request->input('to_date')])
        )
        ->get();

    // Pass the data to the view
    return view('print.Invoice_Print', compact('data'));
}

}
