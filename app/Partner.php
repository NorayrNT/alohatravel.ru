<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public $dir = "/uploads/images/partners";

}
