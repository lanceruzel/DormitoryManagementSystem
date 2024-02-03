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

    public function roomInventoryItems(){
        return $this->hasMany(RoomInventoryItem::class, 'roomID');
    }

    public function students(){
        return $this->hasMany(Student::class, 'assigned_room');
    }
}
