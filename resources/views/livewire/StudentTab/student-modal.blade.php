<div>
    <div wire:ignore.self class="modal fade" id="modal_addStudent" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add new Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <form wire:submit="storeStudent">
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

    <div wire:ignore.self class="modal fade" id="modal_editStudent" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Student Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <form wire:submit="storeStudent">
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
    
    <div wire:ignore.self class="modal fade" id="modal_deleteStudent" tabindex="-1" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary" wire:click='deleteStudent'>Yes, confirm delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@script
<script>
    $('#modal_editStudent').on('hidden.bs.modal', function (e) {
        $wire.dispatch('reset-form');
    });

    $('#modal_addStudent').on('hidden.bs.modal', function (e) {
        $wire.dispatch('reset-form');
    });

    //Hide modal when successfully updated student or added
    $wire.on('close-student-add-edit-delete-modal', () => {
        $('#modal_editStudent').modal('hide');
        $('#modal_addStudent').modal('hide');
        $('#modal_deleteStudent').modal('hide');
    });
</script>
@endscript