<?php

namespace App\Livewire\StudentTab;

use App\Models\Room;
use App\Models\Student;
use Exception;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class StudentModal extends Component
{
    public $id = '';

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

    #[Rule('required|email|')]
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
    public function getSelectedItemInformation($id){
        $student = Student::find($id);

        if($student){
            $this->id = $id;
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

    public function storeItem(){
        $validated = $this->validate();

        try{
            $checkEmail = Student::where('email', $validated['email'])
                            ->where('id', '<>', $this->id)
                            ->first();

            if ($checkEmail) {
                return $this->addError('email', 'Email already exists');
            }

            //Store database fields
            $studentData = [
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
            ];

            //Check if it's an update and email has changed 
            if ($this->id && $this->email != $validated['email']) {
                $studentData['email'] = $validated['email'];
            }

            $studentCreate = Student::updateOrCreate(
                ['id' => $this->id], //Update the data if id is existing
                $studentData
            );

            if($studentCreate){
                $this->dispatch('showToast', [
                    'mode' => 'success' ,
                    'message' => 'Successfully Updated/Created'
                ]);

                $this->dispatch('student-created');
                $this->dispatch('close-add-edit-delete-modal');
            }else{
                $this->dispatch('showToast', [
                    'mode' => 'danger' ,
                    'message' => 'There seems to be a problem Updating/Creating this item.'
                ]);
            }
        }catch(Exception $e){
            dump($e->getMessage());
        }
    }

    #[On('reset-form')]
    public function resetForm(){
        $this->reset([
            'id',
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

        $this->id = '';
        $this->assigned_room = 0;

        $this->resetErrorBag();
    }

    #[On('delete-student')]
    public function getItemID($id){
        $this->id = $id;
    }

    public function deleteItem(){
        try{
            $student = Student::where('id', $this->id)->delete();

            if($student){
                $this->dispatch('student-created');
                $this->dispatch('close-add-edit-delete-modal');
                $this->id = '';

                $this->dispatch('showToast', [
                    'mode' => 'success' ,
                    'message' => 'Successfully Deleted'
                ]);
            }else{
                $this->dispatch('showToast', [
                    'mode' => 'danger' ,
                    'message' => 'There seems to be a problem deleting this item.'
                ]);
            }
        }catch(Exception $e){
            dump($e->getMessage());
        }
    }

    #[Computed()]
    public function rooms(){
        return Room::orderBy('room_name', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.StudentTab.student-modal');
    }
}
