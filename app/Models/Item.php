<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'item_id';
    use HasFactory;
    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'description',
        'latitude',
        'longitude',
        'location',
        'image_path', 
    ];
}
