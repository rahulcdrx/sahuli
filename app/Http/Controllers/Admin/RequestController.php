<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Carbon\Carbon;
use App\Requestform;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function index()
    {
        Requestform::where('created_at', '<', Carbon::now()->subDays(60)->toDateTimeString())->delete();//to delete form request if more than 30 days
        $request = Requestform::all();
        return view('admin.request.index', compact('request'));
    }

    public function show(Requestform $request)
    {
        return view('admin.request.show', compact('request'));
    }


    public function edit(Requestform $request)
    {   $roles = Role::all()->pluck('title', 'id');
        return view('admin.request.edit',compact('request','roles'));
    }

    public function store(Request $request)
    {
        //$user = User::create($request->all());
        //$user->roles()->sync($request->input('roles', []));
      //  Mail::to($request['email'])->send(new WelcomeMail($user));

      $this->validate($request,[
        'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',
        'email' => 'required|email|unique:users,email',                    
        'mobile' => 'digits:10|numeric',          
        'aadhar' => 'digits:12|numeric',         
        'start_date'  => 'required|date|after:yesterday',
        'end_date' => 'required|date|after:start_date',
        'trans_details' => 'max:255',
        'password' => 'required|min:8|max:16|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',    
    ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->start_date = $request->input('start_date');
        $user->end_date = $request->input('end_date');
        //$user->pdf_file = $request->input('pdf_file');
        //$user->excel_file = $request->input('excel_file');
        $user->mobile = $request->input('mobile');
        $user->aadhar = $request->input('aadhar');
        $user->trans_details = $request->input('trans_details');
        $user->save();
        $role = Role::select('id')->where('title', 'user')->first();
        $user->roles()->attach($role);
        $data=[
            'name'=> $request->input('name'),
            'password'=> $request->input('password'),
            'email'=> $request->input('email'),
            'end_date' => $request->input('end_date'),
        ];    
        Mail::to($request['email'])->send(new WelcomeMail($data));
        return redirect()->route('admin.users.index', compact('user'))->with('message','Success');
        //$request->session()->flash('alert-success', 'User was successfully added!');
        //return redirect()->route('admin.users.index')->with('message','Success');
    }

    public function destroy($id)
    {      
        $requestform = Requestform::find($id);
        unlink("public/receipt/".$requestform->receipt_upload);      
        Requestform::where("id", $requestform->id)->delete();
        return redirect()->back();       
    }
}
