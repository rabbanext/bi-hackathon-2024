<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpLog extends Model
{
    protected $fillable = ['user_id', 'otp', 'phone_number', 'status', 'response'];
}
