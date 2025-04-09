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
            // dd($request->all());
            $region_id = $request->get('region_id');
            $territory = $request->get('territory');
            $po_number = $request->get('po_number');
            // $from_date = $request->get('from_date');
            // $to_date = $request->get('to_date');

            $query = PurchaseOrder::query();

            if ($region_id) {
                $query->where('region_id', $region_id);
            }
            if ($territory) {
                $query->where('territory_id', $territory);
            }
            if ($po_number) {
                $query->where('po_number', $po_number);
            }
            // if ($from_date && $to_date) {
            //     $query->whereBetween('date', [$from_date, $to_date]);
            // }

            $data = $query->get();

            return Excel::download(new PurchaseOrderExport($data), 'purchase_orders.xlsx');
        }

    public function exportPDF()
    {
        $purchaseOrders = PurchaseOrder::with(['zone', 'region', 'territory', 'distributor','purchaseOrder'])->get();
        // dd($purchaseOrders);
        $pdf = Pdf::loadView('exports.purchase_orders_pdf', compact('purchaseOrders'));

        return $pdf->download('purchase_orders.pdf');
    }

    public function printInvoiceBulk()
    {
        $purchaseOrders = PurchaseOrder::with(['zone', 'region','territory','distributor',   ])->get();;
            //  dd($purchaseOrders);
        return view("print.Invoice_Print", compact('purchaseOrders'));
    }
    
}
