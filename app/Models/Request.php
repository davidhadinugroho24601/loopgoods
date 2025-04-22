<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'sender_id',
        'recipient_id',
        'item_id',
        'status',

    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');

    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');

    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');

    }
}
