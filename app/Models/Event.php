<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'date',
        'venue',
        'title',
        'open',
        'start',
        'ticket_price',
        'stream_ticket_price',
        'stream_url',
        'status',
    ];
}
