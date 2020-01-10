<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    public function delivery_dates()
    {
        return $this->hasMany('App\Delivery_date');
    }

    public function delivery_times_spans()
    {
        return $this->belongsToMany('App\Delivery_times_span');
    }
}
