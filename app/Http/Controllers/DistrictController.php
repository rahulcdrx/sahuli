<?php

namespace App\Http\Controllers;

use App\Job;
use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function show(District $district)
    {
        $jobs = Job::with('company')->whereHas('district', function($query) use($district) {
                $query->whereId($district->id);
            })->paginate(7);
        $banner = 'Location: '.$district->name;
        return view('jobs.index', compact(['jobs', 'banner']));
    }
}
