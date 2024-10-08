<?php

namespace App\Livewire\RoomTab;

use App\Interfaces\Table;
use App\Models\Room;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RoomTable extends Component implements Table
{
    use WithPagination;

    public $search = '';

    public $sortDirection = 'DESC';
    public $sortColumn = 'created_at';

    public function doSort($column){
        if($this->sortColumn === $column){
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC':'ASC';
            return;
        }

        $this->sortColumn = $column;
        $this->sortDirection = 'DESC';
    }

    public function showSelectedItem($id){
        $this->dispatch('show-room', ['room-id' => $id]);
    }

    public function deleteSelectedItem($id){
        $this->dispatch('delete-room', ['room-id' => $id]);
    }

    #[Computed()]
    public function tableItems(){
        $rooms = Room::with(['roomInventoryItems.inventoryItem'])->where(function ($query) {
            $query->where('room_name', 'like', "%{$this->search}%");
        })
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate(10);

        foreach ($rooms as $room) {
            $roomItems = [];

            foreach ($room->roomInventoryItems as $roomInventoryItem) {
                $roomItems[] = [
                    'room_id' => $room->id,
                    'inventory_item_name' => $roomInventoryItem->inventoryItem->name,
                    'quantity_used' => $roomInventoryItem->quantity_used
                ];
            }

            $room->items = $roomItems;

            $studentItems = [];
            foreach ($room->students as $student) {
                $studentItems[] = [
                    'name' => $student->first_name . ' ' . $student->last_name,
                ];
            }

            $room->students = $studentItems;
        }
        
        return $rooms;
    }

    #[On('room-created')]
    public function render()
    {
        return view('livewire.RoomTab.room-table');
    }
}
