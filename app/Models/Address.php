<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $fillable = ['name','tel','provence','city','area','detail_address','user_id'];
}
