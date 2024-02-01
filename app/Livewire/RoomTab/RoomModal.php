<?php

namespace App\Livewire\RoomTab;

use App\Interfaces\ModalCrud;
use App\Models\InventoryItem;
use App\Models\Room;
use Exception;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RoomModal extends Component implements ModalCrud
{
    public $selectedAmenities = [];

    public $id = '';

    #[Rule('required')]
    public $room_name = '';

    #[Rule('required')]
    public $room_capacity = '';

    #[Rule('required')]
    public $room_rate = '';

    #[Rule('required')]
    public $comfort_room = false;

    #[Rule('required')]
    public $status = '';

    #[On('show-room')]
    public function getSelectedItemInformation($id){
        $item = Room::find($id);

        if($item){
            $this->id = $id;
            $this->room_name = $item[0]['room_name'];
            $this->room_capacity = $item[0]['room_capacity'];
            $this->room_rate = $item[0]['room_rate'];
            $this->comfort_room = $item[0]['comfort_room'];
            $this->status = $item[0]['status'];
        }
    }

    public function storeItem(){
        $validated = $this->validate();

        try{
            $checkIfExisting = Room::where('room_name', $validated['room_name'])
                            ->where('id', '<>', $this->id)
                            ->first();

            if ($checkIfExisting) {
                return $this->addError('room_name', 'Room name already exists');
            }

            //Store database fields
            $itemData = [
                'room_name' => $validated['room_name'],
                'room_capacity' => $validated['room_capacity'],
                'room_rate' => $validated['room_rate'],
                'comfort_room' => $validated['comfort_room'],
                'status' => $validated['status'],
            ];

            //Check if it's an update and email has changed 
            if ($this->id && $this->room_name != $validated['room_name']) {
                $itemData['room_name'] = $validated['room_name'];
            }

            $itemCreateUpdate = Room::updateOrCreate(
                ['id' => $this->id], //Update the data if id is existing
                $itemData
            );

            if($itemCreateUpdate){
                $this->dispatch('showToast', [
                    'mode' => 'success' ,
                    'message' => 'Item successfully Updated/Created.'
                ]);

                $this->dispatch('room-created');
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
            'room_name', 
            'room_capacity', 
            'room_rate', 
            'comfort_room', 
            'status', 
        ]);

        $this->id = '';

        $this->resetErrorBag();
    }

    #[On('delete-room')]
    public function getItemID($id){
        $this->id = $id;
    }

    public function deleteItem(){
        try{
            $itemDelete = Room::where('id', $this->id)->delete();

            if($itemDelete){
                $this->dispatch('room-created');
                $this->dispatch('close-add-edit-delete-modal');
                $this->id = '';

                $this->dispatch('showToast', [
                    'mode' => 'success' ,
                    'message' => 'Successfully Deleted.'
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

    public function selectOptionItems(){
        return InventoryItem::orderBy('name', 'DESC')->get();
    }

    #[On('selected-amenities-changed')]
    #[Computed()]
    public function amenities(){
        $amenitiesInformation = InventoryItem::all();
        $this->dispatch('amenitiesList', ['amenities' => $amenitiesInformation]);
        return $amenitiesInformation;
    }

    public function render(){
        return view('livewire.RoomTab.room-modal');
    }
}
