<div class="container-xxl flex-grow-1 container-p-y">
    <div class="w-100 d-flex align-items-center justify-content-between">
        <h4 class="fw-bold py-3 mb-4">Account Management</h4>
    </div>

    <div class="row g-4">
        <div class="col">
            @livewire('AccountTab.AccountTable')
        </div>

        <div class="col">
            @livewire('AccountTab.AccountForm')
        </div>
    </div>
    
    
</div>