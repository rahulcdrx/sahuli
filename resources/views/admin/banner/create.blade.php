@extends('layouts.admin')

@section('content')



<div class="card">

    <div class="card-header">

         Create Banner

    </div>



    <div class="card-body">

        <form action="{{ route("admin.banner.store") }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                <label for="name">Name*</label>

                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($banner) ? $banner->name : '') }}" required>

                @if($errors->has('name'))

                    <em class="invalid-feedback">

                        {{ $errors->first('name') }}

                    </em>

                @endif

                <p class="helper-block">

                    {{ trans('cruds.company.fields.name_helper') }}

                </p>

            </div>

            <div class="form-group">

                <label for="logo">Logo</label>

                <input type="file" name="banner_img" required>



               

                @if($errors->has('logo'))

                    <em class="invalid-feedback">

                        {{ $errors->first('logo') }}

                    </em>

                @endif



            </div>

            <div class="form-group">
<div><p style="color:red">*Active Class should be selected only Once per Banner</p></div>
                <label for="exampleFormControlSelect1">Class select only once</label>

               <select class="form-control" id="exampleFormControlSelect1" name="active">

               <option value="noactive">select</option>

                <option value="active">Active</option>             

                

                </select>



            </div>
            

            <div>

                <input class="btn btn-danger" type="submit" value="save">

            </div>

        </form>





    </div>

</div>

@endsection





