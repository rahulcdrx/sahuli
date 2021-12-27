<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Requestform;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SubscriptionController extends Controller
{

    public function index()
    {
        $sub = Subscription::all();
        return view('admin.subscription.index', compact('sub'));
    }


    public function create()
    {
        $req = Requestform::all();
        $users = User::all();
        return view('admin.subscription.create', compact('users', 'req'));
    }


    public function store(Request $request)
    {
        $sub = new Subscription();
        $sub->name = $request->input('name');
        $sub->email = $request->input('email');
        $sub->start_date = $request->input('start_date');
        $sub->end_date = $request->input('end_date');
        if($request->hasfile('pdf_file'))
        {
           $image_file = $request->file('pdf_file');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('pdffile/',$img_filename);//folder uploads
           $sub->pdf_file = $img_filename;
        }

        if($request->hasfile('excel_file'))
        {
           $image_file = $request->file('excel_file');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time().'.'.$image_extension;
           $image_file->move('excelfile/',$image_filename);
           $sub->excel_file = $image_filename;
        }
        $sub->trans_details = $request->input('trans_details');
        $sub->save();
        return redirect()->route('admin.subscription.index');
    }


    public function show(Subscription $sub)
    {
        $sub->load('req', 'users');
        return view('admin.subscription.show', compact('sub'));
    }


    public function edit($id)
    {
        $req = Requestform::all();
        $users = User::all();
        return view('admin.subscription.edit', compact('userreq', 'req'));
    }


    public function update(Request $request, $id)
    {
        $sub = Subscription::find($id);
        $sub->name = $request->input('name');
        $sub->email = $request->input('email');
        $sub->start_date = $request->input('start_date');
        $sub->end_date = $request->input('end_date');
        if($request->hasfile('pdf_file'))
        {
           $filepath_img = 'pdffile/'.$sub->pdf_file;
           if(File::exists($filepath_img))
           {
               File::delete($filepath_img);
           }
           $image_file = $request->file('pdf_file');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('pdffile/',$img_filename);//folder uploads
           $sub->pdf_file = $img_filename;
        }

        if($request->hasfile('excel_file'))
        {
           $filepath_img = 'excelfile/'.$sub->excel_file;
           if(File::exists($filepath_img))
           {
               File::delete($filepath_img);
           }
           $image_file = $request->file('excel_file');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time().'.'.$image_extension;
           $image_file->move('excelfile/',$image_filename);
           $sub->excel_file = $image_filename;
        }
        $sub->trans_details = $request->input('trans_details');
        $sub->save();
        return redirect()->route('admin.subscription.index');
    }


    public function destroy(Subscription $sub)
    {
        $sub->delete();
        return back();
    }
}
