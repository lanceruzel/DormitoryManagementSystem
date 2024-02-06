<?php

namespace App\Livewire\LoginAndRegisterForm;

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
                session()->flash('fail', 'These credentials do not match our records.');
            }
        }catch(Exception $e){
            dump($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.LoginAndRegisterForm.account-login-form');
    }
}
