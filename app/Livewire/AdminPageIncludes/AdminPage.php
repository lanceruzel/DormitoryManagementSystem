<?php

namespace App\Livewire\AdminPageIncludes;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.admin-page-layout')]
class AdminPage extends Component
{
    public function render(){
        return view('livewire.admin-page', ['tab' => request()->route()->getName()]);
    }
}
