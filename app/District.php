<?php

namespace App;

use App\Job;
use App\State;
use App\Taluka;
use App\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;
    public $table = 'districts';
    protected $fillable = [
       'state_id','name'
    ];

 /*  public function taluka()
    {
        return $this->hasMany(Taluka::class);
    }*/

    public function location()
    {
        return $this->hasMany(Location::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }


    public function job()
    {
        return $this->hasmany(Job::class);
    }
}
