<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyCompanyRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\File;
use App\Hallticket;

class HallticketController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $hallticket = Hallticket::all();
        return view('admin.hallticket.index', compact('hallticket'));
    }

    public function create()
    {
        //abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.hallticket.create');
    }

    public function store(StoreCompanyRequest $request)
    {

        $request->validate([
            'name' => 'regex:/^[a-zA-Z]+$/u|max:255',
            'link' => 'max:255',
            'post_date' => 'date',
        ]);

        $hallticket = new Hallticket;
        $hallticket->name = $request->input('name');
        $hallticket->link = $request->input('link');
        $hallticket->post_date = $request->input('post_date');
        $hallticket->hallticket_category = $request->input('hallticket_category');
        $hallticket->save();
        return redirect()->route('admin.hallticket.index', compact('hallticket'));
    }

    public function edit(hallticket $hallticket)
    {
        //abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.hallticket.edit', compact('hallticket'));
    }

    public function update( Request $request ,$id)
    {
        $request->validate([
            'name' => 'regex:/^[a-zA-Z]+$/u|max:255',
            'link' => 'max:255',
            'post_date' => 'date',
        ]);

        $hallticket = Hallticket::find($id);
        $hallticket->name = $request->input('name');
        $hallticket->link = $request->input('link');
        $hallticket->post_date = $request->input('post_date');
        $hallticket->hallticket_category = $request->input('hallticket_category');



        $hallticket->save();

        return redirect()->route('admin.hallticket.index');
    }

    public function show(Hallticket $hallticket)
    {
        //abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.hallticket.show', compact('hallticket'));
    }

    public function destroy(Hallticket $hallticket)
    {
       // abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $hallticket->delete();

        return back();
    }
}
