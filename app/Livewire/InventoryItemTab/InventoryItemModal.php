<?php

namespace App\Livewire\InventoryItemTab;

use App\Interfaces\ModalCrud;
use App\Models\InventoryItem;
use App\Models\RoomInventoryItem;
use Exception;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class InventoryItemModal extends Component implements ModalCrud
{
    public $id = '';

    #[Rule('required')]
    public $name = '';

    #[Rule('required')]
    public $description = '';

    #[Rule('required')]
    public $quantity = '';

    #[Rule('required|min:1')]
    public $unit_price = '';

    #[On('show-inventory-item')]
    public function getSelectedItemInformation($id){
        $item = InventoryItem::find($id);

        if($item){
            $this->id = $id;
            $this->name = $item[0]['name'];
            $this->description = $item[0]['description'];
            $this->quantity = $item[0]['quantity'];
            $this->unit_price = $item[0]['unit_price'];
        }
    }

    public function storeItem(){
        $validated = $this->validate();

        try{
            if($this->id){
                $stockAvailable = RoomInventoryItem::where('inventoryItemID', $this->id)->sum('quantity_used');

                if($this->quantity < $stockAvailable){
                    return $this->addError('quantity', 'Please unassign this items first from the rooms before reducing the stock.');;
                }
            }

            $checkIfExisting = InventoryItem::where('name', $validated['name'])
                            ->where('id', '<>', $this->id)
                            ->first();

            if ($checkIfExisting) {
                return $this->addError('name', 'Item name already exists');
            }

            //Store database fields
            $itemData = [
                'name' => $validated['name'],
                'description' => $validated['description'],
                'quantity' => $validated['quantity'],
                'unit_price' => $validated['unit_price'],
            ];

            //Check if it's an update and email has changed 
            if ($this->id && $this->name != $validated['name']) {
                $itemData['name'] = $validated['name'];
            }

            $itemCreateUpdate = InventoryItem::updateOrCreate(
                ['id' => $this->id], //Update the data if id is existing
                $itemData
            );

            if($itemCreateUpdate){
                $this->dispatch('showToast', [
                    'mode' => 'success' ,
                    'message' => 'Item successfully Updated/Created.'
                ]);

                $this->dispatch('item-created');
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
            'name', 
            'description', 
            'quantity', 
            'unit_price', 
        ]);

        $this->id = '';

        $this->resetErrorBag();
    }

    #[On('delete-inventory-item')]
    public function getItemID($id){
        $this->id = $id;
    }

    public function deleteItem(){
        try{
            $itemDelete = InventoryItem::where('id', $this->id)->delete();

            if($itemDelete){
                $this->dispatch('item-created');
                $this->dispatch('close-add-edit-delete-modal');
                $this->id = '';

                $this->dispatch('showToast', [
                    'mode' => 'success' ,
                    'message' => 'Item successfully deleted.'
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

    public function render(){
        return view('livewire.InventoryItemTab.inventory-item-modal');
    }
}
