@extends('layouts.main')

@section('banner', 'Job: '.$job->title)

@section('content')
<div class="col-lg-8 post-list">
    <div class="single-post d-flex flex-row">

        <div class="details">
            <div class="title d-flex flex-row justify-content-between">
                <div class="titles">
                    <a href="#"><h4>{{ $job->title }}</h4></a>
                    @if($job->company)
                        <h6>{{ $job->company->name }}</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
