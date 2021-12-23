<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'address',
        'phone',
        'note',
        'products',
        'discount',
        'sub_total',
        'discount',
        'tax',
        'tax_amount',
        'shipping',
        'total',
        'state',
        'stripe_id',
    ];
    protected $casts = [
        'address' => 'string',
        'phone' => 'string',
        'note' => 'string',
        'products' => 'object',
        'discount' => 'object',
        'sub_total' => 'float',
        'tax_percent' => 'float',
        'tax_amount' => 'float',
        'shipping' => 'float',
        'total' => 'float',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
