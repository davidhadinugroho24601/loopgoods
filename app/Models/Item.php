<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items'; // Menentukan nama tabel yang sesuai jika tidak mengikuti konvensi Laravel
    // protected $primaryKey = 'item_id';
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
    
    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

   
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     // Relasi ke gallery
     public function gallery()
     {
         return $this->hasMany(Gallery::class);
     }
}
