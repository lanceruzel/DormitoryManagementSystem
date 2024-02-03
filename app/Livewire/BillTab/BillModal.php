<?php

namespace App\Livewire\BillTab;

use App\Interfaces\ModalCrud;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;

class BillModal extends Component implements ModalCrud
{
    #[On('show-student')]
    public function getSelectedItemInformation($id){
        // $student = Student::find($id);

        // if($student){
        //     $this->id = $id;
        //     $this->first_name = $student[0]['first_name'];
        //     $this->middle_name = $student[0]['middle_name'];
        //     $this->last_name = $student[0]['last_name'];
        //     $this->birthdate = $student[0]['birthdate'];
        // }
    }

    public function storeItem(){
        // $validated = $this->validate();

        // try{
        //     if($this->assigned_room){
        //         $roomCapacity = Room::where('id', $this->assigned_room)->pluck('room_capacity')->first();

        //         $dormers = Student::where('assigned_room', $this->assigned_room)->count();

        //         if($dormers >= $roomCapacity){
        //             return $this->addError('assigned_room', 'This room is already full. Please choose another room');
        //         }
        //     }

        //     $checkEmail = Student::where('email', $validated['email'])
        //                     ->where('id', '<>', $this->id)
        //                     ->first();

        //     if ($checkEmail) {
        //         return $this->addError('email', 'Email already exists');
        //     }

        //     //Store database fields
        //     $studentData = [
        //         'first_name' => $validated['first_name'],
        //         'middle_name' => $validated['middle_name'],
        //         'last_name' => $validated['last_name'],
        //         'birthdate' => $validated['birthdate'],
        //         'gender' => $validated['gender'],
        //         'address' => $validated['address'],
        //         'email' => $validated['email'],
        //         'contact' => $validated['contact'],
        //         'image' => $validated['image'],
        //         'e_fullname' => $validated['e_fullname'],
        //         'e_contact' => $validated['e_contact'],
        //         'e_address' => $validated['e_address'],
        //         'e_relation' => $validated['e_relation'],
        //         's_id' => $validated['s_id'],
        //         's_college' => $validated['s_college'],
        //         's_program' => $validated['s_program'],
        //         's_cor' => $validated['s_cor'],
        //         'assigned_room' => $validated['assigned_room'],
        //     ];

        //     //Check if it's an update and email has changed 
        //     if ($this->id && $this->email != $validated['email']) {
        //         $studentData['email'] = $validated['email'];
        //     }

        //     $studentCreate = Student::updateOrCreate(
        //         ['id' => $this->id], //Update the data if id is existing
        //         $studentData
        //     );

        //     if($studentCreate){
        //         $this->dispatch('showToast', [
        //             'mode' => 'success' ,
        //             'message' => 'Successfully Updated/Created'
        //         ]);

        //         $this->dispatch('student-created');
        //         $this->dispatch('close-add-edit-delete-modal');
        //     }else{
        //         $this->dispatch('showToast', [
        //             'mode' => 'danger' ,
        //             'message' => 'There seems to be a problem Updating/Creating this item.'
        //         ]);
        //     }
        // }catch(Exception $e){
        //     dump($e->getMessage());
        // }
    }

    #[On('reset-form')]
    public function resetForm(){
        // $this->reset([
        //     'id',
        //     'first_name', 
        //     'middle_name', 
        //     'last_name',
        //     'birthdate',
        //     'gender',
        //     'address',
        //     'email',
        //     'contact',
        //     'e_fullname',
        //     'e_contact',
        //     'e_address',
        //     'e_relation',
        //     's_id',
        //     's_college',
        //     's_program',
        //     'assigned_room',
        // ]);

        // $this->id = '';
        // $this->assigned_room = 0;

        // $this->resetErrorBag();
    }

    #[On('delete-student')]
    public function getItemID($id){
        // $this->id = $id;
    }

    public function deleteItem(){
        // try{
        //     $student = Student::where('id', $this->id)->delete();

        //     if($student){
        //         $this->dispatch('student-created');
        //         $this->dispatch('close-add-edit-delete-modal');
        //         $this->id = '';

        //         $this->dispatch('showToast', [
        //             'mode' => 'success' ,
        //             'message' => 'Successfully Deleted'
        //         ]);
        //     }else{
        //         $this->dispatch('showToast', [
        //             'mode' => 'danger' ,
        //             'message' => 'There seems to be a problem deleting this item.'
        //         ]);
        //     }
        // }catch(Exception $e){
        //     dump($e->getMessage());
        // }
    }

    public function render()
    {
        return view('livewire.BillTab.bill-modal');
    }
}
