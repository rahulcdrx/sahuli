<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//
class Payment extends Model
{
    //use HasFactory;
    use SoftDeletes;

    public $table = 'payment';


    protected $dates = [
         'deleted_at',
    ];

    protected $fillable = [
        'GPAY','QR_image','bank_acc','ifsc','branch','plan'
     ];
}
