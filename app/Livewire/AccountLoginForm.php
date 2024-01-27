<?php

namespace App\Livewire;

use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AccountLoginForm extends Component
{

    #[Rule('required|email')]
    public $email = '';

    #[Rule('required')]
    public $password = '';

    public function login(){
        $validated = $this->validate();

        try{
            if(Auth::attempt($validated)){
                session()->regenerate();
                return redirect()->route('admin-dashboard');
            }else{
                session()->flash('fail', 'Account does not exists or your login credentials are wrong.');
            }
        }catch(Exception $e){
            dump($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.forms.account-login-form');
    }
}
