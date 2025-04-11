<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeviceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_name',
        'description',
        'specifications',
        'picture',
        'release_date',
        'release_price',
        'units_sold'
    ];
}

