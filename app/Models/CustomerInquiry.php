<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInquiry extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'tele_no' , 'order_no', 'reason_for_complaint' , 'inquiry'];

   

}
