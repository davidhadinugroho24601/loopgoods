<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'item_id'];

    // Relationship to the sender (User)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
 
    // Relationship to the receiver (User)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }


    // Relationship to the receiver (User)
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Relationship to the receiver (User)
    public function messages()
    {
          return $this->hasMany(Message::class);
    }
}
