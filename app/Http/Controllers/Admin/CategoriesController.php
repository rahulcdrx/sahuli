<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        //abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        //$category = Category::create($request->all());
        $category = new Category();
        $category->name = $request->input('name');
        if($request->hasfile('cat_image'))
        {
           $image_file = $request->file('cat_image');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time().'.'.$image_extension;
           $image_file->move('catimage/',$image_filename);
           $category->cat_image = $image_filename;
        }
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        //abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //$category->update($request->all());
        $category = Category::find($id);
        $category->name = $request->input('name');
        if($request->hasfile('cat_image'))
        {
           $filepath_img = 'catimage/'.$category->cat_image;
            if(File::exists($filepath_img))
            {
                File::delete($filepath_img);
            }
           $image_file = $request->file('cat_image');
           $img_extension = $image_file->getClientOriginalExtension();
           $img_filename = time().'.'.$img_extension;
           $image_file->move('catimage/',$img_filename);
           $category->cat_image = $img_filename;
        }
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        //abort_if(Gate::denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.categories.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        //abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category->delete();
        return back();
    }

    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();
        //return response(null, Response::HTTP_NO_CONTENT);
    }
}
