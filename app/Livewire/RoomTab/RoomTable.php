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

    public function showSelectedItem($id){
        $this->dispatch('show-room', ['room-id' => $id]);
    }

    public function deleteSelectedItem($id){
        $this->dispatch('delete-room', ['room-id' => $id]);
    }

    #[Computed()]
    public function tableItems(){
        return Room::where(function ($query) {
            $query->where('room_name', 'like', "%{$this->search}%");
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);
    }

    #[On('room-created')]
    public function render()
    {
        return view('livewire.RoomTab.room-table');
    }
}
