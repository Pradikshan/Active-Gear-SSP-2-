<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rewardsprogram extends Model
{
    use HasFactory;

    protected $primaryKey = 'reward_program_ID';

    protected $fillable = ['reward_program_ID' , 'reward_program_name' , 'description', 'status'];

    
}
