<?php

namespace App\Livewire;

use App\Models\Student;
use Exception;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class StudentForm extends Component
{
    #[Rule('required|min:3')]
    public $first_name = '';

    #[Rule('required|min:3')]
    public $middle_name = '';

    #[Rule('required|min:3')]
    public $last_name = '';

    #[Rule('required|before:today')]
    public $birthdate = '';

    #[Rule('required|min:4')]
    public $gender = '';

    #[Rule('required|min:5')]
    public $address = '';

    #[Rule('required|email')]
    public $email = '';

    #[Rule('required|min:5')]
    public $contact = '';

    #[Rule('')]
    public $image = '';

    #[Rule('required|min:5')]
    public $e_fullname = '';

    #[Rule('required|min:5')]
    public $e_contact = '';

    #[Rule('required|min:3')]
    public $e_address = '';

    #[Rule('required|min:3')]
    public $e_relation = '';

    #[Rule('required|min:3')]
    public $s_id = '';

    #[Rule('required|min:3')]
    public $s_college = '';

    #[Rule('required|min:3')]
    public $s_program = '';

    #[Rule('')]
    public $s_cor = '';

    #[Rule('')]
    public $assigned_room = '';

    #[On('show-student')]
    public function getStudent($id = null){
        $student = Student::find($id);

        if($student){
            $this->first_name = $student[0]['first_name'];
            $this->middle_name = $student[0]['middle_name'];
            $this->last_name = $student[0]['last_name'];
            $this->birthdate = $student[0]['birthdate'];
            $this->gender = $student[0]['gender'];
            $this->address = $student[0]['address'];
            $this->email = $student[0]['email'];
            $this->contact = $student[0]['contact'];
            $this->image = $student[0]['image'];
            $this->e_fullname = $student[0]['e_fullname'];
            $this->e_contact = $student[0]['e_contact'];
            $this->e_address = $student[0]['e_address'];
            $this->e_relation = $student[0]['e_relation'];
            $this->s_id = $student[0]['s_id'];
            $this->s_college = $student[0]['s_college'];
            $this->s_program = $student[0]['s_program'];
            $this->s_cor = $student[0]['s_cor'];
            $this->assigned_room = $student[0]['assigned_room'];
        }
    }

    public function addStudent(){
        $validated = $this->validate();

        try{
            $studentCreate = Student::create([
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'last_name' => $validated['last_name'],
                'birthdate' => $validated['birthdate'],
                'gender' => $validated['gender'],
                'address' => $validated['address'],
                'email' => $validated['email'],
                'contact' => $validated['contact'],
                'image' => $validated['image'],
                'e_fullname' => $validated['e_fullname'],
                'e_contact' => $validated['e_contact'],
                'e_address' => $validated['e_address'],
                'e_relation' => $validated['e_relation'],
                's_id' => $validated['s_id'],
                's_college' => $validated['s_college'],
                's_program' => $validated['s_program'],
                's_cor' => $validated['s_cor'],
                'assigned_room' => $validated['assigned_room'],
            ]);

            if($studentCreate){
                //reset form
                $this->resetForm();
                
                session()->flash('success', 'Account successfully created.');

                //Pass/trigger data to another component
                $this->dispatch('student-created');
            }else{
                session()->flash('fail', 'There seems to be a problem creating this account.');
            }
        }catch(Exception $e){
            dump($e->getMessage());
        }
    }

    public function closeModal(){
        $this->resetForm();
    }

    public function resetForm(){
        $this->reset([
            'first_name', 
            'middle_name', 
            'last_name',
            'birthdate',
            'gender',
            'address',
            'email',
            'contact',
            'e_fullname',
            'e_contact',
            'e_address',
            'e_relation',
            's_id',
            's_college',
            's_program',
            'assigned_room',
        ]);
    }

    public function render()
    {
        return view('livewire.student-form');
    }
}
