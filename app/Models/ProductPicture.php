<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPicture extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $appends = ['url', 'name'];

    protected function getUrlAttribute(): string
    {
        return asset($this->path);
    }

    protected function getNameAttribute(): string
    {
        return basename($this->path);
    }

    protected function path(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>  str_replace(asset('"/"'), "", "$value"),
            get: fn ($value) =>  "storage/$value"
        );
    }
}
