<div>
    <div wire:ignore.self class="modal fade" id="modal_addEditItem" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if($id)
                        <h5 class="modal-title" id="exampleModalLabel1">Student Information</h5>
                    @else
                        <h5 class="modal-title" id="exampleModalLabel1">Add new Student</h5>
                    @endif

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
                            
                            @if($id)
                                <span wire:loading.remove>Save Changes</span>
                            @else
                                <span wire:loading.remove>Add Student</span>
                            @endif
                        </button>
                    </div>
                        </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal_paymentHistory" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Payment History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date <i class='bx bx-sort'></th>
                                        <th>Type</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>

                                <div class="d-flex align-items-center justify-content-center w-100 h-100">
                                    <span wire:loading>
                                        <span class="spinner-border spinner-border-sm"></span>
                                        Loading...
                                    </span>
                                    
                                </div>

                                <tbody wire:loading.remove class="table-border-bottom-0" id="payment_history_table">
                                    @if(count($this->paymentHistory) === 0)
                                        <tr class="text-bg-secondary">
                                            <td colspan="4" class="text-center">
                                                <div class="alert alert-dark mb-0" role="alert">There are no available payment record</div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4"></td>    
                                        </tr>
                                    @else
                                        @foreach ($this->paymentHistory as $bill)
                                            <tr>
                                                <td>{{ date('F d, Y h:i a', strtotime($bill->created_at)) }}</td>
                                                <td>{{ $bill->type }}</td>
                                                <td>{{ $bill->payment_method }}</td>
                                                <td>{{ $bill->amount }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        </button>
                    </div>
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
    $('#modal_paymentHistory').on('hidden.bs.modal', function (e) {
        $('#payment_history_table').html('');
    });
</script>
@endscript

<script>
    
</script>