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

    public $sortDirection = 'DESC';
    public $sortColumn = 'name';

    public function doSort($column){
        if($this->sortColumn === $column){
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC':'ASC';
            return;
        }

        $this->sortColumn = $column;
        $this->sortDirection = 'DESC';
    }

    public function showSelectedItem($id){
        $this->dispatch('show-inventory-item', ['item-id' => $id]);
    }

    public function deleteSelectedItem($id){
        $this->dispatch('delete-inventory-item', ['item-id' => $id]);
    }

    #[Computed()]
    public function tableItems(){
        $inventoryItems = InventoryItem::selectRaw('*, (quantity - COALESCE((SELECT SUM(quantity_used) FROM room_inventory_item WHERE inventoryItemID = inventory_item.id), 0)) as stock_available')
        ->where('name', 'like', "%{$this->search}%")
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate(10);

    return $inventoryItems;
    }

    #[On('item-created')]
    public function render()
    {
        return view('livewire.InventoryItemTab.inventory-item-table');
    }
}
