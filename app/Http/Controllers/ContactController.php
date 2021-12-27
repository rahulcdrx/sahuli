<?php

namespace App\Http\Controllers;


use App\Contact;
use App\Setting;
use App\Job;
use App\Banner;
use App\News;
use App\Category;
use App\Advertisement;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $setting = Setting::where('id', '1')->orderBy('name')->get();
        // $banner = Banner::all();
        // $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        // $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();

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
        //return view('frontend.contact',compact(['advertisement_right','advertisement_left','setting','banner','',]));
         return view('frontend/contact', compact(['govts','private','student','update','advertisement_d_right','advertisement_d_left','category','jobs','advertisement_right','advertisement_left','setting','banner','news_job','news_std']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',//WORKING
            'email' => 'email|required',
            'mobile' => 'required|digits:10|numeric',
            'subject' => 'required|max:120',
            'description' => 'required|max:255'
        ]);
                
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->subject = $request->subject;
        $contact->description = $request->description;
        $contact->save();

        //Mail::to('info@sahulicomputer.com')->send(new ContactUs($contact));

        return redirect()->route('contact.index')->with('success','Submitted successfully.');
        //return $contact;
    }


    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }


    public function edit(Contact $contact)
    {
        //
    }


    public function update(Request $request, Contact $contact)
    {
        //
    }


    public function destroy($id)
    {
       //  $contact = Contact::find($id);
        // $contact->delete();
        // return redirect()->back();        
    }
}
