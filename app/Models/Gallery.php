<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    // protected $primaryKey = 'gallery_id';
    protected $fillable = [
        'item_id',
        'image'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
