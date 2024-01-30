<?php

namespace App\Livewire\StudentTab;

use App\Interfaces\Table;
use App\Models\Student;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class StudentTable extends Component implements Table
{
    use WithPagination;

    public $search = '';

    public function showSelectedItem($id){
        $this->dispatch('show-student', ['student-id' => $id]);
    }

    public function deleteSelectedItem($id){
        $this->dispatch('delete-student', ['student-id' => $id]);
    }

    #[Computed()]
    public function tableItems(){
        return Student::where(function ($query) {
            $query->where('first_name', 'like', "%{$this->search}%")
                ->orWhere('middle_name', 'like', "%{$this->search}%")
                ->orWhere('last_name', 'like', "%{$this->search}%")
                ->orWhere('contact', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%");
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);
    }

    #[On('student-created')]
    public function render()
    {
        return view('livewire.StudentTab.student-table');
    }
}
