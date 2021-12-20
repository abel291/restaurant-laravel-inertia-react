<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'alt',
        'title',
        'img'
    ];
    protected $hidden = ['imageable_id','imageable_type','created_at','updated_at'];
}
