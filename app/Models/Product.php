<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'product_price', 'product_short_description', 'product_long_description', 
        'product_category_name', 'product_subcategory_name', 'product_category_id', 
        'product_subcategory_id', 'product_img', 'quantity', 'slug'
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function productVideos()
    {
        return $this->hasMany(ProductVideo::class, 'product_id');
    }

    // Quan hệ với Attribute
    public function attributes()
{
    return $this->belongsToMany(Attribute::class, 'product_attributes')
                ->withPivot('attribute_child_id'); // Bao gồm cột attribute_child_id nếu cần
}
}
