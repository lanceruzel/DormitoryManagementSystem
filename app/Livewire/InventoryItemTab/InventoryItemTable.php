<?php

namespace App\Livewire\InventoryItemTab;

use App\Interfaces\Table;
use App\Models\InventoryItem;
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
        return InventoryItem::where(function ($query) {
            $query->where('name', 'like', "%{$this->search}%");
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);
    }

    #[On('item-created')]
    public function render()
    {
        return view('livewire.InventoryItemTab.inventory-item-table');
    }
}
