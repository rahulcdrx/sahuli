<?php

namespace App\Http\Controllers;

use App\Job;
use App\News;
use App\User;
use App\State;
use App\Banner;
use App\Result;
use App\Setting;
use App\Category;
use App\District;
use App\Location;
use Carbon\Carbon;
use App\Hallticket;
use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    public function index(Advertisement $advertisement,Request $request)
    {
        /*DB::table('jobs')->select('job_image','job_file','job_social')
                         ->where('end_date', '<', Carbon::now())
                                   ->get()->each(function ($job){
                            unlink(public_path('jobimage\\'.$job->job_image));
                            unlink(public_path('jobfile\\'.$job->job_file));
                            unlink(public_path('jobsocial\\'.$job->job_social));
            DB::table('jobs')->where('job_image',$job->job_image)
                             ->where('job_file',$job->job_file)
                             ->where('job_social',$job->job_social)->delete();
        });*/


        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();
        $advertisement_d_left = Advertisement::where('advt_category', 'down left')->orderBy('name')->get();
        $advertisement_d_right = Advertisement::where('advt_category', 'down right')->orderBy('name')->get();
        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();
        $jobs = Job::all();
        $govts = Job::where('category_id', 1)->count();
        $private = Job::where('category_id', 2)->count();
        $student = Job::where('category_id', 3)->count();
        $update = Job::where('category_id', 4)->count();
        
        $govts_job = Job::where('category_id', '1')->take(4)->latest();
        $private_job = Job::where('category_id', '2')->get();
        $student_job = Job::where('category_id', '3')->get();
        $update_job = Job::where('category_id', '4')->get();
       // Job::where('end_date', '<', Carbon::now())->delete();
        
        return view('frontend/home', compact(['govts_job','private_job','student_job','update_job','govts','private','student','update','advertisement_d_right','advertisement_d_left','category','jobs','advertisement_right','advertisement_left','setting','banner','news_job','news_std']));
        //return view('frontend/home', compact(['advertisement_d_right','advertisement_d_left','category','jobs','advertisement_right','advertisement_left','setting','banner','news_job','news_std']));
    }

    public function govjob()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $job_gov= Job::where('location_id', '1')->orderBy('title')->get();

        $category = Category::all();

        return view('frontend/govtlist', compact(['job_gov','advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));
    }
    public function pvtjob()
    {  $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();
        $states = DB::table("states")->pluck("name","id");
        $job_pvt= Job::where('location_id', '1')->orderBy('title')->get();

        return view('frontend/pvtlist',compact(['job_pvt','advertisement_right','advertisement_left','setting','banner', 'states','news_job','news_std','category']));
    }
    public function stdjob()
    { $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();
        $job_std = Job::where('location_id', '4')->orderBy('title')->get();


        return view('frontend/stdlist', compact(['job_std','advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));
    }


    //separate controller
   /* public function recommendation()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();

        return view('frontend/recommendation',compact(['advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));
    }*/


    public function myprofile()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();
        $advertisement_d_left = Advertisement::where('advt_category', 'down left')->orderBy('name')->get();
        $advertisement_d_right = Advertisement::where('advt_category', 'down right')->orderBy('name')->get();
        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();
        //$user_id = Auth::user()->id;
        //$user = User::findOrFail($id);

        return view('frontend/myprofile',compact(['advertisement_d_right','advertisement_d_left','advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));
    }

    public function page()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();

        return view('frontend/page',compact(['advertisement_right','advertisement_left','setting','banner','news_job','news_std','news_job','news_std','category']));

    }

    public function govtsche()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();
        $job_shc= Job::where('location_id', '1')->orderBy('title')->get();

        return view('frontend/govtsche',compact(['job_shc','advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));

    }

    public function hallticket()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $hallticket = Hallticket::where('hallticket_category', 'student hallticket')->orderBy('name')->get();
        $category = Category::all();


        return view('frontend/hallticket',compact(['hallticket','advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));

    }

    public function hallticketgovt()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();
        $hallticket = Hallticket::where('hallticket_category', 'govenment hallticket')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();


        return view('frontend/hallticket_govt',compact(['hallticket','advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));

    }

    public function result()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();

        $result = Result::where('result_category', 'student result')->orderBy('name')->get();
        $category = Category::all();


        return view('frontend/result',compact(['result','advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));

    }

    public function resultgovt()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();
        $result = Result::where('result_category', 'govement result')->orderBy('name')->get();


        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();


        return view('frontend/result_govt',compact(['result','advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));

    }

    public function about()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();

        return view('frontend/about',compact(['advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));

    }

    public function policy()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();

        return view('frontend/policy',compact(['advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));

    }

    public function faq()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();

        return view('frontend/faq',compact(['advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));

    }

    public function term()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();
        return view('frontend/term',compact(['advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));
    }

    public function search(Request $request)
    {
        $jobs = Job::with('company')
            ->searchResults()
            ->paginate(7);
        $banner = 'Search results';
        return view('jobs.index', compact(['jobs', 'banner']));
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


    public function pagedatashow($id)
    {
        $jobs = Job::find($id);
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();
        $advertisement_d_left = Advertisement::where('advt_category', 'down left')->orderBy('name')->get();
        $advertisement_d_right = Advertisement::where('advt_category', 'down right')->orderBy('name')->get();
        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();
        return view('frontend/page', compact('jobs','news_job','news_std','category', 'setting', 'banner', 'advertisement_right', 'advertisement_left','advertisement_d_left', 'advertisement_d_right'));
    }


    public function getsearch($state_id=0 , $district=0,$location=0)
    {
        $cities2 = DB::table("jobs")
                    ->where("state_id",$state_id)
                    ->Where("district_id",$district)
                    ->Where("location_id",$location)->get();
                    // var_dump($district);
                    // exit;
        return json_encode($cities2);
    }

    //search
    /*public function index()
    {
        $states = Job::select('state_id')->pluck('state_id');
        $districts = Job::select('district_id')->pluck('district_id');
        $locations = Job::select('location_id')->pluck('location_id');

        return view('frontend.pvtlist', compact('states', 'districts', 'locations'));
    }*/

   /* public function advance(Request $request)
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


        $states = DB::table('jobs')->select('state_id')->pluck('state_id');
        $districts = DB::table('jobs')->select('district_id')->pluck('district_id');
        $locations = DB::table('jobs')->select('location_id')->pluck('location_id');

        $data = DB::table('jobs');
        if( $request->filled('state')){
            $data = $data->where('state', 'LIKE', "%" . $request->state . "%");
        }
        if( $request->filled('district')){
            $data = $data->where('district', 'LIKE', "%" . $request->district . "%");
        }
        if( $request->filled('location')){
            $data = $data->where('location', 'LIKE', "%" . $request->location . "%");
        }
        $data = $data->paginate(10);
        return view('frontend.pvtlist', compact('data', 'states','locations'));
    }*/

}
