<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    public $table = 'locations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'state_id',
        'district_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'location_id', 'id');
    }


    public function district()
    {
        return $this->belongsTo(District::class,'district_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class,'state_id', 'id');
    }
}
