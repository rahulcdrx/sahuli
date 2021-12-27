<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    public $table = 'advertisement';
    protected $fillable = [
        'name','advt_image'
     ];
}
