<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Bill List</h5>

        <div class="d-flex flex-row">
            <input wire:model.live.debounce.200ms="search" class="form-control" type="text" placeholder="Search...">
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Assigned Room</th>
                    <th wire:click="doSort('created_at')">Bill Date <i class='bx bx-sort'></i></th>
                    <th>Bill Type</th>
                    <th wire:click="doSort('amount')">Amount <i class='bx bx-sort'></i></th>
                    <th>Payment Method</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                @foreach ($this->tableItems as $item)
                    <tr>
                        <td>{{ $item->student->first_name . ' ' . $item->student->last_name }}</td>
                        <td>{{ $item->student->room->room_name }}</td>
                        <td>{{ date('F d, Y h:i a', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->type }}</td>
                        <td>₱{{ number_format($item->amount, 2) }}</td>
                        <td class="text-center">{{ $item->payment_method }}</td>
                        <td>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                </i> Actions
                            </button>

                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="javascript:void(0);" wire:click='showSelectedItem({{ $item->id }})' data-bs-toggle="modal" data-bs-target="#modal_addEditItem">
                                    <i class="bx bx-edit-alt me-1"></i>Send Receipt (Email)</a>
                                <a class="dropdown-item" href="javascript:void(0);" wire:click='showSelectedItem({{ $item->id }})' data-bs-toggle="modal" data-bs-target="#modal_addEditItem">
                                    <i class="bx bx-edit-alt me-1"></i>Send Receipt (SMS)</a>
                                    
                                <a class="dropdown-item" href="javascript:void(0);" wire:click='showSelectedItem({{ $item->id }})' data-bs-toggle="modal" data-bs-target="#modal_addEditItem">
                                    <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);" wire:click='deleteSelectedItem({{ $item->id }})' data-bs-toggle="modal" data-bs-target="#modal_deleteItem">
                                    <i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="pagination">
        <div class="demo-inline-spacing d-flex justify-content-center align-items-center pe-3 justify-content-md-end">
            {{ $this->tableItems->links() }}
        </div>
    </div>
</div>

@script
<script>
    $wire.on('rooms-details', (event) => {
        console.log(event);
    });
</script>
@endscript