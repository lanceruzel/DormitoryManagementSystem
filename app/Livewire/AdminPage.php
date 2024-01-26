<?php

namespace App\Livewire;

use Illuminate\Routing\Route;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layout.admin')]
class AdminPage extends Component
{
    public function render(){
        return view('livewire.admin-page', ['tab' => request()->route()->getName()]);
    }
}
