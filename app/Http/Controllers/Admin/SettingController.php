<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Support\Facades\File;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $setting = Setting::where('id', '1')->orderBy('name')->get();
        return view('admin.setting.index', compact('setting'));
    }

    public function store(StoreCompanyRequest $request)
    {
        $request->validate([
            'name' => 'required|max:120|regex:/^[a-zA-ZÑñ\s]+$/',
            'logo' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            'email' => 'required|email',         
            'phone_no' => 'digits:10|required|numeric',
            'address' => 'max:255',
        ]);

       /* $rules = [
            'name' => 'required|max:120|regex:/^[a-zA-ZÑñ\s]+$/',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique',
            'phone_no' => 'digits:10|required|numeric',
            'address' => 'max:255',
        ];

        $customMessages = [
            'name.required' => 'Name is required',
            'logo.required' => 'Image size should not exceed 2MB',
            'result_category.required'  => 'Please select result category',
            'phone_no.required' => 'Phone must be numeric'
         ];

        $this->validate($request, $rules, $customMessages);*/


        $setting =  Setting::find('1');
        $setting->name = $request->input('name');
        $setting->logo = $request->input('logo');
        $setting->email = $request->input('email');
        $setting->phone_no = $request->input('phone_no');
        $setting->address = $request->input('address');

        if($request->hasfile('logo'))
        {
            $image_file = $request->file('logo');
            $img_extension = $image_file->getClientOriginalExtension(); //getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('setting/', $img_filename);
            $setting->logo = $img_filename;
        }
        $setting->save();

        return redirect()->route('admin.setting.index');
        return redirect()->route('admin.setting.index', compact('setting'));
    }
}
