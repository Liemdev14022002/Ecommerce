<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeChild extends Model
{
    use HasFactory;

    protected $fillable = ['attribute_id ', 'value'];

    // Mối quan hệ với bảng Attribute
    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id ');
    }

    // Mối quan hệ với bảng ProductAttribute
    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
