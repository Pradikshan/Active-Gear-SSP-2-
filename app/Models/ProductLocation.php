<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    use HasFactory;

    protected $table = 'product_locations';

    protected $fillable = ['stock'];

    // public function productLocations(): BelongsToMany
    // {
    //   return $this->belongsToMany(Location::class, 'product_locations')
    //     ->withTimestamps();
    // }
}
