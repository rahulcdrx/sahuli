<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Banner;
use App\News;
use App\Category;
use App\Advertisement;
use App\Requestform;
use Illuminate\Support\Facades\DB;
Use App\Payment;

class RegisterController extends Controller
{
    public function  index()
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
        $govtcat = Category::where('id', '1')->get();
        $pvtcat = Category::where('id', '2')->orderBy('id')->get();
        $studcat = Category::where('id', '3')->orderBy('id')->get();
        $updcat = Category::where('id', '4')->orderBy('id')->get();
        $pay = Payment::all();
        return view('frontend.user',compact(['pay','govtcat','pvtcat','studcat','updcat','advertisement_d_right','advertisement_d_left','category','advertisement_right','advertisement_left','setting','banner','news_job','news_std']));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'name' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'email' => 'required|email',
        'mobile_no' => 'digits:10|required',
        'aadhar_no' => 'digits:12|required',
        'receipt_upload' => 'required|max:2048|image|mimes:jpeg,png,jpg,gif,svg',
        'district' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'referal_name' => 'max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'taluka' => 'max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'dob' => 'required|date|before:16+ years'
    ]);

        if ($receipt_upload = $request->file('receipt_upload')) {
            $imageDestinationPath = 'public/receipt/';
            $postImage = date('YmdHis') . "." . $receipt_upload->getClientOriginalExtension();
            $receipt_upload->move($imageDestinationPath, $postImage);
            $input['receipt_upload'] = $postImage;
        }
            $register = new Requestform;
            $register->name = $request->name;
            $register->email = $request->email;
            $register->mobile_no = $request->mobile_no;
            
            $register->transaction_no = $request->transaction_no;
            $register->district = $request->district;
            $register->taluka = $request->taluka;
            $register->aadhar_no = $request->aadhar_no;
          
            $register->referal_name = $request->referral_name;
            $register->dob = $request->dob;
            
            $register->trans_image = $input['receipt_upload'];
            $register->save();
            return redirect()->route('requestform.index')
                ->with('success','Your request has been submitted successfully we will contact you soon.');
            }

    public function show(Requestform $Requestform)
    {
        return view('admin.Requestform.show', compact('Requestform'));
    }
}
