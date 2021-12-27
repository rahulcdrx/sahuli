@include('layouts.homeheader')
<style type="text/css">
   
</style>
<div class="row" style="padding: 20px;background: orange;">
    <div class="col-md-3">
        <div class="text-center count">
            <span class="bg-ground"><h3 class="counter">{{ $govts }}</h3></span>
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="text-center count">
            <span class="bg-ground"><h3 class="counter">{{ $private }}</h3></span>
            
        
        </div>
    </div>
    <div class="col-md-3">
        <div class="text-center count">
            <span class="bg-ground"><h3 class="counter">{{ $student }}</h3></span>
            
        
        </div>
    </div>
    <div class="col-md-3">
        <div class="text-center count">
           <span class="bg-ground"><h3 class="counter">{{ $update }}</h3></span>
            
           
        </div>
    </div>
</div>

<div class="row" style="padding-top:51px;">
    <div class="col-md-12">
    <h3 class="text-center">Government Jobs</h1>
        <div class="row" style="padding-bottom: 31px;">
            @foreach($govts_job as $job)
            <div class="col-sm-3">
                <div class="text-center">

                    @if(Auth::check() != NULL)
                    <a href="{{ url('user/jobpage/'.$job->id) }}"><img class="rounded mx-auto d-block" src="{{ asset('/jobimage/'.$job->job_image)}}" alt="" height="100" width="131">
                        <h4 class="job-title">{{ $job->title }}</h4>
                    </a>
                    @else
                    <a href="{{ url('/login') }}"><img class="rounded mx-auto d-block" src="{{ asset('/jobimage/'.$job->job_image)}}" alt="" height="100" width="131">
                        <a href="{{ url('/login') }}"><h4 class="job-title">{{ $job->title }}</h4></a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row" style="padding-top:51px;">
    <div class="col-md-12">
    <h3 class="text-center">Private Jobs</h1>
        <div class="row" style="padding-bottom: 31px;">
            @foreach($private_job as $job)
            <div class="col-sm-3">
                <div class="text-center">

                    @if(Auth::check() != NULL)
                    <a href="{{ url('user/jobpage/'.$job->id) }}"><img class="rounded mx-auto d-block" src="{{ asset('/jobimage/'.$job->job_image)}}" alt="" height="100" width="131">
                        <h4 class="job-title">{{ $job->title }}</h4>
                    </a>
                    @else
                    <a href="{{ url('/login') }}"><img class="rounded mx-auto d-block" src="{{ asset('/jobimage/'.$job->job_image)}}" alt="" height="100" width="131">
                        <a href="{{ url('/login') }}"><h4 class="job-title">{{ $job->title }}</h4></a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row" style="padding-top:51px;">
    <div class="col-md-12">
    <h3 class="text-center"> Government scheme Jobs</h3>
        <div class="row" style="padding-bottom: 31px;">
            @foreach($student_job as $job)
            <div class="col-sm-3">
                <div class="text-center">

                    @if(Auth::check() != NULL)
                    <a href="{{ url('user/jobpage/'.$job->id) }}"><img class="rounded mx-auto d-block" src="{{ asset('/jobimage/'.$job->job_image)}}" alt="" height="100" width="131">
                        <h4 class="job-title">{{ $job->title }}</h4>
                    </a>
                    @else
                    <a href="{{ url('/login') }}"><img class="rounded mx-auto d-block" src="{{ asset('/jobimage/'.$job->job_image)}}" alt="" height="100" width="131">
                        <a href="{{ url('/login') }}"><h4 class="job-title">{{ $job->title }}</h4></a>

                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row" style="padding-top:51px;">
    <div class="col-md-12">
    <h3 class="text-center">Student Update </h3>
        <div class="row" style="padding-bottom: 31px;">
            @foreach($update_job as $job)
            <div class="col-sm-3">
                <div class="text-center">

                    @if(Auth::check() != NULL)
                    <a href="{{ url('user/jobpage/'.$job->id) }}"><img class="rounded mx-auto d-block" src="{{ asset('/jobimage/'.$job->job_image)}}" alt="" height="100" width="131">
                        <h4 class="job-title">{{ $job->title }}</h4>
                    </a>
                    @else
                    <a href="{{ url('/login') }}"><img class="rounded mx-auto d-block" src="{{ asset('/jobimage/'.$job->job_image)}}" alt="" height="100" width="131">
                        <a href="{{ url('/login') }}"><h4 class="job-title">{{ $job->title }}</h4></a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row downadvt">
    <div class="col-md-6 advt" >
        <div id="ExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#ExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#ExampleIndicators" data-slide-to="1"></li>
                <li data-target="#ExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($advertisement_d_left as $key => $advertisement_d_lefts)
                <div class="carousel-item {{ $advertisement_d_lefts->active }}">
                    <img class="d-block w-100" src="{{asset('advertisement/'.$advertisement_d_lefts->advt_image) }}"
                    alt="First slide" style="height:230px !important;">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#ExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#ExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="col-md-6 advt" >
        <div id="cExampleIndicator" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#cExampleIndicator" data-slide-to="0" class="active"></li>
                <li data-target="#cExampleIndicator" data-slide-to="1"></li>
                <li data-target="#cExampleIndicator" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($advertisement_d_right as $key => $advertisement_d_rights)
                <div class="carousel-item {{ $advertisement_d_rights->active }}">
                    <img class="d-block w-100" src="{{asset('advertisement/'.$advertisement_d_rights->advt_image) }}"
                    alt="First slide" style="height:230px !important;">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#cExampleIndicator" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#cExampleIndicator" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>


<a  class="whats-app" href="https://api.whatsapp.com/send?phone=+919890415249" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>
        <!-- Footer-->
        <!-- footer class="py-5 bg-dark">
            <div class="container">
                <div class="row">
                <div class="col">
                <div class="text-center" style="color: #fff;">
                 <a href="/about" style="color: #fff;"><h5>About Us</h5></a>
                </div>
                </div>
                <div class="col">
                <div class="text-center" style="color: #fff;">
                <a href="/policy" style="color: #fff;"><h5>Policy</h5></a>
                </div>
                </div>
               
                <div class="col">
                <div class="text-center" style="color: #fff;">
                <a href="/term" style="color: #fff;"><h5>Term & Condition</h5></a>
                </div>
                </div>
                <div class="col">
                <div class="text-center" style="color: #fff;">
                <a href="/faq" style="color: #fff;"><h5>FAQ</h5></a>
                </div>
                </div>
                <div class="col">
                <div class="text-center" style="color: #fff;">
                <a href="/contact" style="color: #fff;"><h5>Contact Us</h5></a>
                </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center" style="color: #fff; padding-top: 92px;">
                        Copyright © <?php echo date('Y'); ?> Sahuli Computer | Powered by <a href="http://coderix.io/" target="_blank" style="color:#F6721F;"> Coderix</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer> -->
        <!-- Footer -->
<footer class="page-footer font-small indigo" style="background-color:black">

  <!-- Footer Links -->
  <div class="container">

    <!-- Grid row-->
    <div class="row text-center d-flex justify-content-center pt-5 mb-3">

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="/about" style="color: #fff;">About Us</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="/policy" style="color: #fff;">Policy</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="/term" style="color: #fff;">Term & Condition</a>
        </h6></br>
        <!-- hitwebcounter Code START -->
<img src="https://hitwebcounter.com/counter/counter.php?page=7913961&style=0025&nbdigits=6&type=page&initCount=0" title="Free Counter" Alt="web counter"   border="0" width="142" />    
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="/faq" style="color: #fff;">FAQ</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
         <a href="/contact" style="color: #fff;">Contact Us</a>
        </h6>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->
    <hr class="rgba-white-light" style="margin: 0 15%;">

    <!-- Grid row-->
   
    <!-- Grid row-->
    <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

    <!-- Grid row-->
    

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color: #fff; padding-top: 92px;">
   Copyright © <?php echo date('Y'); ?> Sahuli Computer | Powered by <a href="http://coderix.io/" target="_blank" style="color:#F6721F;"> Coderix</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="public/css/js/scripts.js"></script>

        <script src="js/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

