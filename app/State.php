<?php

namespace App;

use App\Job;
use App\District;
use App\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
   // use HasFactory;

    public $table = 'states';
    protected $fillable = [
        'name'
    ];

    public function district()
    {
        return $this->hasMany(District::class);
    }

    public function location()
    {
        return $this->hasmany(Location::class);
    }


    public function job()
    {
        return $this->hasmany(Job::class);
    }
}
