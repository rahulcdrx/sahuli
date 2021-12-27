<?php
namespace App\Http\Controllers\Admin;
use App\Advertisement;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompanyRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
class AdvertisementController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $advertisement = Advertisement::all();
        return view('admin.advertisement.index', compact('advertisement'));
    }
    public function create()
    {
        //abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.advertisement.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:120',
            'advt_category' => 'required',
            'advt_image' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ]);

       /* $rules = [
            'name' => 'required|max:120',
            'advt_category' => 'required',
            'advt_image' => 'required should be less than 2MB|image|mimes:jpeg,png,jpg,gif,svg|max:2048|',
        ];

        $customMessages = [
            'name.required' => 'Name is required',
            'advt_category.required' => 'Please select category',
            'advt_image.required'  => 'Image size should not exceed 2MB',
         ];

        $this->validate($request, $rules, $customMessages);*/

        $advertisement = new Advertisement;
        $advertisement->name = $request->input('name');
        $advertisement->advt_category = $request->input('advt_category');
        $advertisement->active = $request->input('active');

        if($request->hasfile('advt_image'))
        {
            $image_file = $request->file('advt_image');
            $img_extension = $image_file->getClientOriginalExtension(); //getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('public/advertisement/', $img_filename);
            $advertisement->advt_image = $img_filename;
        }
        $advertisement->save();

        return redirect()->route('admin.advertisement.index');
        return redirect()->route('admin.advertisement.index', compact('advertisement'));
    }
    public function edit(advertisement $advertisement)
    {
        //abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.advertisement.edit', compact('advertisement'));
    }
    public function update( Request $request ,$id)
    {
        $request->validate([
            'name' => 'required|max:120',
            'advt_category' => 'required',
            'advt_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'advt_image' => 'required|max:2048'
        ]);

        $advertisement = Advertisement::find($id);
        $advertisement->name = $request->input('name');
        $advertisement->advt_category = $request->input('advt_category');
        $advertisement->active = $request->input('active');

        if($request->hasfile('advt_image'))
        {
            $filepath_img = 'public/advertisement/'.$advertisement->advt_image;
            if(File::exists($filepath_img))
            {
                 File::delete($filepath_img);
            }
            $image_file = $request->file('advt_image');
            $img_extension = $image_file->getClientOriginalExtension(); // getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('public/advertisement/', $img_filename);
            $advertisement->advt_image = $img_filename;
        }
        $advertisement->save();
        return redirect()->route('admin.advertisement.index');
    }
    public function show(Advertisement $advertisement)
    {
        //abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.advertisement.show', compact('advertisement'));
    }


    public function destroy($id)
    {
       // abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$advertisement->delete();
        //return back();

        $advertisement = Advertisement::find($id);
        unlink("public/advertisement/".$advertisement->advt_image);      
        Advertisement::where("id", $advertisement->id)->delete();
        return redirect()->back();
        // $advertisement->delete();
        // return back();
    }
}
