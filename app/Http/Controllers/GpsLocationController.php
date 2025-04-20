<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GpsLocation;
use App\Models\User;
class GpsLocationController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();

        $query = GpsLocation::with('user');

        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }
        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $locations = $query->latest()->get();

        return view('gps_locations.index', compact('locations', 'users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'mileage' => 'nullable|numeric',
        ]);

        $gpsLocation = new GpsLocation();
        $gpsLocation->user_id = $request->user_id;
        $gpsLocation->latitude = $request->latitude;
        $gpsLocation->longitude = $request->longitude;
        $gpsLocation->mileage = $request->mileage;
        $gpsLocation->save();

        return response()->json(['message' => 'GPS location saved successfully.'], 201);
    }



    public function show($id)
    {
        $gpsLocation = GpsLocation::findOrFail($id);
        return response()->json($gpsLocation);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'mileage' => 'nullable|numeric',
        ]);

        $gpsLocation = GpsLocation::findOrFail($id);
        $gpsLocation->latitude = $request->latitude;
        $gpsLocation->longitude = $request->longitude;
        $gpsLocation->mileage = $request->mileage;
        $gpsLocation->save();

        return response()->json(['message' => 'GPS location updated successfully.']);
    }
    public function destroy($id)
    {
        $gpsLocation = GpsLocation::findOrFail($id);
        $gpsLocation->delete();

        return response()->json(['message' => 'GPS location deleted successfully.']);
    }
    public function getLatestLocation()
    {
        $latestLocation = GpsLocation::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->first();

        return response()->json($latestLocation);
    }
    // public function getLocationsByDate(Request $request)
    // {
    //     $request->validate([
    //         'date' => 'required|date',
    //     ]);

    //     $locations = GpsLocation::where('user_id', auth()->id())
    //         ->whereDate('created_at', $request->date)
    //         ->get();

    //     return response()->json($locations);
    // }
    // public function getLocationsByDateRange(Request $request)
    // {
    //     $request->validate([
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after_or_equal:start_date',
    //     ]);

    //     $locations = GpsLocation::where('user_id', auth()->id())
    //         ->whereBetween('created_at', [$request->start_date, $request->end_date])
    //         ->get();

    //     return response()->json($locations);
    // }
    // public function getLocationsByMileage(Request $request)
    // {
    //     $request->validate([
    //         'min_mileage' => 'required|numeric',
    //         'max_mileage' => 'required|numeric|gte:min_mileage',
    //     ]);

    //     $locations = GpsLocation::where('user_id', auth()->id())
    //         ->whereBetween('mileage', [$request->min_mileage, $request->max_mileage])
    //         ->get();

    //     return response()->json($locations);
    // }
    // public function getLocationsByCoordinates(Request $request)
    // {
    //     $request->validate([
    //         'latitude' => 'required|numeric',
    //         'longitude' => 'required|numeric',
    //         'radius' => 'required|numeric|min:0',
    //     ]);

    //     $locations = GpsLocation::where('user_id', auth()->id())
    //         ->whereRaw("ST_Distance_Sphere(point(longitude, latitude), point(?, ?)) <= ?", [
    //             $request->longitude,
    //             $request->latitude,
    //             $request->radius,
    //         ])
    //         ->get();

    //     return response()->json($locations);
    // }
    public function getLocationsByUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $locations = GpsLocation::where('user_id', $request->user_id)->get();

        return response()->json($locations);
    }
    public function getLocationsByUserAndDate(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
        ]);

        $locations = GpsLocation::where('user_id', $request->user_id)
            ->whereDate('created_at', $request->date)
            ->get();

        return response()->json($locations);
    }
    public function getLocationsByUserAndDateRange(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $locations = GpsLocation::where('user_id', $request->user_id)
            ->whereBetween('created_at', [$request->start_date, $request->end_date])
            ->get();

        return response()->json($locations);
    }
}
