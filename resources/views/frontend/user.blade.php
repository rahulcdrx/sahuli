@include('layouts.header')


<div class="container" style="padding-top: 45px;">
    @foreach($pay as $pays)
        <div class="container" style="padding-top: 45px;">
            <p style="color: red;padding: 8px;"><em class="help-block"><strong>Note*:</strong>Please Pay <strong class="blink_me">₹{{ $pays->plan }}</strong> on given details below to subscribe for <strong class="blink_me">1 year</strong>  and send your transaction details and transaction screenshot to administrator</em></p>
        <div class="row" style="padding-top: 45px;" >
      
        <div class="col-md-4">
            <p style="background: #393185;color: #fff;padding: 8px;"><b>GPAY No.</b></p>
            <p>{{ $pays->GPAY }}</p>
        </div>
        <div class="col-md-4">
            <p style="background: #393185;color: #fff;padding: 8px;"><b>Bank Details</b></p>
            <p>Account No. : {{ $pays->bank_acc }}</p>
            <p>IFSC Code : &nbsp;&nbsp;&nbsp;{{ $pays->ifsc }}</p>
            <p>Bank Name: State Bank India</p>
            <p>Branch Name: {{ $pays->branch }}</p>
            
            
        </div>
        <div class="col-md-4">
            <p style="background: #393185;color: #fff;padding: 8px;"><b>QR Code</b></p>
            <img src="{{ asset('uploads/'.$pays->QR_image) }}" alt="" width="259">
        </div>
        @endforeach
        

    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
 
    <div class="col-md-12" style="padding-top: 33px;">

        <form action="{{ route('requestform.store') }}" method="POST" enctype="multipart/form-data">
            <center>
                <h3><b>User Registration</b></h3>
            </center><br>
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', isset($request) ? $request->name : '') }}" placeholder="Enter Name" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">District</label>
                        <input type="text" class="form-control" name="district" placeholder="Enter District" value="{{ old('district', isset($request) ? $request->district : '') }}" required>
                        @if ($errors->has('district'))
                            <span class="text-danger">{{ $errors->first('district') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Mobile No.</label>
                        <input type="tel" class="form-control" name="mobile_no" placeholder="Enter Mobile" value="{{ old('mobile_no', isset($request) ? $request->mobile_no : '') }}" required>
                        @if ($errors->has('mobile_no'))
                            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Transaction No.</label>
                        <input type="text" class="form-control" name="transaction_no" placeholder="Enter Transaction" value="{{ old('transaction_no', isset($request) ? $request->transaction_no : '') }}" required>
                        @if ($errors->has('transaction_no'))
                            <span class="text-danger">{{ $errors->first('transaction_no') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Receipt Upload</label>
                        <input type="file" class="form-control" name="receipt_upload" value="{{ old('receipt_upload', isset($request) ? $request->receipt_upload : '') }}">
                        @if ($errors->has('receipt_upload'))
                            <span class="text-danger">{{ $errors->first('receipt_upload') }}</span>
                        @endif
                    </div>
                    
                   
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName">Taluka</label>
                        <input type="text" class="form-control" name="taluka" placeholder="Enter Taluka" required value="{{ old('taluka', isset($request) ? $request->taluka : '') }}">
                        @if ($errors->has('taluka'))
                            <span class="text-danger">{{ $errors->first('taluka') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Aadhar No.</label>
                        <input type="text" class="form-control" name="aadhar_no" placeholder="Enter Aadhar" required value="{{ old('aadhar_no', isset($request) ? $request->aadhar_no : '') }}">
                        @if ($errors->has('aadhar_no'))
                            <span class="text-danger">{{ $errors->first('aadhar_no') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email ID</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required value="{{ old('email', isset($request) ? $request->email : '') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Referral Name</label>
                        <input type="text" class="form-control" name="referral_name" placeholder="Enter Referral"
                            required value="{{ old('referral_name', isset($request) ? $request->referral_name : '') }}">
                            @if ($errors->has('referral_name'))
                            <span class="text-danger">{{ $errors->first('referral_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">DOB</label>
                        <input type="date" class="form-control" name="dob" placeholder="Enter DOB" required value="{{ old('dob', isset($request) ? $request->dob : '') }}">
                        @if ($errors->has('dob'))
                            <span class="text-danger">{{ $errors->first('dob') }}</span>
                        @endif
                    </div>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div><br><br>
</div>
<div class="container">
    <h3><b>शुल्क भरणा प्रोसेस</b></h3><br>
    <p align="justify">
&nbsp;&nbsp;&nbsp;१) सर्वप्रथम वेबसाईटवर गुगल पे नंबर वर  / बँक अकाँट नंबर वर  / क्यू. आर. कोड स्कॅन करून वार्षिक फि भरणे .<br><br>
 
&nbsp;&nbsp;&nbsp;२) फि भरल्यानंतर सदर रिसीटचा स्क्रिनशॉट सेव्ह करणे.<br><br>

 
&nbsp;&nbsp;&nbsp;३) रजिस्ट्रेशन फॉर्म भरणे  सदर फॉर्म मध्ये रिसीटचा स्क्रिनशॉट अपलोड करणे.<br><br>

&nbsp;&nbsp;&nbsp;४) रेफरल नेम या टॅबवर आवशक असल्यास अन्य नाव टाकावे अन्यथा sahuli नाव टाकावे. <br><br>


&nbsp;&nbsp;&nbsp;५) फॉर्म पूर्ण भरून झाल्यावर सबमिट बटनावर क्लिक करावे.<br><br>


</p>
<p  align="justify" style="color:red; font-size: 18px;">&nbsp;&nbsp;&nbsp;टीप : फॉर्म सबमिट झाल्यानंतर आपण भरलेल्या  शुल्काची पडताळणी केल्यानंतर 24 तासात सदरील सेवा सुरु  करण्यात येईल. आपले युझर नेम व पासवर्ड आपल्या   &nbsp;&nbsp;&nbsp;रजिस्टर ईमेल वर मिळून जाईल.</p>
</div>
<br><br>
@include('layouts.footer')
