<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    public $table = 'inventory_item';

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'unit_price',
    ];
}
