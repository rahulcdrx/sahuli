@include('layouts.header')
<style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    <div class="text-center">
      <a href="https://api.whatsapp.com/send?phone=+919890415249&text=Require%20Recommendation%20Letter%20on%20my%20Email%20ID" target="_blank"><h3 class="blink_me" style="color:red;"> Recommendation Letter </h3></a>
    </div>
    </div>
    <div class="col-md-4">
    </div>
</div>
<div class="row content-padding" >
    <div class="col-6 col-md-4 table-center" >
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col"><a href="/user/pvtlist"><button class="btn btn-secondary bt-md btn-block"> नवीन जॉब्स</button></a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><a href="/user/pvtlist"><button class="btn btn-secondary bt-md btn-block">मार्केट स्किम </button></a></th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-12 col-md-8">
        <div class="col-md-12">
          <form id="search_form">
                <div class="row" style="padding-bottom: 44px;">
                    <div class="col">
                        <label for="state">State:</label>
                        <select id="state" name="state_id" class="form-control" required>
                            <option value="" selected disabled>Select State</option>
                            @foreach ($states as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="state">District:</label>
                        <select name="district_id" id="district" class="form-control" required>
                            
                        </select>
                    </div>
                    <div class="col">
                        <label for="name">Location/Taluka:</label>
                        <select name="location_id" id="location" class="form-control" required>

                        </select>
                    </div>
               
                    <div class="col">
                        <label>&nbsp;<label><br>
                        <input type="submit" value="Search" class="btn btn-secondary" id="search">
                    </div>
                </div>
</form>
                 <div class="col-12 col-md-8">
        <div class="col-md-12">
           <div class="row" id="jobitems">
             <br>  
            </div>
            </div>
            </div>
        <div class="col-12 col-md-8" id="job">
        <div class="col-md-12">
            <div class="row" style="padding-bottom: 31px;">
            
                @foreach ($job_pvt as $job_pvts )

                <div class="col-sm-3" >
                    <div class="text-center">
                        <img class="rounded mx-auto d-block" src="{{ asset('jobimage/'.$job_pvts->job_image)}}" alt="no-image" width="131">
                       <a href="{{ url('user/jobpage/'.$job_pvts->id) }}"><h4>{{ $job_pvts->title }}</h4></a>
                    </div>
                </div>
                @endforeach       

                 </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript'>
    $('#state').change(function(){
        var id = $(this).val();
        //alert(id);
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
    $("#location").append('<option>Select Location / Taluka</option>');
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


$('#search').click(function() {
    var id = $('#state').val();
    var district = $('#district').val();
    var location = $('#location').val();
    var site = "jobimage";
   
     
    //alert(district);
    //alert(id);
    if (id ) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
             type: "get",
             dataType: "json",
             url: 'getsearch/'+ id+ '/'+ district+'/'+location+'' ,
             data:{state_id:id,district_id:district,location_id:location},
             success: function(data){
                 //alert(data);
                 
     
                 $('#jobitems').empty()
                 $.each(data, function(index, item) { //'{{ URL::asset('/images/flags/') }}'
                 
         
       $('#jobitems').append('<div class="col-md-3"><div class="text-center"> <img class="rounded mx-auto d-block" src="{{ url('jobimage')}}/' + item.job_image +'" alt="" width="131"> <a href="{{url('user/jobpage')}}/' + item.id +'"><h4> '+ item.title +' </h4></a></div></div>')
       $("#job").hide();
    
       });




       //{{ asset("jobimage/".'+item.job_image+')}}
},
 error: function(XMLHttpRequest, textStatus, errorThrown) {
     $('#jobitems').append('<p>No result found</p>')
  }

        });
    } else{
        //$('#jobitems').append('<p>no result found</p>')
    }

 
});
$("#search_form").submit(function(e) {
    e.preventDefault();
});

</script>

@include('layouts.footer')


