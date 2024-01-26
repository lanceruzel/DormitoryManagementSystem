<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class AccountLoginForm extends Component
{

    #[Rule('required|email')]
    public $email = '';

    #[Rule('required')]
    public $password = '';

    public function login(){
        //First method of validation
        // $this->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        $this->validate();
    }

    public function render()
    {
        return view('livewire.forms.account-login-form');
    }
}
