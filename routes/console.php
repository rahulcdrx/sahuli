<?php

use App\Job;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('JobDelete', function (Request $request) {
    //DB::table('jobs')->where('end_date', '<', Carbon::now())->delete();
    $job = Job::find($request->id);
    unlink("public/jobimage/".$job->job_image);
    unlink("public/jobfile/".$job->job_file);
    unlink("public/jobsocial/".$job->job_social);
    Job::where("id", $job->id)->where('end_date', '<', Carbon::now())->delete();
})->describe('Delete Job');
