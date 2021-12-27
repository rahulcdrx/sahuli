@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.job.title_singular') }}
    </div>


 	@if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route("admin.jobs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Name*</label>
                <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', isset($job) ? $job->title : '') }}" required>
               <!--  @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
                @endif -->
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <select name="company_id" id="company" class="form-control select2" style="width:350px" >
                    @foreach($companies as $id => $company)
                    <option value="{{ $id }}" {{ (isset($job) && $job->company ? $job->company->id : old('company_id'))
                        == $id ? 'selected' : '' }}>{{ $company }}</option>
                    @endforeach
                </select>
                @if ($errors->has('company_id'))
                    <span class="text-danger">{{ $errors->first('company_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="state">State:</label>
                <select id="state" name="state_id" class="form-control" style="width:350px" required>
                   
                    @foreach ($states as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                 @if ($errors->has('state_id'))
                    <span class="text-danger">{{ $errors->first('state_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="state">District:</label>
                <select name="district_id" id="district" class="form-control" style="width:350px" required></select>
            </div>
            <div class="form-group">
                <label for="name">Location:</label>
                <select name="location_id" id="location" class="form-control" style="width:350px" required></select>
            </div>

            <div class="form-group">
                <label for="categories">{{ trans('cruds.job.fields.categories') }}*</label>
                <select name="category_id" id="categories" class="form-control select2" style="width:350px" required>
                    @foreach($categories as $id => $category)
                    <option value="{{ $id }}" {{ (isset($job) && $job->category ? $job->category->id :
                        old('categories_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if ($errors->has('categories_id'))
                    <span class="text-danger">{{ $errors->first('categories_id') }}</span>
                @endif
            </div>
              <div class="form-group">
                <label for="name">Sub Categories:</label>
                <select name="subcategory_id" id="subcat" class="form-control" style="width:350px" ></select>
            </div>

            <div class="form-group">
                <label for="logo">Job Image</label><br>
                <input type="file" name="job_image" accept="image/jpeg,image/gif,image/png,image/x-eps" required>
                @if ($errors->has('job_image'))
                    <span class="text-danger">{{ $errors->first('job_image') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="logo">File/PDF</label><br>
                <input type="file" name="job_file" accept="application/pdf">
                @if ($errors->has('job_file'))
                    <span class="text-danger">{{ $errors->first('job_file') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="logo">Social Image</label><br>
                <input type="file" name="job_social" accept="image/jpeg,image/gif,image/png,image/x-eps">
                @if ($errors->has('job_social'))
                    <span class="text-danger">{{ $errors->first('job_social') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="title">{{ trans('cruds.job.fields.start_date') }}*</label>
                <input type="date" id="start_date" name="start_date" class="form-control"
                    value="{{ old('start_date', isset($job) ? $job->start_date : '') }}" style="width:350px" required>
                @if ($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="title">{{ trans('cruds.job.fields.end_date') }}*</label>
                <input type="date" id="end_date" name="end_date" class="form-control"
                    value="{{ old('end_date', isset($job) ? $job->end_date : '') }}" style="width:350px" required>
                @if ($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="title">{{ trans('cruds.job.fields.job_link') }}*</label>
                <input type="text" id="job_link" name="job_link" class="form-control"
                    value="{{ old('job_link', isset($job) ? $job->job_link : '') }}" required>
                @if ($errors->has('job_link'))
                    <span class="text-danger">{{ $errors->first('job_link') }}</span>
                @endif
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
  url:'getdistrict/'+id,
  success:function(res){
  if(res){
    $("#location").empty();
    $("#location").append('<option>Select City</option>');
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
  url:'getsubcat/'+id,
  success:function(res){
  if(res){
    $("#subcat").empty();
    $("#subcat").append('<option>Select Sub</option>');
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
