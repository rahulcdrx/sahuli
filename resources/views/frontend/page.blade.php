@include('layouts.header')
<div class="row content-padding" >
    <div class="col-6 col-md-4 table-center" >
        <?php if($jobs->category_id == 1) {?>
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
    <?php } elseif($jobs->category_id == 2) {?> 
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col"><a href="/user/govtlist"><button class="btn btn-secondary bt-md btn-block"> नवीन जॉब्स</button></a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><a href="/user/govtlist"><button class="btn btn-secondary bt-md btn-block">मार्केट स्किम </button></a></th>
                </tr>
            </tbody>
        </table>
    
    <?php } elseif($jobs->category_id == 3) { ?>
        <table class="table text-center">
            <thead>
                <tr>

                    <th scope="col"><a href="/user/govtsche"><button class="btn btn-secondary bt-md btn-block">आपले सरकार केंद्र सुविधा </button></th>

                </tr>
            </thead>
            <tbody>
                <tr>

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

                    <th><button class="btn btn-secondary bt-md btn-block">नागरिक दैनंदिन सुविधा </button></th>

                </tr>
                <tr>

                    <th><button class="btn btn-secondary bt-md btn-block">वैद्यकीय सुविधा </button></th>

                </tr>
                <tr>

                    <th><button class="btn btn-secondary bt-md btn-block">इतर सुविधा </button></th>

                </tr>


            </tbody>
        </table>


    <?php } elseif($jobs->category_id == 4) { ?>
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

    <?php } ?>
    </div>
    <div class=" col-md-8" style="padding-bottom:64px;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Advt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">PDF</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Link </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Social" role="tab" aria-controls="contact"
                    aria-selected="false">Social </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                style="padding-top:27px;"><img src="{{ asset('jobimage/'.$jobs->job_image)}}" alt="" width="259">
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding-top:27px;">
                <object width="100%" height="503" type="application/pdf" data="{{ asset('jobfile/'.$jobs->job_file)}}#toolbar=0" id="pdf_content">
                </object>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-lbelledby="contact-tab" style="padding-top:27px;">
                <a href="{{ $jobs->job_link }}" target="_blank">{{ $jobs->job_link }}</a>
            </div>

            <div class="tab-pane fade" id="Social" role="tabpanel" aria-labelledby="contact-tab" style="padding-top:27px;"><img
                    src="{{ asset('jobsocial/'.$jobs->job_social)}}" alt="" width="259"></p>
            </div>
        </div>
    </div>

</div>

<!-- Footer-->
@include('layouts.footer')
