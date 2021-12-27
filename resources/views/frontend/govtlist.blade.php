@include('layouts.header')

<div class="row content-padding" >
    <div class="col-6 col-md-4 table-center" >
        <table class="table text-center">
            <thead>
                <tr>

                    <th scope="col"><a href="/user/govtlist"><button class="btn btn-secondary bt-md btn-block">नवीन जाहिरात </button></a></th>

                </tr>
            </thead>
            <tbody>
                <tr>

                    <th><a href="/user/hallticketgovt"><button class="btn btn-secondary bt-md btn-block">प्रवेशपत्र </button></a>
                    </th>

                </tr>
                <tr>

                    <th><a href="/user/resultgovt"><button class="btn btn-secondary bt-md btn-block">निकाल </button></a></th>

                </tr>

            </tbody>
        </table>
    </div>
    <div class="col-12 col-md-8">
        <div class="col-md-12">
            <div class="row" style="padding-bottom: 31px;">

               
                        @foreach ($job_gov as $job_govs )

                <div class="col-sm-3">
                    <div class="text-center">
                        <img class="rounded mx-auto d-block" src="{{ asset('jobimage/'.$job_govs->job_image)}}" alt="" width="131">
                         <a href="{{ url('user/jobpage/'.$job_govs->id) }}"><h4>{{ $job_govs->title }}</h4></a>
                    </div>
                </div>
                @endforeach
                

            </div>




        </div>
    </div>

</div>

@include('layouts.footer')
