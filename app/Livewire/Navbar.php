<?php

namespace App\Livewire;

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
        return view('livewire.partials.navbar');
    }
}
