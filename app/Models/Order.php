<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['status', 'price', 'session_id', 'product_names'];

    protected $casts = [
        'product_names' => 'json',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    
}
