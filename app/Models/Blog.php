<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    public $timestamps = true;
    protected $guarded = ['comments'];

    protected $casts = [
        'tags' => 'array',
        'published_at' => 'datetime',
    ];

    public function gallery(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? json_decode($value) : [],
            set: fn($value) => json_encode($value)
        );
    }

    public function comments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }
}
