<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giftcard extends Model
{
    use HasFactory;

    protected $primaryKey = 'giftcard_id';

    protected $fillable = ['giftcard_id', 'giftcard_name', 'amount', 'status'];

    
}
