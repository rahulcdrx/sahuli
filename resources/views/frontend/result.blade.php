                    @include('layouts.header')



                        



                    <div class="row" style="    padding-left: 204px;padding-right: 213px;">

                    <div class="col-6 col-md-4">

                        <table class="table text-center">

                    <thead>

                         <tr>

                        

                        <th scope="col"><a href="/user/stdlist"><button class="btn btn-secondary bt-md btn-block">नवीन जाहिरात </button></a></th>

                        

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                        

                        <th><a href="/user/hallticket"><button class="btn btn-secondary bt-md btn-block">प्रवेशपत्र</button></a>

                    </th>

                        

                        </tr>

                        <tr>

                        

                        <th><a href="/user/result"><button class="btn btn-secondary bt-md btn-block">निकाल </button></a></th>

                        

                        </tr>
                    

                    </tbody>

                    </table></div>

                    <div class="col-12 col-md-8">

                    <h3>Result</h3>

                    <table class="table">

                    <thead class="thead-dark">

                        <tr>

                      

                        <th scope="col">Name</th>

                        <th scope="col">Link</th>

                        <th scope="col">Post Date</th>

                        </tr>

                    </thead>

                    <tbody>

                    

                    @foreach ($result as $results)

                        <tr>

                        

                        <td>{{$results->name}}</td>

                        <td>{{$results->link}}</td>

                        <td>{{$results->post_date}}</td>

                        

                        </tr>

                    @endforeach

                    

                        

                        

                    </tbody>

                    </table>

                    </div>



                    </div>



                    <!-- Footer-->

                    @include('layouts.footer')

