<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'banner',
        'title',
        'options',
        
        
    ];
    protected $casts = [
        'title' => 'string',
        'options'=>'object'
    ];
    protected $attributes = [
        'title' => '',
        
    ];
    public function promos()
    {
        return $this->belongsToMany(Promo::class);
    }
    // 
}
