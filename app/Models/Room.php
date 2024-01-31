<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $table = 'rooms';

    protected $fillable = [
        'room_name',
        'room_capacity',
        'room_rate',
        'comfort_room',
        'status',
    ];
}
