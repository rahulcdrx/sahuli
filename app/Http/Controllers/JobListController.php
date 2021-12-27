<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all()->pluck('name', 'id');
        $data = DB::table('jobs')->paginate(10);
        return view('frontend.pvtlist', compact('data', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


 /*   public function index()
    {
        $data = DB::table('jobs')->paginate(10);
        return view('search', compact('data'));
    }*/
   /* public function simple(Request $request)
    {
        $data = DB::table('jobs');
        if( $request->input('search')){
            $data = $data->where('name', 'LIKE', "%" . $request->search . "%");
        }
        $data = $data->paginate(10);
        return view('frontend.pvtlist', compact('data'));
    }*/

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

    public function getstate($id=0)
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
    }
}
