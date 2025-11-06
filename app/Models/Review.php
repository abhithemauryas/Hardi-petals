<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function info():Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value),
            set: fn($value) => json_encode($value)
        );
    }

    public function createdAt():Attribute
    {
        return Attribute::make(
            get: fn($value) => date('d-m-Y', strtotime($value))
        );
    }
}
