<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $table =  "newsletters";
    protected $guarded= [];
    public $timestamps=false;
}
