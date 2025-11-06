<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            $product->invoiceNumber = $product->generateInvoiceNumber();
        });
    }

    public function generateInvoiceNumber()
    {
        $uniqueId = str_pad($this->id ?? mt_rand(1000, 9999), 5, '0', STR_PAD_LEFT); // Random or ID
        return "#INV-{$uniqueId}";
    }
    public function orderData():Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value),
            set: fn($value) => json_encode($value)
        );
    }

}
