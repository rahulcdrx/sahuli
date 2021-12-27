<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\State;
use App\Company;
use App\Category;
use App\District;
use App\Location;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Requests\MassDestroyJobRequest;
use Symfony\Component\HttpFoundation\Response;

use Carbon\Carbon;


class JobsController extends Controller
{
    public function index()
    {
         //Job::where('end_date', '<', Carbon::now())->delete();
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
        
        $jobs = Job::all();       
        
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $companies = Company::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $states = State::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //$districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //$locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.jobs.create', compact('companies', 'categories','states'));
    }


    public function store(Request $request)
    {

        $this->validate($request,[           
            'title' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',
            'job_image' => 'required|image|max:2048|mimes:jpeg,png,jpg,svg',
            'job_file' => 'required|mimes:pdf|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',            
            'job_social' => 'required|image|max:2048|mimes:jpeg,png,jpg,svg',
            'job_link'  => 'required|max:255',
        ]);


        $job = new Job();
        $job->title = $request->input('title');
        $job->job_image = $request->input('job_image');
        $job->job_file = $request->input('job_file');
        $job->company_id = $request->input('company_id');
        $job->state_id = $request->input('state_id');
        $job->district_id = $request->input('district_id');
        $job->location_id = $request->input('location_id');
        $job->category_id = $request->input('category_id');
        $job->subcategory_id = $request->input('subcategory_id');
        $job->start_date = $request->input('start_date');
        $job->end_date = $request->input('end_date');
        if($request->hasfile('job_image'))
        {
           $image_file = $request->file('job_image');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('public/jobimage/',$img_filename);//folder uploads
           $job->job_image = $img_filename;
        }

        if($request->hasfile('job_file'))
        {
           $image_file = $request->file('job_file');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time().'.'.$image_extension;
           $image_file->move('public/jobfile/',$image_filename);
           $job->job_file = $image_filename;
        }

        if($request->hasfile('job_social'))
        {
           $image_file = $request->file('job_social');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time().'.'.$image_extension;
           $image_file->move('public/jobsocial/',$image_filename);
           $job->job_social = $image_filename;
        }
        $job->job_link = $request->input('job_link');
        $job->save();
        return redirect()->route('admin.jobs.index');
    }


    public function edit(Job $job)
    {
        $companies = Company::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $states = State::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $subcategories = Subcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //$subcategories = Subcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $job->load('company', 'location', 'categories','subcategories');

        return view('admin.jobs.edit', compact('companies', 'locations', 'categories', 'job','districts','states','subcategories'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'title' => 'regex:/^[a-zA-ZÑñ\s]+$/|max:120|max:255',//regex:/^[a-zA-ZÑñ\s]+$/
            'job_image' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            'job_file' => 'file|max:2048|mimes:application/pdf',
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            'job_social' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            'job_link'  => 'required|max:255',
        ]);

        $job =  Job::find($id);
        $job->title = $request->input('title');
       
        $job->company_id = $request->input('company_id');
        $job->state_id = $request->input('state_id');
        $job->district_id = $request->input('district_id');
        $job->location_id = $request->input('location_id');
        $job->category_id = $request->input('category_id');
        $job->subcategory_id = $request->input('subcategory_id');
        $job->start_date = $request->input('start_date');
        $job->end_date = $request->input('end_date');
        if($request->hasfile('job_image'))
        {
           $filepath_img = 'public/jobimage/'.$job->job_image;
            if(File::exists($filepath_img))
            {
                File::delete($filepath_img);
            }
           $image_file = $request->file('job_image');
           $img_extension = $image_file->getClientOriginalExtension();
           $img_filename = time().'.'.$img_extension;
           $image_file->move('public/jobimage/',$img_filename);
           $job->job_image = $img_filename;
        }

        if($request->hasfile('job_file'))
        {
            $filepath_img = 'public/jobfile/'.$job->job_file;
            if(File::exists($filepath_img))
            {
                File::delete($filepath_img);
            }
           $image_file = $request->file('job_file');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time().'.'.$image_extension;
           $image_file->move('public/jobfile/',$image_filename);
           $job->job_file = $image_filename;
        }

        if($request->hasfile('job_social'))
        {
            $filepath_img = 'public/jobsocial/'.$job->job_social;
            if(File::exists($filepath_img))
            {
                File::delete($filepath_img);
            }
           $image_file = $request->file('job_social');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time().'.'.$image_extension;
           $image_file->move('public/jobsocial/',$image_filename);
           $job->job_social = $image_filename;
        }
        $job->job_link = $request->input('job_link');
        $job->save();
        return redirect()->route('admin.jobs.index');
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

    public function getsubcat($id=0)
    {
        $subcat = DB::table("subcategories")
                    ->where("category_id",$id)
                    ->pluck("name","id");
        return json_encode($subcat);
    }

    public function show(Job $job)
    {
        $job->load('company', 'location', 'categories', 'states', 'districts');
        return view('admin.jobs.show', compact('job'));
    }

  //  public function destroy($id)
 //  {
        /* $news = News::findOrFail($id);
    $image_path = app_path("images/news/{$news->photo}");

    if (File::exists($image_path)) {
        //File::delete($image_path);
        unlink($image_path);
    }
    $news->delete(); */

   //     $job = Job::find($id);
    //    $job->delete();
    //    return redirect()->back();
  //  }

    public function destroy($id)
    {
        $job = Job::find($id);
        unlink("public/jobimage/".$job->job_image);
        unlink("public/jobfile/".$job->job_file);
        unlink("public/jobsocial/".$job->job_social);
        Job::where("id", $job->id)->delete();
        return redirect()->back();
    }

  /*  public function massDestroy(MassDestroyJobRequest $request)
    {
        Job::whereIn('id', request('ids'))->delete();
    }*/
}
