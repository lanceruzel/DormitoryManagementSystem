<?php

namespace App\Livewire\BillTab;

use App\Interfaces\Table;
use App\Models\Bill;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class BillTable extends Component implements Table
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
        $test = Bill::where(function ($query) {
            $query->where('studentID', 'like', "%{$this->search}%");
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);

        $this->dispatch('rooms-details', $test);
        return $test;
    }

    public function render(){
        return view('livewire.BillTab.bill-table');
    }
}
