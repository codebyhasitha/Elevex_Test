<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\purchaseOrder;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PurchaseOrderExport implements FromCollection, WithHeadings
{
    protected $purchaseOrders;

    public function __construct($purchaseOrders)
    {
        $this->purchaseOrders = $purchaseOrders;
    }

    public function collection()
    {
        return $this->purchaseOrders->map(function ($purchaseOrder) {
            // dd($purchaseOrder);
            return [
                'PO Number' => $purchaseOrder->id,
                'Zone' => $purchaseOrder->zone->longdescription	,         
                'Region' => $purchaseOrder->region->region_name,     
                'Territory' => $purchaseOrder->territory->territory_name, 
                'Distributor' => $purchaseOrder->distributor->name, 
                'Date' => $purchaseOrder->date, 
                'remark' => $purchaseOrder->remark, 
                'Total' => $purchaseOrder->total, 
                'Invoice Number' => $purchaseOrder->invoice_number, 
                
            ];
        });
    }


    public function headings(): array
    {
        return ['PO Number', 'Zone','Region ID', 'Territory ID', 'Distributor ID', 'Date', 'Remark', 'Total', 'Invoice Number'];
    }
  
}   
