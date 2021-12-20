<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'code',
        'type',
        'value',
        'stock',
        'active',
    ];
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'code' => 'string',
        'type' => 'string',
        'value' => 'integer',
        'stock' => 'integer',
        'active' => 'boolean',

    ];
    protected $attributes = [
        'active' => 1,
    ];


    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }
}
