<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_times_span extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['span'];

    public function cities()
    {
        return $this->belongsToMany('App\City');
    }
}
