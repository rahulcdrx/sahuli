<?php

namespace App\Http\Controllers;

use App\Job;
use App\Location;

class LocationController extends Controller
{
    public function show(Location $location)
    {
        $jobs = Job::with('company')->whereHas('location', function($query) use($location) {
                $query->whereId($location->id);
            })->paginate(7);
        $banner = 'Location: '.$location->name;
        return view('jobs.index', compact(['jobs', 'banner']));

        /*$jobs = Job::with('state')->whereHas('district' ,function($query) use($districts){
            $query->whereId($districts->id);
        })->whereHas('location', function($query) use($location) {
                $query->whereId($location->id);
            })->paginate(7);
        $banner = 'Location: '.$location->name;
        return view('jobs.index', compact(['jobs', 'banner']));*/

       // $jobs = Job::select('')
    }
}
