<div class="container-xxl flex-grow-1 container-p-y">
    <div class="w-100 d-flex align-items-center justify-content-between">
        <h4 class="fw-bold py-3 mb-4">Bill Management</h4>

        <button class="btn btn-primary h-auto" data-bs-toggle="modal" data-bs-target="#modal_addEditItem">
            <i class="bx bx-plus"></i>Add Bill Payment
        </button>
    </div>

    @livewire('BillTab.BillTable')

    @livewire('BillTab.BillModal')
</div>