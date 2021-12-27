<?php

namespace App\Http\Controllers;

use App\State;
use App\District;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $states = State::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $locations = Location::all()->pluck('name', 'id');
        $data = DB::table('jobs')->paginate(10);
        return view('frontend.pvtlist', compact('data', 'districts', 'locations', 'states'));
    }

    public function advance(Request $request)
    {
        $data = DB::table('jobs');
        if( $request->state){
            $data = $data->where('state', 'LIKE', "%" . $request->state . "%");
        }
        if( $request->district){
            $data = $data->where('district', 'LIKE', "%" . $request->district . "%");
        }
        if( $request->location){
            $data = $data->where('location', 'LIKE', "%" . $request->location . "%");
        }
        $data = $data->paginate(10);
        return view('frontend.pvtlist', compact('data'));
    }

   /*public function getstate($id=0)
    {
        $cities = DB::table("districts")
                    ->where("state_id",$id)
                    ->pluck("name","id");
        return json_encode($cities);
    }

    public function getdistrict($id=0)
    {
        $cities1 = DB::table("locations")
                    ->where("district_id",$id)
                    ->pluck("name","id");
        return json_encode($cities1);
    }*/
}
