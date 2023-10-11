<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = ['product_id', 'supplier_id', 'product_name' , 'category' , 'brand', 'description' , 'size' , 'color' , 'price', 'image', 'stock'];

    public function locations(): BelongsToMany
    {
      return $this->belongsToMany(Location::class, 'product_locations', 'product_id', 'location_id')
        ->withTimestamps();
    }

    public function suppliers(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
