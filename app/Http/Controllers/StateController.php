<?php

namespace App\Http\Controllers;

use App\Job;
use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function show(State $state)
    {
        $jobs = Job::with('company')->whereHas('state', function($query) use($state) {
                $query->whereId($state->id);
            })->paginate(7);
        $banner = 'Location: '.$state->name;
        return view('jobs.index', compact(['jobs', 'banner']));
    }
}
