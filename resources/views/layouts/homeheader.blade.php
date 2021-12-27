<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sahuli Computer </title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('public/css/css/styles.css')}}" rel="stylesheet" />
    <link href="{{ asset('public/css/webcustom.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <style rel="stylesheet">
        .news {
            width: 160px;
        }

        .news-scroll a {
            text-decoration: none;
        }

        .dot {
            height: 6px;
            width: 6px;
            margin-left: 3px;
            margin-right: 3px;
            margin-top: 2px !important;
            background-color: rgb(207, 23, 23);
            border-radius: 50%;
            display: inline-block
        }

        .bg-org {
            background-color: #F26522 !important;
        }

        .whats-app {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
            right: 15px;
        }

        .my-float {
            margin-top: 16px;
        }

        label {
            display: inline-block;

            font-family: 'proxima nova' !important;
            font-weight: bold !important;
        }
                    .btn-outline-infos {
                color: #000000 !important;
                border-color: #ffffff !important;
                background: #fff !important;
            }
                .btn-outline-infos:hover {
                color: #000000 !important;
                border-color: #ffffff !important;
                background: #fff !important;
            }
        .navbar-dark .navbar-nav .nav-link {
            color: rgb(251 251 251 / 100%) !important;
        }
        @media only screen and (max-width: 600px) {
  .logo {
    width: 119px;
  }
}
        
    </style> -->
    <!-- CSS only -->
    <style type="text/css">
        .advt{
            padding: 94px;
        }
        @media only screen and (max-width: 600px) {
          .advt{
                   padding: 15px;
                }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" style="background: #6C757D !important;">
        <div class="container px-4">
            <a class="navbar-brand" href="/"> <!-- @foreach($setting as $key => $settings) -->
                                <img src="{{ asset('setting/sahulilogo.png') }}" >

            </a><!-- @endforeach -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                   
                    
                    @guest
                     <li class="nav-item"><a class="nav-link" href="/" style="padding-top: 15px;">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about"style="padding-top: 15px;">About Us</a></li>

                     <li class="nav-item">
                       
                        <a class="nav-link" href="/login" style=" cursor: pointer;"><button class="btn btn-outline-infos">Login</button></a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        {{--  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>  --}}
                        <a class="nav-link" href="/login" style="    cursor: pointer;">Login</a>
                    </li>
                @endif
            @else
            <li class="nav-item"><a class="nav-link" href="/" >Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about" >About Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('user.myprofile')}}">My Profile</a>
                            <a class="dropdown-item" style="    cursor: pointer;"   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>

                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

   <div class="container-fluid">
      <div class="row" style="padding-top: 100px;">
        <div class="col-md-4">
                    <div id="carouselEx" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselEx" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselEx" data-slide-to="1"></li>
                            <li data-target="#carouselEx" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach($advertisement_left as $key => $advertisement_lefts)
                            <div class="carousel-item {{ $advertisement_lefts->active }}">
                                <img class="d-block w-100" src="{{asset('advertisement/'.$advertisement_lefts->advt_image)
                                }}" alt="First slide" style="height:230px !important;">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselEx" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselEx" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                        <div class="text-center">
                            @foreach($setting as $key => $settings)
                            <a  href="/"><img src="{{ asset('setting/'.$settings->logo) }}" class="logo" style="margin-top: -37px;"></a>
                            </a>@endforeach
                        </div>
                </div>
                <div class="col-md-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach($advertisement_right as $key => $advertisement_rights)
                            <div class="carousel-item {{ $advertisement_rights->active }}">
                                <img class="d-block w-100" src="{{asset('advertisement/'.$advertisement_rights->advt_image)
                                }}" alt="First slide" style="height:230px !important;">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($banner as $key => $banners)
            <div class="carousel-item active ">
                <img class="d-block w-100" src="{{asset('/banner/'.$banners->banner_img) }}" alt="First slide">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                    <div
                        class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-org py-2 text-white px-1 news">
                        <span class="d-flex align-items-center">&nbsp; Updates</span></div>
                    <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();"
                        onmouseout="this.start();">
                        @foreach($news_job as $key => $news_jobs)
                        <span class="dot"></span>
                        {{ $news_jobs->newsarea }}
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                    <div
                        class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-org py-2 text-white px-1 news">
                        <span class="d-flex align-items-center">&nbsp; Updates</span></div>
                    <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();"
                        onmouseout="this.start();">
                        @foreach($news_std as $key => $news_stds)
                        <span class="dot"></span>{{ $news_stds->newsarea }}
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <!-- About section-->

     <!-- About section-->

    <div class="row" style="padding-bottom: 31px;">
         @if(Auth::check() != NULL)
        @foreach ($category as $categorys )
        <div class="col-md-3">



            <div class="text-center">
                <a href="/user/{{$categorys->url}}"><img class="rounded mx-auto d-block category" src="{{ asset('catimage/'.$categorys->cat_image)}}" alt=""
                width="280"></a>
                {{-- <h2><a href="{{ url('/govtlist') }}">{{$categorys->name}}</a>
                    <h2> --}}
            </div>
        </div>
        @endforeach
        @else
        @foreach ($category as $categorys )
        <div class="col-md-3">



            <div class="text-center">
                <a href="/login"><img class="rounded mx-auto d-block category" src="{{ asset('catimage/'.$categorys->cat_image)}}" alt=""
                width="280"></a>
                {{-- <h2><a href="{{ url('/govtlist') }}">{{$categorys->name}}</a>
                    <h2> --}}
            </div>
        </div>
        @endforeach
        @endif

    </div>