<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class IceCream extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','brand','type','price'
    ];

}