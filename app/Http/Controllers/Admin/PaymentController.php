<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PaymentController extends Controller
{

    public function index()
    {
        $payment = Payment::all();
        return view('admin.payment.index', compact(['payment']));
    }


    public function create(Request $request,Payment $payment)
    {

        return view('admin.payment.create', compact(['payment']));
    }


    public function store(Request $request)
    {
        
        $payment = new Payment;
        $payment->GPAY = $request->input('GPAY');
        $payment->plan = $request->input('plan');
        $payment->bank_acc = $request->input('bank_acc');
        $payment->branch = $request->input('branch');
        $payment->ifsc = $request->input('ifsc');
        if($request->hasfile('QR_image'))
        {
            $image_file = $request->file('QR_image');
            $img_extension = $image_file->getClientOriginalExtension(); //getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/',$img_filename);
            $payment->QR_image = $img_filename;
        }
        //$payment->QR_image = $input['QR_image'];
        $payment->save();
        return redirect()->route('admin.payment.index', compact('payment'));
    }


    public function show($id)
    {
        //$payment->load('payment');
      //  $payment = Payment::findorFail($id);
      $payment = Payment::all();
        return view('admin.payment.show', compact('payment'));
    }


    public function edit(Payment $payment)
    {
       // $payment = Payment::findorFail($id);
        //dd($payment);
        return view('admin.Payment.edit', compact('payment'));
    }


    public function update(Request $request, $id)
    {
        $payment = new Payment($id);
        $payment->GPAY = $request->input('GPAY');
        $payment->plan = $request->input('plan');
        $payment->bank_acc = $request->input('bank_acc');
        $payment->branch = $request->input('branch');
        $payment->ifsc = $request->input('ifsc');

        if ($receipt_upload = $request->file('QR_image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $receipt_upload->getClientOriginalExtension();
            $receipt_upload->move($imageDestinationPath, $postImage);
            $input['QR_image'] = $postImage;
        }
         $payment->QR_image = $input['QR_image'];

        $payment->save();
        return redirect()->route('admin.payment.index', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        //$payment = Payment::findorFail($id);
        $payment->delete();
        return back();
    }
}
