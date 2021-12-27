@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.job.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.jobs.update", [$job->id]) }}" method="POST" enctype="multipart/form-data">
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
                <label for="state">State:</label>
                <select id="state" name="state_id" class="form-control" style="width:350px">
                    <option value="" selected disabled>Select Country</option>
                    @foreach ($states as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="state">District:</label>
                <select name="district_id" id="district" class="form-control" style="width:350px"></select>
            </div>
            <div class="form-group">
                <label for="name">Location:</label>
                <select name="location_id" id="location" class="form-control" style="width:350px"></select>
            </div>


            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="categories">{{ trans('cruds.job.fields.categories') }}*</label>
                <select name="category_id" id="categories" class="form-control select2" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (isset($job) && $job->category ? $job->category->id : old('categories_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('categories_id') }}
                    </em>
                @endif
            </div>


            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">Job Image</label><br>
                <input type="file" name="job_image">
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">File/PDF</label><br>
                <input type="file" name="job_file">
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">Social Image</label><br>
                <input type="file" name="job_social">
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
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
      url:'getstate/'+id,
      success:function(res){
      if(res){
        $("#district").empty();
        $("#district").append('<option>Select State</option>');
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
  url:'getdistrict/'+id,
  success:function(res){
  if(res){
    $("#location").empty();
    $("#location").append('<option>Select State</option>');
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

</script>
@endsection


