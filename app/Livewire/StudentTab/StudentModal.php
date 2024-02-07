<?php

namespace App\Livewire\StudentTab;

use App\Models\Bill;
use App\Models\Room;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class StudentModal extends Component
{
    use WithFileUploads;

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

    #[Rule('nullable|sometimes|image|max:2058')]
    public $s_cor;

    public $old_cor;

    #[Rule('')]
    public $assigned_room = '';

    #[Rule('nullable|sometimes|image|max:2058')]
    public $image;

    public $old_img;

    public $iteration;

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
            $this->old_img = $student[0]['image'];
            $this->e_fullname = $student[0]['e_fullname'];
            $this->e_contact = $student[0]['e_contact'];
            $this->e_address = $student[0]['e_address'];
            $this->e_relation = $student[0]['e_relation'];
            $this->s_id = $student[0]['s_id'];
            $this->s_college = $student[0]['s_college'];
            $this->s_program = $student[0]['s_program'];
            $this->old_cor = $student[0]['s_cor'];
            $this->assigned_room = $student[0]['assigned_room'];
        }
    }

    public function storeItem(){
        $validated = $this->validate();
        $imagePath = null;
        $corPath = null;

        if($this->assigned_room){
            $roomCapacity = Room::where('id', $this->assigned_room)->pluck('room_capacity')->first();

            $dormers = Student::where('assigned_room', $this->assigned_room)->count();

            if($dormers >= $roomCapacity){
                return $this->addError('assigned_room', 'This room is already full. Please choose another room');
            }
        }

        $checkEmail = Student::where('email', $validated['email'])
                        ->where('id', '<>', $this->id)
                        ->first();

        if ($checkEmail) {
            return $this->addError('email', 'Email already exists');
        }

        ////////////////////////////////////////////////
        if($this->id){
            $student = Student::findOrFail($this->id)->first();
            $oldImage = $student->image;
            $oldCor = $student->s_cor;
            
            if($this->image){
                if($oldImage){
                    Storage::delete($oldImage);
                }

                $imagePath = $this->image->store('public/profile');
            }else{
                $imagePath = $oldImage;
            }

            if($this->s_cor){
                if($oldCor){
                    Storage::delete($oldCor);
                }

                $corPath = $this->s_cor->store('public/cor');
            }else{
                $corPath = $oldCor;
            }  
        } 
        
        if($this->id == ''){
            if($this->image) {
                $imagePath = $validated['image']->store('public/profile');
            } else {
                if($this->image == ''){
                    $imagePath = null;
                }
            }

            if($this->s_cor) {
                $corPath = $validated['s_cor']->store('public/cor');
            } else {
                if($this->s_cor == ''){
                    $corPath = null;
                }
            }
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
            'e_fullname' => $validated['e_fullname'],
            'e_contact' => $validated['e_contact'],
            'e_address' => $validated['e_address'],
            'e_relation' => $validated['e_relation'],
            's_id' => $validated['s_id'],
            's_college' => $validated['s_college'],
            's_program' => $validated['s_program'],
            's_cor' => $corPath,
            'assigned_room' => $validated['assigned_room'],
            'image' => $imagePath,
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
            'image',
            's_cor',
        ]);

        $this->id = '';
        $this->old_img = '';
        $this->image = null;
        $this->s_cor = null;
        $this->old_cor = '';
        $this->assigned_room = 0;
        $this->iteration++;
        $this->resetErrorBag();
    }

    #[On('delete-student')]
    #[On('payment-history-student')]
    public function getItemID($id){
        $this->id = $id;
    }

    #[Computed()]
    public function paymentHistory(){
        return Bill::where('studentID', $this->id)->get();
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
