<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestform extends Model
{
    use HasFactory;
    public $table = 'request_form';
    protected $fillable = [
        'name','dob','gender','email','state','district','city','mobile_no','aadhar_no','transaction_no'
     ];
}
