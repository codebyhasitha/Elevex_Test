<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
Use App\Models\zone;
Use App\Models\rregion;
Use App\Models\tterritory;

class TestController extends Controller
{
        public function zone_index(){
        $zones = Zone::all();
        return view('admin.zone_view', compact('zones'));
    }

    public function Region_index() {
        $regions = rregion::with('zone')->get();
        // dd($regions);
        return view('admin.region_view', compact('regions'));
    }

    public function territory_index() {
        $territories = tterritory::with(['zone', 'region'])->get();
        return view('admin.terrirtory_view', compact('territories'));
    }
    public function add_zone(){

        return view('admin.add_zone');
    }

    public function zone_store(Request $request){
        $lastZone = Zone::latest('id')->first();
        $nextZoneCode = str_pad(($lastZone ? (int)$lastZone->zone_code + 1 : 1), 3, '0', STR_PAD_LEFT);

        while (Zone::where('zonecode', $nextZoneCode)->exists()) {$nextZoneCode = str_pad((int)$nextZoneCode + 1, 3, '0', STR_PAD_LEFT);}
        $zone = new Zone();
        $zone->zonecode = $nextZoneCode;
        $zone->longdescription = $request->longdescription;
        $zone->shortdescription= $request->shortdescription;
        $zone->save();

        return redirect()->route('zone.create')->with('success', 'Zone added successfully!');
    }

    public function Region_add() {
        $zones = Zone::all();
        return view('admin.add_region', compact('zones'));
    }

public function region_store(Request $request){
    $region = new Rregion();
    $region->zone_id = $request->zone;
    $region->region_code = $request->regioncode;
    $region->region_name = $request->regionname;
    $region->save();

    return redirect()->back()->with('success', 'Region added successfully');
}

public function territory_create() {
    $zones = Zone::all();
    $regions = Rregion::all();
    return view('admin.add_territory', compact('zones', 'regions'));
}

public function territory_store(Request $request) {
    $request->validate([
        'zone_id' => 'required|exists:zones,id',
        'region_id' => 'required|exists:rregions,id',
        'territory_name' => 'required|string|max:255',
    ]);

    $randomCode = "TERR-" . rand(1000, 9999);

    $territory = new TTerritory();
    $territory->zone_id = $request->zone_id;
    $territory->region_id = $request->region_id;
    $territory->territory_code = $randomCode;
    $territory->territory_name = $request->territory_name;
    $territory->save();

    return redirect()->back()->with('success', 'Territory added successfully!');

}

}
