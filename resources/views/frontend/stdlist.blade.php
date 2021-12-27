@include('layouts.header')



<div class="row content-padding" >
    <div class="col-6 col-md-4 table-center" >
        <table class="table text-center">
            <thead>
                <tr>

                    <tr>

                        

                        <th scope="col"><a href="/user/stdlist"><button class="btn btn-secondary bt-md btn-block">नवीन जाहिरात</button></a></th>

                        

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                        

                        <th><a href="/user/hallticket"><button class="btn btn-secondary bt-md btn-block">प्रवेशपत्र</button></a>

                    </th>

                        

                        </tr>

                        <tr>

                        

                        <th><a href="/user/result"><button class="btn btn-secondary bt-md btn-block">निकाल</button></a></th>

                        

                        </tr>


            </tbody>
        </table>
    </div>
    <div class="col-12 col-md-8">
        <div class="col-md-12">
            <div class="row" style="padding-bottom: 31px;">
                @foreach ($job_std as $job_stds )

                <div class="col-sm-3">
                    <div class="text-center">
                        <img class="rounded mx-auto d-block" src="{{ asset('jobimage/'."$job_stds->job_image")}}" alt="" width="131">
                        <h4>{{ $job_stds->title }}</h4>>
                    </div>
                </div>
                @endforeach

            </div>




        </div>
    </div>

</div>
<a class="whats-app" href="https://api.whatsapp.com/send?phone=+917020775082" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>
@include('layouts.footer')
