<?php

namespace App\Livewire\BillTab;

use App\Interfaces\ModalCrud;
use App\Models\Bill;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use FPDF;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class BillModal extends Component implements ModalCrud
{
    public $id = '';

    #[Rule('required')]
    public $studentID = '';

    #[Rule('required')]
    public $type = '';

    #[Rule('required')]
    public $payment_method = '';

    #[Rule('required')]
    public $amount = '';

    //#[Rule('required')]
    public $print_type = '';

    //#[Rule('required')]
    public $print_month = '';

    public function print(){
        $data = '';

        if($this->print_type === 'All'){
            $data = Bill::whereMonth('created_at', $this->print_month)->get();
        }else{
            $data = Bill::where('type', $this->print_type)
            ->whereMonth('created_at', $this->print_month)
            ->get();
        }

        $total = $data->sum('amount');

        $bills = [
            "bill" => $data,
            "dateToday" => date("F d, Y h:i a"),
            "total" => $total
        ];

        $pdf = Pdf::loadView('bill-pdf', $bills)->setOptions(['defaultFont' => 'sans-serif']);;

        return response()->streamDownload(function() use($pdf){
            echo $pdf->stream();
        },'exported_bill.pdf');
    }

    #[On('show-bill')]
    public function getSelectedItemInformation($id){
        $bill = Bill::find($id);

        if($bill){
            $this->id = $id;
            $this->studentID = $bill[0]['studentID'];
            $this->type = $bill[0]['type'];
            $this->amount = $bill[0]['amount'];
            $this->payment_method = $bill[0]['payment_method'];
        }
    }

    public function storeItem(){
        $validated = $this->validate();

        try{
            //Store database fields
            $billDta = [
                'studentID' => $validated['studentID'],
                'type' => $validated['type'],
                'amount' => $validated['amount'],
                'payment_method' => $validated['payment_method'],
            ];

            $billCreateUpdate = Bill::updateOrCreate(
                ['id' => $this->id], //Update the data if id is existing
                $billDta
            );

            if($billCreateUpdate){
                $this->dispatch('showToast', [
                    'mode' => 'success' ,
                    'message' => 'Successfully Updated/Created'
                ]);

                $this->dispatch('bill-created');
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
            'studentID', 
            'type', 
            'amount',
            'payment_method',
        ]);

        $this->id = '';
        $this->resetErrorBag();
    }

    #[On('delete-bill')]
    public function getItemID($id){
        $this->id = $id;
    }

    public function deleteItem(){
        try{
            $bill = Bill::where('id', $this->id)->delete();

            if($bill){
                $this->dispatch('bill-created');
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
    public function studentList(){
        return Student::all();
    }

    public function render()
    {
        return view('livewire.BillTab.bill-modal');
    }
}
