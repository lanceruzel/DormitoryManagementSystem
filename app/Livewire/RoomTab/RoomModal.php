<?php

namespace App\Livewire\RoomTab;

use App\Interfaces\ModalCrud;
use App\Models\InventoryItem;
use App\Models\Room;
use App\Models\RoomInventoryItem;
use Exception;
use Illuminate\Support\Facades\DB;
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

        $roomInventory = $roomInventory = RoomInventoryItem::join('inventory_item', 'room_inventory_item.inventoryItemID', '=', 'inventory_item.id')
        ->leftJoin(DB::raw('(SELECT inventoryItemID, SUM(quantity_used) as total_used FROM room_inventory_item GROUP BY inventoryItemID) as subquery'), function ($join) {
            $join->on('room_inventory_item.inventoryItemID', '=', 'subquery.inventoryItemID');
        })
        ->where('room_inventory_item.roomID', $id)
        ->select(
            'room_inventory_item.id',
            'room_inventory_item.roomID',
            'room_inventory_item.inventoryItemID',
            'room_inventory_item.quantity_used',
            'inventory_item.name',
            'inventory_item.description',
            'inventory_item.quantity',
            'inventory_item.unit_price',
            DB::raw('COALESCE(inventory_item.quantity - COALESCE(subquery.total_used, 0), 0) as stock_available')
        )
        ->get();

        if($roomInventory){
            $this->dispatch('room-stored-amenities', $roomInventory);
        }
    }

    public function prepareStore(){
        $this->dispatch('get-selected-amenities');
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
                $roomID = $itemCreateUpdate->id;

                if($this->roomInventoryUpdateCreate($roomID, $this->selectedAmenities)){
                    $this->dispatch('showToast', [
                        'mode' => 'success' ,
                        'message' => 'Item successfully Updated/Created.'
                    ]);
    
                    $this->dispatch('room-created');
                    $this->dispatch('close-add-edit-delete-modal');
                }else{
                    $this->dispatch('showToast', [
                        'mode' => 'warning' ,
                        'message' => 'Item successfully Updated/Created. But room amenities are not successfully inserted.'
                    ]);
    
                    $this->dispatch('room-created');
                    $this->dispatch('close-add-edit-delete-modal');
                }
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

    public function roomInventoryUpdateCreate($roomID, $selectedAmenities){
        
        foreach ($selectedAmenities as $item) {
            RoomInventoryItem::updateOrCreate(
                [
                    //Check first if these values are equal and if true just update the quantity_used and if not create instead
                    'roomID' => $roomID,
                    'inventoryItemID' => $item['inventoryItemID']
                ],
                [
                    'quantity_used' => $item['quantity_used']
                ]
            );
        }

        //Delete rows not in selectedAmenities
        $existingInventoryItemIDs = array_column($this->selectedAmenities, 'inventoryItemID');
        RoomInventoryItem::where('roomID', $roomID)
            ->whereNotIn('inventoryItemID', $existingInventoryItemIDs)
            ->delete();

        return true;
    }

    #[On('retrieved-amenities-list')]
    public function getSelectedAmenities($selectedAmenities){
        $this->selectedAmenities = $selectedAmenities;

        $this->storeItem();
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

        $amenitiesInformation->map(function ($item) {
            $totalUsed = RoomInventoryItem::where('inventoryItemID', $item->id)->sum('quantity_used');
            $item->stock_available = max($item->quantity - $totalUsed, 0);
            return $item;
        });

        $this->dispatch('getAmenitiesList', ['amenities' => $amenitiesInformation]);
        return $amenitiesInformation;
    }

    public function render(){
        return view('livewire.RoomTab.room-modal');
    }
}
