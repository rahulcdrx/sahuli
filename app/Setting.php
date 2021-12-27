<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $table = 'settings';
    protected $fillable = [
        'name','logo','phone_no','address','email'
     ];
    use HasFactory;
}
