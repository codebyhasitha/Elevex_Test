<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Models\Sku;
use App\Models\tterritory;
use App\Models\zone;
use App\Models\rregion;
use App\Models\user;
use App\Models\purchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\territory;
use App\Models\freeIssue;


use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    // public function applyfreeissue($request){
    //     $freeIssues = freeIssue::all();
    //     $purchaseorderitems = PurchaseOrderItem::all();
    //     $skus = sku::all();
    //     // $sku=Sku::where('id',$request->pro_iid)->select('units','mrp')->first();

    //     // dd($request);
    //     foreach ($freeIssues as $freeIssue) {
    //         $freeIssueid = $freeIssue->id;
    //         $freeissue_type = $freeIssue->freeissue_type;
    //         $purchse_product = $freeIssue->purchse_product;
    //         $purchase_Quantity = $freeIssue->purchase_Quantity;
    //         $Free_Quantity = $freeIssue->Free_Quantity;
    //     }     

    //     foreach ($purchaseorderitems as $purchaseorderitem) {
    //     $id = $purchaseorderitem->id;
    //     $quantity = $purchaseorderitem->quantity;
    // }

    //     foreach ($skus as $sku) {
    //         $skuid = $sku->skuid;
    //     }

    //     if ($freeIssueid == $skuid) {
    //         if ($freeissue_type == 'multiple') {
    //             $freeQty = floor($purchaseorderitem->quantity / $freeIssue->purchase_Quantity) * $freeIssue->Free_Quantity;
    //             return response()->json(['freeQty' => $freeQty]);
    //         } else {
    //             $freeQty = $freeIssue->free_quantity;
    //             return response()->json(['freeQty' => $freeQty]);
    //         }
    //         // $freeIssue = FreeIssue::find($freeIssueId); 
    //         // $freeIssue->quantity = $freeQty; 
    //         // $freeIssue->save();
    //     }        
    //     return response()->json(['freeQty' => 0]);
    // }

    // public function applyfreeissue(Request $request){
    //     $sku = Sku::where('id', $request->pro_id)->select('sku_id')->first();
    //     // $    

    // }

    public function units_cal(Request $request){
        //dd($request->all());
        $sku=Sku::where('id',$request->pro_id)->select('units','mrp','sku_id')->first();
        $freeissue=freeIssue::where('id', $request->pro_id)->select('purchse_product','purchase_Quantity','Free_Quantity','freeissue_type')->first();
        //dd($freeissue);
        dd($sku, $freeissue); 
        
        $freeQty = 0;
        $units=$sku->units*$request->cases;
        $price=$sku->mrp*$units;

        // if($sku->sku_id == $freeissue->purchse_product){
            // if($freeissue->freeissue_type === 'multiple'){
            //     $freeQty= $request->cases / $freeissue->purchase_Quantity * $freeissue->Free_Quantity;
            // }
            // else{
            //     $freeQty = $freeissue->Free_Quantity;
            // }

        // }
       
        // Return the response in JSON format
        return [
            // "freeQty"=>$freeQty,
            "units"=>$units,
            "price"=>$price];
    }

        
    public function po_create(){
        $zones = Zone::all();
        $regions = Rregion::all();
        $territory = tterritory::all();
        $distributor = sku::all();
        $users = User::all();
        $products = Sku::all();
    return view('order.purchase_order', compact('zones', 'regions','territory','distributor','users','products'));
    }

    public function po_index(){
    $products = purchaseOrder::/*with(['region', 'sku', 'purchaseOrder', 'purchaseOrderItems'])->*/get();
    $regions= rregion::all();
    return view('order.purchase_order_view', compact('products','regions'));
    }



    public function po_store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'zone_id' => 'required',
        //     'region_id' => 'required',
        //     'territory_id' => 'required',
        //     'distributor_id' => 'required',
        //     'items' => 'required|array'
        // ]);

        $poNumber = 'PO-' . now()->format('YmdHis');

        $purchaseOrder = PurchaseOrder::create([

            'po_number' => $poNumber,
            'zone_id' => $request->zone_id,
            'region_id' => $request->region_id,
            'territory_id' => $request->territory,
            'distributor_id' => $request->distributor_id,
            'total' => $request->total,
            'date' => now()->format('Y-m-d'),
            'remark' => $request->remark ?? null,
        ]);

        foreach ($request->products as $item) {
            $item_id=Sku::where('sku_id',$item['sku_code'])->pluck('id')->first();
            PurchaseOrderItem::create([
                'purchase_order_id' => $purchaseOrder->getKey(),
                'product_id' => $item_id,
                'unit_price' => $item['unit_price'],
                'quantity' => $item['quantity'],
                'total_price' => $item['unit_price'] * $item['quantity'],
            ]);
        }

        //return redirect('/purchase_order/index')->with('success', 'Purchase Order Created Successfully!');
        return response()->json(['redirect' => route('purchase_order.index')]);
    }

    public function load_region(Request $request){
        // dd($request->all());
        $regions=rregion::where('zone_id',$request->zone_id)->get();
        // dd($regions);
        return $regions;
    }

    public function load_territory(Request $request){
        // dd($request->all());
        $territories=tterritory::where('region_id',$request->region_id)->get();
        // dd($territories);
        return $territories;
    }

    public function load_distributor(Request $request){
        // dd($request->all());
        $users=User::where('territory_id',$request->territory)->get();
        // dd($users);
        return $users;
    }

    
    public function po_number(Request $request){
        // dd($request->all());
        $po_number=purchaseOrder::where('territory_id',$request->territory)->get();

        return $po_number;
    }

    public function table_data(Request $request){
        // dd($request->all());
        // $po=purchaseOrder::where('id',$request->po_id)->get();

        $po=DB::table('purchase_orders as po')
                ->join('rregions as r','r.id','po.region_id')
                ->join('tterritories as t','t.id','po.territory_id')
                ->join('users as u','u.id','po.distributor_id')
                ->select(
                    'po.*',
                    'r.region_name',
                    't.territory_name',
                    'u.name'
                );
                // ->where('po.id',$request->po)
                // ->get();

        if(isset($request->region_id)){
            $po=$po->where('po.region_id',$request->region_id);
        }
        if(isset($request->territory_id)){
            $po=$po->where('po.territory_id',$request->territory_id);
        }
        if(isset($request->po)){
            $po=$po->where('po.id',$request->po);
        }
        if(isset($request->from_date) && isset($request->to_date)){
            $po=$po->whereBetween('po.date',[$request->from_date,$request->to_date]);
        }

        $po=$po->get();

        return $po;
    }

    public function bulk_conversion(Request $request){
        // dd($request->all());
        try{
            DB::beginTransaction();
            foreach($request->po_ids as $po){
                $purchase_order=purchaseOrder::find($po);
                // dd($purchase_order->po_number);
                $invoice_number='INV_NO/'.$purchase_order->po_number;
                // dd($invoice_number);
                $po_update = purchaseOrder::where('id', $purchase_order->id)
                          ->update(['invoice_number' => $invoice_number]);
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Bulk conversion successful', 'redirect' => route('purchase_order.index')]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Bulk conversion failed!', 'error' => $e->getMessage()], 500);
        }
    }
}
