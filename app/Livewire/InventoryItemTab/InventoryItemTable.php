<?php

namespace App\Livewire\InventoryItemTab;

use App\Interfaces\Table;
use App\Models\InventoryItem;
use App\Models\RoomInventoryItem;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryItemTable extends Component implements Table{
    use WithPagination;

    public $search = '';

    public function showSelectedItem($id){
        $this->dispatch('show-inventory-item', ['item-id' => $id]);
    }

    public function deleteSelectedItem($id){
        $this->dispatch('delete-inventory-item', ['item-id' => $id]);
    }

    #[Computed()]
    public function tableItems(){
        $inventoryItems = InventoryItem::where(function ($query) {
            $query->where('name', 'like', "%{$this->search}%");
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);

        $inventoryItems->map(function ($item) {
            $totalUsed = RoomInventoryItem::where('inventoryItemID', $item->id)->sum('quantity_used');
            $item->stock_available = max($item->quantity - $totalUsed, 0);
            return $item;
        });

        return $inventoryItems;
    }

    #[On('item-created')]
    public function render()
    {
        return view('livewire.InventoryItemTab.inventory-item-table');
    }
}
