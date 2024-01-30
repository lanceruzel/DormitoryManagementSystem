<div>
    <div wire:ignore.self class="modal fade" id="modal_addItem" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add new Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <form wire:submit="storeItem">
                                @include('Forms.student-form')
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary ms-2">
                            <span wire:loading>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                                Loading....
                            </span>
                            
                            <span wire:loading.remove>Add Student</span>
                        </button>
                    </div>
                        </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal_editItem" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Student Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <form wire:submit="storeItem">
                                @include('Forms.student-form')
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary ms-2">
                            <span wire:loading>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                                Loading....
                            </span>
                            
                            <span wire:loading.remove>Save changes</span>
                        </button>
                    </div>
                        </form>
            </div>
        </div>
    </div>
    
    <div wire:ignore.self class="modal fade" id="modal_deleteItem" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You sure you want to delete this Student Information?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary" wire:click='deleteItem'>Yes, confirm delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@script
<script>
    $('#modal_addItem').on('hidden.bs.modal', function (e) {
        $wire.dispatch('reset-form');
    });

    $('#modal_editItem').on('hidden.bs.modal', function (e) {
        $wire.dispatch('reset-form');
    });

    //Hide modal when successfully updated student or added
    $wire.on('close-add-edit-delete-modal', () => {
        $('#modal_editItem').modal('hide');
        $('#modal_addItem').modal('hide');
        $('#modal_deleteItem').modal('hide');
    });
</script>
@endscript