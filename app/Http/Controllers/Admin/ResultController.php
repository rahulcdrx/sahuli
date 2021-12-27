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
use App\Result;

class ResultController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $result = Result::all();
        return view('admin.result.index', compact('result'));
    }

    public function create()
    {
        //abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.result.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'link' => 'required',
            'post_date' => 'required|date|after:yesterday',
            'result_category' => 'required',
        ]);

        $result = new Result;
        $result->name = $request->input('name');
        $result->link = $request->input('link');
        $result->post_date = $request->input('post_date');
        $result->result_category = $request->input('result_category');
        $result->save();
        return redirect()->route('admin.result.index', compact('result'));
    }

    public function edit(Result $result)
    {
        //abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.result.edit', compact('result'));
    }

    public function update( Request $request ,$id)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|max:255',//regex:/^[a-zA-ZÑñ\s]+$/
            'link' => 'required',
            //'post_date' => 'required|date',
            'result_category' => 'required',
        ]);

        $result = Result::find($id);
        $result->name = $request->input('name');
        $result->link = $request->input('link');
        $result->post_date = $request->input('post_date');
        $result->result_category = $request->input('result_category');
        $result->save();

        return redirect()->route('admin.result.index');
    }

    public function show(Result $result)
    {
        //abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.result.show', compact('result'));
    }

    public function destroy(Result $result)
    {
       // abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $result->delete();

        return back();
    }
}
