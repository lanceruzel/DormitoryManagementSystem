<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $table = 'students';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'gender',
        'address',
        'email',
        'contact',
        'image',
        'e_fullname',
        'e_contact',
        'e_address',
        'e_relation',
        's_id',
        's_college',
        's_program',
        's_cor',
        'assigned_room',
    ];

    public function room(){
        return $this->belongsTo(Room::class, 'assigned_room');
    }
}
