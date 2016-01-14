<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Theater;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TheaterController extends Controller
{
    protected $lat;
    protected $lon;

    public function __construct()
    {
        $user = Auth::user();

        $res = DB::table('Zipcodes')
                 ->select('lat', 'lon')
                 ->where('zipcode', $user->zip)
                 ->first();

         $this->lat = $res->lat;
         $this->lon = $res->lon;
    }


    public function store(Request $request) 
    {
        $theater = Theater::findOrFail($request->theater_id);

        Auth::user()->theaters()->attach($theater->theater_id);

        return redirect('/friends');
    }


    public function select()
    {
        $theaters = $this->getTheatersNearUserWithin(config('seathero.theaters.distance_in_miles'));

        $sorted = $this->sortTheatersByDistance($theaters);

        $closestTheaters = array_slice(
            array_values($sorted), 0, config('seathero.theaters.max_number_to_display'));
        
        $closestTheaters[0]->checked = true;

        return view('theater', compact('user', 'closestTheaters'));
    }


    public function getTheatersNearUserWithin($miles)
    {
        $range = $this->latLonRange($this->lat, $this->lon, $miles);

        return Theater::where('lat', '>=', $range[0])
                      ->where('lat', '<=', $range[1])
                      ->where('lon', '>=', $range[2])
                      ->where('lon', '<=', $range[3])
                      ->get();        
    }


    public function sortTheatersByDistance($theaters)
    {
        foreach ($theaters as $theater) {
            $distance = $this->latLonDistance($this->lat, $this->lon, $theater->lat, $theater->lon);
            $sorted["$distance"] = $theater;
        }

        ksort($sorted);

        return $sorted;
    }


    # --------------------------------------------------------------------------
    # Given latitude/longitude coordinates and distance in miles, calculates the min and max latitudes and longitudes
    # representing the number of miles in each direction from the starting coordinates
    # --------------------------------------------------------------------------

    public function latLonRange($lat1, $lon1, $miles=5) {

        // Calculate the distance in miles that one degree longitude is at the specified latitude
        //
        $y = (cos(deg2rad($lat1)) * cos(deg2rad($lat1))) * cos(deg2rad(1)) + (sin(deg2rad($lat1)) * sin(deg2rad($lat1)));
        $x = acos($y);
        $onedist = rad2deg($x) * 69.09;
        
        // Then figure the degrees that we need to go for the specified miles
        //
        $long_diff = $miles / $onedist;
        
        $lat_diff = $miles / 69.09;
        
        // And calculate the lat and lon for that distance on each side of our original point
        //
        $range = array($lat1 - $lat_diff, $lat1 + $lat_diff, $lon1 - $long_diff, $lon1 + $long_diff);
        
        return $range;
    }


    # --------------------------------------------------------------------------
    # Gets the distance in miles between two sets of lat/lon coordinates.
    # --------------------------------------------------------------------------

    protected function latLonDistance($lat1, $lon1, $lat2, $lon2) 
    {
        $y = acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) 
           * cos(deg2rad($lon2) - deg2rad($lon1)));

        $dist = rad2deg($y) * 69.09;
        
        return $dist;
    }
}
