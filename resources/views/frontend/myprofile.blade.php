@include('layouts.header')
<div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-2">
        <h1 class="center">My Profile</h1>
    </div>
    <div class="col-md-5"></div>
</div>
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <td>{{Auth::user()->name}}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Email</th>
                    <td>{{Auth::user()->email}}</td>
                </tr>
                <tr>
                    <th scope="col">Subscrition Date</th>
                    <td>{{Auth::user()->start_date}}</td>
                </tr>
                <tr>
                    <th scope="col"> Subscrition valid Up To</th>
                    <td>{{Auth::user()->end_date}}</td>
                </tr>
                
                <tr>
                    <th scope="col"> Subscrition valid Up To</th>
                    <td>{{Auth::user()->end_date}}</td>
                </tr>
                <tr>
                    <th scope="col"> Transaction Details </th>
                    <td>{{Auth::user()->trans_details}}</td>
                </tr>
                <tr>
                    <th scope="col"> Mob. No.</th>
                    <td>{{Auth::user()->mobile}}</td>
                </tr>
                <tr>
                    <th scope="col"> Aadhar No. </th>
                    <td>{{Auth::user()->aadhar}}</td>
                </tr>
                    <th scope="col"> Market Scheme </th>
                    <td><a href="{{ asset('userexcelfile/'.Auth::user()->excel_file)}}" download="">Download</a></td>
                </tr>
                 </tr>
                    <th scope="col"> Recommendation Letter </th>
                    <td><a href="{{ asset('userpdffile/'.Auth::user()->pdf_file) }}" download="">Download</a></td>
                    
                </tr>

            </tbody>
        </table>
    </div>
    <div class="col-md-3"></div>
</div>

@include('layouts.footer')
