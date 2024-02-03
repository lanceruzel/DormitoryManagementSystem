<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public $table = 'bills';

    protected $fillable = [
        'studentID',
        'type',
        'amount',
        'payment_method',
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'studentID');
    }
}
