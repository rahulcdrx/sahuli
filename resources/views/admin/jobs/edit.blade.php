@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.job.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.jobs.update", [$job->id]) }}" method="post" enctype="multipart/form-data">
             @method('put')
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.job.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($job) ? $job->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <select name="company_id" id="company" class="form-control select2" required>
                    @foreach($companies as $id => $company)
                        <option value="{{ $id }}" {{ (isset($job) && $job->company ? $job->company->id : old('company_id')) == $id ? 'selected' : '' }}>{{ $company }}</option>
                    @endforeach
                </select>
                @if($errors->has('company_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('company_id') }}
                    </em>
                @endif
            </div>

            <div class="form-group">
                <label for="state">{{ trans('cruds.job.fields.state') }}*</label>
                <select name="state_id" id="state" class="form-control select2" required>
                    @foreach($states as $id => $state)
            <option value="{{ $id }}" {{ (isset($job) && $job->state_id ? $job->state_id : old('state_id')) == $id ? 'selected' : '' }}>{{ $state }}</option>                     
                 @endforeach
                </select>
                @if($errors->has('state_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('district_id') ? 'has-error' : '' }}">
                <label for="district">{{ trans('cruds.job.fields.district') }}*</label>
                <select name="district_id" id="district" class="form-control select2" required>
                    @foreach($districts as $id => $district)
                        <option value="{{ $id }}" {{ (isset($job) && $job->district_id ? $job->district_id : old('district_id')) == $id ? 'selected' : '' }}>{{ $district }}</option>
                    @endforeach
                </select>
                @if($errors->has('district_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('district_id') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
                <label for="location">{{ trans('cruds.job.fields.location') }}*</label>
                <select name="location_id" id="location" class="form-control select2" required>
                    @foreach($locations as $id => $location)
                        <option value="{{ $id }}" {{ (isset($job) && $job->location_id ? $job->location_id : old('location_id')) == $id ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @if($errors->has('location_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('location_id') }}
                    </em>
                @endif
            </div>


            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="categories">{{ trans('cruds.job.fields.categories') }}*</label>
                <select name="category_id" id="categories" class="form-control select2" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (isset($job) && $job->category_id ? $job->category_id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('categories_id') }}
                    </em>
                @endif
            </div>
             <div class="form-group">
                <label for="name">Sub Categories:</label>
                <select name="subcategory_id" id="subcat" class="form-control" style="width:350px" >
                 @foreach($subcategories as $id => $subcategorie)
                <option value="{{ $id }}" {{ (isset($job) && $job->subcategory_id ? $job->subcategory_id : old('$subcategory_id')) == $id ? 'selected' : '' }}>{{ $subcategorie }}</option>
                    @endforeach
                </select>
            </div>

            

            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.job.fields.start_date') }}*</label>
                <input type="date" id="start_date" name="start_date" class="form-control"
                    value="{{ old('start_date', isset($job) ? $job->start_date : '') }}" style="width:350px" required>
                @if ($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.job.fields.end_date') }}*</label>
                <input type="date" id="end_date" name="end_date" class="form-control"
                    value="{{ old('end_date', isset($job) ? $job->end_date : '') }}" style="width:350px" required>
                @if ($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('job_image') ? 'has-error' : '' }}">
                <label for="logo">Job Image</label><br>
                <input type="file" name="job_image" accept="image/jpeg,image/gif,image/png,image/x-eps" value="{{ $job->job_image }}" >
                 <img src="{{ asset('public/jobimage/'."$job->job_image") }}" width="200" height="200">
                @if($errors->has('job_image'))
                    <em class="invalid-feedback">
                        {{ $errors->first('job_image') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">File/PDF</label><br>
                <input type="file" name="job_file" accept="application/pdf">
                 <a href="{{ asset('public/jobfile/'."$job->job_image") }}" target="_blank">View pdf</a>
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">Social Image</label><br>
                <input type="file" name="job_social" accept="image/jpeg,image/gif,image/png,image/x-eps">
                 <img src="{{ asset('public/jobsocial/'."$job->job_image") }}" width="200" height="200">
                @if ($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
            </div>

            
            <div class="form-group {{ $errors->has('job_link') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.job.fields.job_link') }}*</label>
                <input type="text" id="job_link" name="job_link" class="form-control" value="{{ old('job_link', isset($job) ? $job->job_link : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('job_link') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.job_link_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript'>
    $('#state').change(function(){
        var id = $(this).val();
    if(id){
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      type:"get",
      dataType: "json",
      url:'https://sahulicomputer.com/admin/jobs/getstate/'+id,
      success:function(res){
      if(res){
        $("#district").empty();
        $("#district").append('<option>Select District</option>');
        $.each(res,function(key,value){
          $("#district").append('<option value="'+key+'">'+value+'</option>');
        });
      }else{
        alert('hi');
        $("#district").empty();
      }
      }
    });
  }
  });


$('#district').change(function(){
    var id = $(this).val();
if(id){
$.ajax({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
  type:"get",
  dataType: "json",
  url:'https://sahulicomputer.com/admin/jobs/getdistrict/'+id,
  success:function(res){
  if(res){
    $("#location").empty();
    $("#location").append('<option>Select Location</option>');
    $.each(res,function(key,value){
      $("#location").append('<option value="'+key+'">'+value+'</option>');
    });
  }else{
    alert('hi');
    $("#location").empty();
  }
  }
});
}
});

$('#categories').change(function(){
    var id = $(this).val();
    alert(id);
if(id){
$.ajax({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
  type:"get",
  dataType: "json",
  url:'https://sahulicomputer.com/admin/jobs/getsubcat/'+id,
  success:function(res){
  if(res){
    $("#subcat").empty();
    $("#subcat").append('<option>Select Sub Category</option>');
    $.each(res,function(key,value){
      $("#subcat").append('<option value="'+key+'">'+value+'</option>');
    });
  }else{
    alert('hi');
    $("#location").empty();
  }
  }
});
}
});

</script>
@endsection


