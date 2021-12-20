<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'img',
        'active',
    ];
    protected $casts = [
        'title' => 'string',
        'sub_title' => 'string',       
        'active' => 'boolean',
    ];
    protected $attributes = [
        'active' => 1,
    ];
    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
