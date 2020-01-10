<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_date extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date','city_id'];

    public function city(){
        return $this->belongsTo('App\City');
    }
}
