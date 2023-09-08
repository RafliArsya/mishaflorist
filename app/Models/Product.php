<?php

namespace App\Models;

use App\Models\ProductPicture;
use App\Models\ProductCategory;
use App\Models\BaseModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['category', 'pictures'];
    protected $appends = ['discounted_percent'];
    protected $casts = [
        'quantity' => 'integer',
        'discounted' => 'integer',
        'featured' => 'boolean',
        'product_category_id' => 'integer',
    ];

    protected function getDiscountedPercentAttribute(): int
    {
        $orig_price = $this->price;
        $discount_price = $this->discounted;
        $disc_off = $discount_price>0 ? $orig_price - $discount_price : 0;
        $value = ($disc_off / $orig_price  * 100);
        return (int) $value;
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function pictures()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
