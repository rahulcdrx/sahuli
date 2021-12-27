@include('layouts.header')


<div class="row content-padding" >
    <div class="col-6 col-md-4 table-center" >
        <table class="table text-center">
            <thead>
                <tr>

                    <th scope="col"><a href="/user/govtsche"><button class="btn btn-secondary bt-md btn-block">आपले सरकार केंद्र सुविधा </button></a></th>

                </tr>
            </thead>
            <tbody>
                <tr></tr>

                    <th><a href="/user/govtsche"><button class="btn btn-secondary bt-md btn-block">शासकीय सुविधा </button></a>
                    </th>

                </tr>
                <tr>

                    <th><a href="/user/govtsche"><button class="btn btn-secondary bt-md btn-block">व्यावसायिक सुविधा </button></a></th>

                </tr>
                <tr>

                    <th><a href="/user/govtsche"><button class="btn btn-secondary bt-md btn-block">शैक्षणिक सुविधा </button></a></th>

                </tr>
                <tr>

                    <th><a href="/user/govtsche"><button class="btn btn-secondary bt-md btn-block">धार्मिक दर्शन सुविधा </button></a></th>

                </tr>
                <tr>

                    <th><a href="/user/govtsche"><button class="btn btn-secondary bt-md btn-block">नागरिक दैनंदिन सुविधा </button></a></th>

                </tr>
                <tr>

                    <th><a href="/user/govtsche"><button class="btn btn-secondary bt-md btn-block">वैद्यकीय सुविधा </button></a></th>

                </tr>
                <tr>

                    <th><a href="/user/govtsche"><button class="btn btn-secondary bt-md btn-block">इतर सुविधा </button></a></th>

                </tr>


            </tbody>
        </table>
    </div>
     <div class="col-12 col-md-8" id="job">
        <div class="col-md-12">
            <div class="row" style="padding-bottom: 31px;">
            
                @foreach ($job_shc as $job_shcs )

                <div class="col-sm-3" >
                    <div class="text-center">
                        <img class="rounded mx-auto d-block" src="{{ asset('jobimage/'.$job_shcs->job_image)}}" alt="no-image" width="131">
                       <a href="{{ url('user/jobpage/'.$job_shcs->id) }}"><h4>{{ $job_shcs->title }}</h4></a>
                    </div>
                </div>
                @endforeach       

                 </div>

                </div>
            </div>
</div>

@include('layouts.footer')

