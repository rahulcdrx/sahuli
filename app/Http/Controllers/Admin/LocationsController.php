<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\State;
use App\District;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyLocationRequest;

class LocationsController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        $states = State::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.locations.create', compact('states', 'districts'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|max:255|unique:locations,name',//regex:/^[a-zA-ZÑñ\s]+$/
        ]);

        //$location = Location::create($request->all());
        $location = new Location();
        $location->state_id = $request->state_id;
        $location->district_id = $request->district_id;
        $location->name = $request->name;
        $location->save();
        return redirect()->route('admin.locations.index');
    }

   /* public function getDistrict(Request $request)
    {
        $districts = District::where("state_id",$request->state_id)
                    ->get(["name","id"]);
        return response()->json($districts);
    }

    public function getLocation(Request $request)
    {
        $locations = Location::where('district_id',$request->district_id)->get(['name','id']);
        return response()->json($locations);
    }*/



    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $this->validate($request,[
            'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|max:255|unique:locations,name',
        ]);

        $location->update($request->all());
        $states = State::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $location->load('state','district');
        return redirect()->route('admin.locations.index', compact('states','districts','location'));
    }

    public function show(Location $location)
    {
        return view('admin.locations.show', compact('location'));
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return back();
    }

    public function massDestroy(MassDestroyLocationRequest $request)
    {
        Location::whereIn('id', request('ids'))->delete();
    }

    public function getstate($id=0)
    {
        $cities = DB::table("districts")
                    ->where("state_id",$id)
                    ->pluck("name","id");
        return json_encode($cities);
    }

   /* public function getdistrict($id=0)
    {
        $cities1 = DB::table("location")
                    ->where("district_id",$id)
                    ->pluck("name","id");
        return json_encode($cities1);
    }*/
}
