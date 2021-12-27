<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use App\Banner;
use App\Setting;
use App\Category;
use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function myprofile(Request $request,$id)
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

      // $user_id = Auth::user()->id;
       //$user = User::findOrFail($id);

        return view('frontend/myprofile',compact(['user','advertisement_d_right','advertisement_d_left','advertisement_right','advertisement_left','setting','banner','news_job','news_std','category']));
    }

}
