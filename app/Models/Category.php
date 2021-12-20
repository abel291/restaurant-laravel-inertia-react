<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'img',
    ];
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'img' => 'string',
        'active' => 'boolean',        
    ];
    protected $attributes = [
        'active' => 1,
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
