@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.location.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{route("admin.locations.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="country">State</label>
                            <select id="state" name="state_id" class="form-control" required>
                                
                                @foreach ($states as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">District</label>
                            <select name="district_id" id="district" class="form-control" required></select>
                        </div>

                        <div class="form-group ">
                            <label for="name">City</label>
                            <input type="text" name="name" class="form-control" value="" style="width:350px" id="" required>
                        </div>
                    </div>
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
        //$("#district").append('<option>Select Dsitrict</option>');
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
</script>
@endsection
