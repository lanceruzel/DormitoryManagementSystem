<?php

namespace App\Livewire\AccountTab;

use App\Models\Account;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AccountForm extends Component
{
    public $id = '';
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    //#[Rule('required|min:5|confirmed')]
    public $password = '';
    //#[Rule('required')]
    public $password_confirmation = '';
    public $password_old = '';
    public $password_new = '';
    
    #[On('show-account-item')]
    public function getUserAccount($id){
        $account = Account::find($id);

        if($account){
            $this->id = $id;
            $this->first_name = $account[0]['first_name'];
            $this->last_name = $account[0]['last_name'];
            $this->email = $account[0]['email'];
        }
    }    

    public function storeItem(){
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required'
        ]);

        $createAccount = Account::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        if($createAccount){
            $this->dispatch('showToast', [
                'mode' => 'success' ,
                'message' => 'Account Successfully Created.'
            ]);

            $this->resetForm();
            $this->dispatch('account-created');
        }else{
            $this->dispatch('showToast', [
                'mode' => 'warning' ,
                'message' => 'There seems to be a problem updating this account.'
            ]);
        }
    }

    public function updateAccount(){
        $withPassword = false;

        if(
            ($this->password_new !== '' && $this->password_old == '') 
            || ($this->password_new == '' && $this->password_old !== '')
            || ($this->password_new != '' && $this->password_old != '')) {
            $validated = $this->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'password_old' => 'required',
                'password_new' => 'required',
            ]);

            $withPassword = true;
        }else{
            $validated = $this->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
            ]);
        }
        
        $itemData = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
        ];

        $checkEmail = Account::where('email', $validated['email'])
                            ->where('id', '<>', $this->id)
                            ->first();

        if($checkEmail) {
            return $this->addError('email', 'Email already exists');
        }
        
        $account = Account::find($this->id)->first();

        //Check old password on database
        if($account && $withPassword){
            if (Hash::check($this->password_old, $account->password)) {
                $itemData['password'] = Hash::make($this->password_new);
            } else {
                return $this->addError('password_old', 'The old password is incorrect.');
            }
        }

        if ($account->email != $validated['email']) {
            $itemData['email'] = $validated['email'];
        }

        $itemCreateUpdate = Account::updateOrCreate(
            ['id' => $this->id],
            $itemData
        );

        if($itemCreateUpdate){
            $this->dispatch('showToast', [
                'mode' => 'success' ,
                'message' => 'Account Successfully Updated.'
            ]);

            $this->resetForm();
            $this->dispatch('account-created');
        }else{
            $this->dispatch('showToast', [
                'mode' => 'warning' ,
                'message' => 'There seem to be a problem updating this account.'
            ]);
        }
    }

    public function deleteAccount(){
        if($this->id){
            $accountDelete = Account::where('id', $this->id)->delete();
            
            if($accountDelete){
                $this->resetForm();

                $this->dispatch('showToast', [
                    'mode' => 'success' ,
                    'message' => 'Account Successfully Deleted.'
                ]);

                $this->dispatch('account-created');
            }else{
                $this->dispatch('showToast', [
                    'mode' => 'warning' ,
                    'message' => 'There seems to be a problem deleting this account.'
                ]);
            }
        }
    }

    public function resetForm(){
        $this->reset([
            'id',
            'first_name', 
            'last_name', 
            'email', 
            'password_old', 
            'password_new', 
            'password', 
            'password_confirmation', 
        ]);

        $this->id = '';

        $this->resetErrorBag();
    }

    public function render(){
        $mode = 'create';
        if($this->id){
            $mode = 'update';
        }else{
            $mode = 'create';
        }

        return view('livewire.AccountTab.account-form', ['mode' => $mode]);
    }
}
