<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    public $fillable = ['name','url','parent_id','sort'];
}
