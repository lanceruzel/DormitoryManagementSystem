<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomInventoryItem extends Model
{
    use HasFactory;

    public $table = 'room_inventory_item';

    protected $fillable = [
        'roomID',
        'inventoryItemID',
        'quantity_used',
    ];

    public function inventoryItem(){
        return $this->belongsTo(InventoryItem::class, 'inventoryItemID');
    }
}
