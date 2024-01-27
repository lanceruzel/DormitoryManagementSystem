<?php

namespace App\Livewire;

use App\Models\Account;
use Exception;
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

        try{
            $createAccount = Account::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password'])
            ]);

            if($createAccount){
                session()->flash('success', 'Account successfully created.');
                $this->reset(['first_name', 'last_name', 'email', 'password', 'password_confirmation']);
            }else{
                session()->flash('fail', 'There seems to be a problem creating this account.');
            }
        }catch(Exception $e){
            dump($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.forms.account-registration-form');
    }
}
