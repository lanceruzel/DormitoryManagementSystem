<?php

namespace App\Livewire\AdminPageIncludes;

use Livewire\Component;

class Navbar extends Component
{
    public function logout(){
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.AdminPagePartials.navbar');
    }
}
