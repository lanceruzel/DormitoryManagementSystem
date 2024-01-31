<div>
    <div wire:ignore.self class="modal fade" id="modal_addEditItem" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if($id)
                        <h5 class="modal-title" id="exampleModalLabel1">Room Information</h5>
                    @else
                        <h5 class="modal-title" id="exampleModalLabel1">Add new Room</h5>
                    @endif

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <form wire:submit="storeItem">
                                @include('Forms.room-form')
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
                            
                            @if($id)
                                <span wire:loading.remove>Save Changes</span>
                            @else
                                <span wire:loading.remove>Add Room</span>
                            @endif
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
                    You sure you want to delete this Room?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button class="btn btn-primary ms-2">
                        <span wire:loading>
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                            Deleting....
                        </span>
                        
                        <span wire:loading.remove wire:click='deleteItem'>Yes, confirm delete</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


@script
<script>
    $(document).ready(function(){
        $('#amenities-selection').select2({
            placeholder: 'Select one of the following',
            dropdownParent: $("#modal_addEditItem")
        });

        $('#amenities-selection').on('change', function(){
            let data = $(this).val();
            console.log(data);
            $wire.set('selectedAmenities', data);
        });
    });
</script>
@endscript
