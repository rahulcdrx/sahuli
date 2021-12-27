@include('layouts.header')

<div class="container " style="padding-top: 45px;">
    <div class="row">
    <div class="col-md-1">        
    </div>

     @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    <div class="col-md-7">
        <center>
                <h3>Contact Us</h3>
            </center><br>
        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Mobile No.</label>
                        <input type="tel" class="form-control" name="mobile" placeholder="Enter Mobile" required>
                         @if ($errors->has('mobile'))
                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject" required>
                        @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Description</label>
                   
                       <textarea class="form-control" name="description" placeholder="Give description" rows="3" required></textarea>
                       @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                       @endif
                    </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        <br><br>
    </div>
    <div class="col-md-4">
        <h3><b>Address</b></h3>
        <p style="font-size:16px;">Sahuli Computer
        V. D. Gokhale Road ,Kubalwada
        Tal : Vengurla, Dist: Sindhudurg.<br>
        State: Maharashtra Pin 416516<p>
            <h3><b>Email Id</b></h3>
        <p style="font-size:16px;"><a href="mailto:support@sahulicomputer.com">support@sahulicomputer.com<p></a>
            <h3><b>Mobile No</b></h3>
        <p style="font-size:16px;">Rahul : <a href="tel:+91 9890415249 ">+91 9890415249 </a><br>
            Sonali : <a href="tel:+91 9890418249">+91 9890418249</a><br>
          <!--   Office : <a href="tel:+91 9405269119">+91 9405269119</a><p> -->
                <h3><b>Branch Contact</b></h3>
        <p style="font-size:16px;">Vengurla Branch<br>
            <a href="tel:+91 9890415249">+91 9890415249</a><br>
            Rahul Rajendra Prabhusalgaonkar<br><br>
            Shiroda Tank Branch <br>
            <a href="tel:+91 9890418249">+91 9890418249</a><br>
            Sonali Rahul Prabhusalgaonkar<br>
           <p>
    </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d347857.54180442763!2d73.85137678305065!3d15.574587119804887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbff94f7f47baa9%3A0x19e19616ddaabc65!2sSahuli%20Computer%20Sharvani%20Kripa!5e0!3m2!1sen!2sin!4v1639044293987!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>






@include('layouts.footer')
