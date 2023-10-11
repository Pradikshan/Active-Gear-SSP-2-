<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'region'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_locations', 'location_id', 'product_id')
            ->withTimestamps();
    }

}
