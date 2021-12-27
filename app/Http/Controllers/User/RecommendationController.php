<?php

namespace App\Http\Controllers\User;

use App\News;
use App\Banner;
use App\Setting;
use App\Category;
use App\Advertisement;
use App\Recommendation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecommendationController extends Controller
{
    public function index()
    {
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        $banner = Banner::all();
        $advertisement_right = Advertisement::where('advt_category', 'top right')->orderBy('name')->get();
        $advertisement_left = Advertisement::where('advt_category', 'top left')->orderBy('name')->get();
        $news_job = News::where('news_category', 'job news')->orderBy('name')->get();
        $news_std = News::where('news_category', 'student news')->orderBy('name')->get();
        $category = Category::all();
       
        return view('frontend/recommendation',compact(['category','advertisement_right','advertisement_left','setting','banner','news_job','news_std']));
    }
    
    public function store(Request $request)
{
   
        
                        $request->validate([
                        'name' => 'required',
                        'email' => 'required',
                        'mobile_no' => 'required',

                        ]);
                    

                        $recommendation = new Recommendation;
                        $recommendation->name = $request->name;
                        $recommendation->email = $request->email;
                        $recommendation->mobile_no = $request->mobile_no;
                        $recommendation->message = $request->message;


                        $recommendation->save();
                        return redirect()->route('recommendation.index')
                        ->with('success',' Form has been submited');
                        }
}
