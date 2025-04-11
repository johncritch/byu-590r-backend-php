<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Category;

class Device extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'details_id'
    ];

    public function details()
    {
        return $this->hasOne(DeviceDetail::class, 'id', 'details_id');
    }

    // Assuming a many-to-many relationship with User
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}

