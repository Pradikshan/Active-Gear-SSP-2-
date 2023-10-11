<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'emp_id';

    protected $fillable = ['emp_id' , 'emp_name' , 'emp_NIC_no' , 'emp_address' , 'emp_access_level', 'status'];

   
}
