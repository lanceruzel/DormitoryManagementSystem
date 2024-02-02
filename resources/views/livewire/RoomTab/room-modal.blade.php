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
                        <form wire:submit="prepareStore" id="room-modal-form">
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
    selectedAmenitiesList = []; //amenities
    selectedIDs = []; //

    $(document).ready(function(){
        $('#amenities-selection').select2({
            placeholder: 'Select one of the following',
            dropdownParent: $("#modal_addEditItem"),
            allowClear: true,
        });

        $('#amenities-selection').on('change', function(){
            $wire.dispatch('selected-amenities-changed');
            let data = $(this).val();
            selectedIDs = data;
        });

        $wire.on('getAmenitiesList', (event) => {
            let amenities = event[0].amenities;

            //Check if the ids still exists on the container and if not then remove it
            selectedAmenitiesList = selectedAmenitiesList.filter(item =>
                selectedIDs.includes(String(item.inventoryItemID))
            );

            //Check if item is existing on the container and if not push the item
            $.each(amenities, function(key, value){
                if(selectedIDs.includes(String(value.id)) && !selectedAmenitiesList.some(item => item.inventoryItemID == value.id)){
                    selectedAmenitiesList.push({
                        'name': value.name,
                        'inventoryItemID': value.id,
                        'available': value.stock_available,
                        'quantity_used': 1
                    });
                }
            });

            //console.log(selectedAmenitiesList)
            displaySelectedAmenities();
        });

        $('#modal_addEditItem').on('hidden.bs.modal', function (e) {
            selectedAmenitiesList = [];
            $('#amenities-selection').val(null).trigger('change');
        });

        $wire.on('get-selected-amenities', (event) => {
            //Throw to php the selected amenities
            $wire.dispatch('retrieved-amenities-list', { selectedAmenities: selectedAmenitiesList });
        });

        $wire.on('room-stored-amenities', (event) => {
            //let amenities = event[0].amenities;
            //console.log(event[0][0]['id']);

            let selectIDs = [];

            $.each(event[0], function(key, value){
                selectedAmenitiesList.push({
                        'name': value.name,
                        'inventoryItemID': value.inventoryItemID,
                        'available': value.stock_available,
                        'quantity_used': value.quantity_used
                    });

                selectIDs.push(value.inventoryItemID);
                //console.log(value.inventoryItemID)
            });

            $('#amenities-selection').val(selectIDs); 
            $('#amenities-selection').trigger('change'); 
            //console.log(event[0]);
        });

        function displaySelectedAmenities(){
            let tableRows = '';

            $.each(selectedAmenitiesList, function(key, value){
                const { name, inventoryItemID, available, quantity_used } = value;

                const html = `
                <tr>
                    <td class="text-center">${ name }</td>
                    <td class="text-center">x${ available }</td>
                    <td class="text-center">x<span id="item-count-${ inventoryItemID }">${ quantity_used }</span></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-secondary btn-sm" onClick="minus_count(${ inventoryItemID })">
                            <i class='bx bx-minus'></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-sm" onClick="add_count(${ inventoryItemID })">
                            <i class='bx bx-plus'></i>
                        </button>
                    </td>
                </tr>
                `;

                tableRows += html;
            });

            $('#selected-amenities-table-container').html(tableRows);
        }
    });
</script>
@endscript

<script>
    function add_count(id){
        $.each(selectedAmenitiesList, function(key, value){
            if(value.inventoryItemID == id){
                let available = value.available;
                let quantity = value.quantity_used;

                if(quantity < available){
                    selectedAmenitiesList[key].quantity_used++;
                    $('#item-count-' + id).text(selectedAmenitiesList[key].quantity_used);
                }
            }
        });
    }

    function minus_count(id){
        $.each(selectedAmenitiesList, function(key, value){
            if(value.inventoryItemID == id){
                let available = value.available;
                let quantity = value.quantity_used;

                if(quantity >= 2){
                    selectedAmenitiesList[key].quantity_used--;
                    $('#item-count-' + id).text(selectedAmenitiesList[key].quantity_used);
                }
            }
        });
    }
</script>