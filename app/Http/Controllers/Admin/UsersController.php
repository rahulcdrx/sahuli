<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Requestform;
use App\Mail\RenewMail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\MassDestroyUserRequest;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        //abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all()->pluck('title', 'id');
        //$roles = Role::where('role_id', 1);
        $requestform = Requestform::all();
        return view('admin.users.create', compact('roles', 'requestform'));
    }

    public function store(Request $request)
    {
        //$user = User::create($request->all());
        //$user->roles()->sync($request->input('roles', []));
      //  Mail::to($request['email'])->send(new WelcomeMail($user));

      $this->validate($request,[
            'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'digits:10|numeric|unique:users,mobile',
            'aadhar' => 'digits:12|numeric|unique:users,aadhar',
            'start_date'  => 'required|date|after:yesterday',
            'end_date' => 'required|date|after:start_date',
            //'trans_details' => 'required',
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            //'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|confirmed',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
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
    }

    public function edit(User $user)
    {       
        $roles = Role::all()->pluck('title', 'id');
        $user->load('roles');
        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(Request $request, $id)
    {
      /*  $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));*/
        $this->validate($request,[
            'name' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/|max:120',
            'email' => 'required|email|unique:users',
            'mobile' => 'digits:10|numeric',
            'aadhar' => 'digits:12|numeric',            
            'start_date'  => 'required|date',
            'end_date' => 'date|after:start_date',
            //'trans_details' => 'max:255',
            'pdf_file' => 'file|max:2048|mimes:application/pdf',
            'excel_file' => 'file|max:2048|mimes:application/excel',
            //'password' => ['required','min:8','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/','confirmed']
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        //$user->email = $request->input('email');
        //$user->password = $request->input('password');
        $user->start_date = $request->input('start_date');
        $user->end_date = $request->input('end_date');

        if($request->hasfile('pdf_file'))
        {
           $image_file = $request->file('pdf_file');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('userpdffile/',$img_filename);//folder uploads
           $user->pdf_file = $img_filename;
        }

        if($request->hasfile('excel_file'))
        {
           $image_file = $request->file('excel_file');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time().'.'.$image_extension;
           $image_file->move('userexcelfile/',$image_filename);
           $user->excel_file = $image_filename;
        }
        $user->mobile = $request->input('mobile');
        $user->aadhar = $request->input('aadhar');
        $user->trans_details = $request->input('trans_details');
        $user->save();

        $data=[
            'name'=> $request->input('name'),           
            'end_date' => $request->input('end_date'),
            'email'=> $request->input('email'),           
        ];

        Mail::to($request['email'])->send(new RenewMail($data));
        return redirect()->route('admin.users.index', compact('user'));
    }

    public function show(User $user)
    {
        //abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$user->load('roles');
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        //abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->delete();
        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();
        //return response(null, Response::HTTP_NO_CONTENT);
    }

    public function profile()
    {
        return view('frontend.user');
    }

  /*  public function myprofileshow()
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        return view('forntend.user', compact('user'));
    }*/
}
