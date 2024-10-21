<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category',
        'rating',
    ];

    public function scopeRelated($query)
    {
        return $query->where('category', $this->category)->where('id', '!=', $this->id)->inRandomOrder()->limit(4)->get();
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
    }
}
