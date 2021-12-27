<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\News;
use App\User;
use App\Contact;
use App\Requestform;

class HomeController
{
    public function index()
    {  $request = Requestform::all();
        $contact = Contact::all();
        $con_count = Contact::all()->count();
        $user = User::all()->count();
        $news = News::all()->count();
        $alljob = job::all()->count();
        $govts = Job::where('category_id', 1)->count();
        $private = Job::where('category_id', 2)->count();
        $student = Job::where('category_id', 3)->count();
        $update = Job::where('category_id', 4)->count();

       
        return view('admin.home',compact('news','user','con_count','alljob','request','contact'));
    }
}
