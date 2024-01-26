<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class AccountRegistrationForm extends Component
{
    #[Rule('required|min:3')]
    public $first_name = '';

    #[Rule('required|min:3')]
    public $last_name = '';

    #[Rule('required|email')]
    public $email = '';

    #[Rule('required|min:5|confirmed')]
    public $password = '';

    #[Rule('required')]
    public $password_confirmation = '';

    public function registerUser(){
        $validated = $this->validate();
        $this->reset(['first_name', 'last_name', 'email', 'password', 'password_confirmation']);

        session()->flash('success', 'Account successfully created.');
    }

    public function render()
    {
        return view('livewire.forms.account-registration-form');
    }
}
