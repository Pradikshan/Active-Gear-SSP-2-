<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $primaryKey = 'supplier_id';

    protected $fillable = ['supplier_id', 'company_name', 'company_address' , 'email_address', 'telephone_no', 'status'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
