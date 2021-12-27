<?php

namespace App\Http\Controllers\Admin;
use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompanyRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $Banner = Banner::all();
        return view('admin.banner.index', compact('Banner'));
    }

    public function create()
    {
        //abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:120',
            'banner_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = new Banner;
        $banner->name = $request->input('name');
        $banner->active = $request->input('active');

        if($request->hasfile('banner_img'))
        {
            $image_file = $request->file('banner_img');
            $img_extension = $image_file->getClientOriginalExtension(); //getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('public/banner/', $img_filename);
            $banner->banner_img = $img_filename;
        }
        $banner->save();
        return redirect()->route('admin.banner.index');
        return redirect()->route('admin.banner.index', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        //abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.banner.edit', compact('banner'));
    }

    public function update( Request $request ,$id)
    {
        $request->validate([
            'name' => 'required|max:120',
            'banner_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = Banner::find($id);
        $banner->name = $request->input('name');
        $banner->active = $request->input('active');
        if($request->hasfile('banner_img'))
        {
            $filepath_img = 'public/banner/'.$banner->banner_img;
            if(File::exists($filepath_img))
            {
                 File::delete($filepath_img);
            }
            $image_file = $request->file('banner_img');
            $img_extension = $image_file->getClientOriginalExtension(); // getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('public/banner/', $img_filename);
            $banner->banner_img = $img_filename;
        }
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    public function show(Banner $banner)
    {
        //abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.banner.show', compact('banner'));
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        unlink("public/banner/".$banner->banner_img);      
        Banner::where("id", $banner->id)->delete();
        return redirect()->back();
        
    }
}
