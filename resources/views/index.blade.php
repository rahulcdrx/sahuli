@extends('layouts.main')

@section('home')
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    <span>1500+</span> Jobs posted last week
                </h1>
                <form action="{{ route('search') }}" class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-3 form-cols">
                            <select class="form-select" name="state" id="state">
                                @foreach($searchStates as $id=>$searchState)
                                    <option value="{{ $id }}">{{ $searchState }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 form-cols">
                            <!-- <div class="default-select" >
                                <select name="district" id="district">

                                </select>
                            </div> -->
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select">
                                <select name="location" id="location">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects2">
                                <select name="category">
                                    <option value="">All Categories</option>
                                    @foreach($searchCategories as $id=>$searchCategories)
                                        <option value="{{ $id }}">{{ $searchCategories }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 form-cols">
                            <button type="submit" class="btn btn-info">
                                <span class="lnr lnr-magnifier"></span> Search
                            </button>
                        </div>
                    </div>
                </form>
            {{--<p class="text-white"> <span>Search by categories:</span>
                    @foreach($searchByCategory as $id=>$searchByCategory)
                    <a href="{{ route('categories.show', $id) }}" class="text-white">{{ $searchByCategory }}</a>@if
                    (!$loop->last),@endif
                    @endforeach
                </p>--}}
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript'>
    $('#state').change(function(){
        var id = $(this).val();
        alert(id);
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

@section('content')
<div class="col-lg-8 post-list">
    @foreach($jobs as $job)
    <div class="single-post d-flex flex-row">
        <div class="thumb">
            @if($job->company->logo)
            <img src="{{ $job->company->logo->getUrl() }}" alt="">
            @endif
        </div>
        <div class="details">
            <div class="title d-flex flex-row justify-content-between">
                <div class="titles">
                    <a href="{{ route('jobs.show', $job->id) }}">
                        <h4>{{ $job->title }}</h4>
                    </a>
                    <h6>{{ $job->company->name }}</h6>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    <a class="text-uppercase loadmore-btn mx-auto d-block" href="{{ route('jobs.index') }}">Load More Job Posts</a>
</div>






@endsection
