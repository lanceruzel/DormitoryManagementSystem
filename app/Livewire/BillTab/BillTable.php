<?php

namespace App\Livewire\BillTab;

use App\Interfaces\Table;
use App\Models\Bill;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class BillTable extends Component implements Table
{
    use WithPagination;

    public $search = '';

    public $sortDirection = 'DESC';
    public $sortColumn = 'created_at';

    public function doSort($column){
        // $newColumn = '';

        // if($column === 'first_name'){
        //     $this->sortColumn = 'students.' . $column;
        //     $newColumn = 'students.' . $column;

        // }else if($column === 'assigned_room'){
        //     $this->sortColumn = 'rooms.' . $column;
        //     $newColumn = 'rooms.' . $column;

        // }else {
        //     $this->sortColumn = 'bills.' . $column;
        //     $newColumn = 'bills.' . $column;
        // }

        // if($this->sortColumn === $newColumn){
        //     $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC':'ASC';
        //     return;
        // }

        if($this->sortColumn === $column){
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC':'ASC';
            return;
        }

        $this->sortColumn = $column;
        $this->sortDirection = 'DESC';
    }

    public function showSelectedItem($id){
        $this->dispatch('show-bill', ['bill-id' => $id]);
    }

    public function deleteSelectedItem($id){
        $this->dispatch('delete-bill', ['bill-id' => $id]);
    }

    #[Computed()]
    public function tableItems(){
        $test = Bill::join('students', 'bills.studentID', '=', 'students.id')
        ->leftJoin('rooms', 'students.assigned_room', '=', 'rooms.id')
        ->where(function ($query) {
            $query->where('students.first_name', 'like', "%{$this->search}%")
                ->orWhere('students.middle_name', 'like', "%{$this->search}%")
                ->orWhere('students.last_name', 'like', "%{$this->search}%")
                ->orWhere('rooms.room_name', 'like', "%{$this->search}%");
        })
        ->orderBy('bills.' . $this->sortColumn, $this->sortDirection)
        ->select('bills.*', 'students.*', 'rooms.room_name', 'bills.id')
        ->paginate(10);

        return $test;
    }

    #[On('bill-created')]
    public function render(){
        return view('livewire.BillTab.bill-table');
    }
}
