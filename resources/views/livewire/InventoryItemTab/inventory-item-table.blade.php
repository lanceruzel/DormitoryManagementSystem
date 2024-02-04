<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Item List</h5>

        <div class="d-flex flex-row">
            <input wire:model.live.debounce.200ms="search" class="form-control" type="text" placeholder="Search...">
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th wire:click="doSort('name')">Name <i class='bx bx-sort'></th>
                    <th>Description</th>
                    <th wire:click="doSort('quantity')" class="text-center">Stock Total <i class='bx bx-sort'></th>
                    <th wire:click="doSort('stock_available')" class="text-center">Stock Available <i class='bx bx-sort'></th>
                    <th wire:click="doSort('unit_price')" class="text-center">Unit Price <i class='bx bx-sort'></th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($this->tableItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td class="text-center">x{{ $item->quantity }}</td>
                        <td class="text-center">
                            @if ($item->stock_available === 0)
                                <span class="badge bg-label-warning">There are no stock left available</span>
                            @else
                                x{{ $item->stock_available }}
                            @endif
                        </td>
                        <td class="text-center">₱{{ $item->unit_price }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                </i> Modify
                            </button>

                            <div class="dropdown-menu" style="">
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