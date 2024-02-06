<?php

namespace App\Livewire\AccountTab;

use App\Interfaces\Table;
use App\Models\Account;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class AccountTable extends Component implements Table
{
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
        $this->dispatch('show-account-item', ['item-id' => $id]);
    }

    public function deleteSelectedItem($id){
        
    }

    #[Computed()]
    public function tableItems(){
        $accounts = Account::orderBy($this->sortColumn, $this->sortDirection)
                        ->selectRaw('*, CONCAT(first_name, " ", last_name) AS fullname')
                        ->paginate(10);

        return $accounts;
    }

    #[On('account-created')]
    public function render()
    {
        return view('livewire.AccountTab.account-table');
    }
}
