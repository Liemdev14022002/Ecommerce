<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function attributeChildren()
    {
        return $this->hasMany(AttributeChild::class,'attribute_id');
    }
    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
