<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Room List</h5>

        <div class="d-flex flex-row">
            <input wire:model.live.debounce.200ms="search" class="form-control" type="text" placeholder="Search...">
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Room Name</th>
                    <th class="text-center">Availability</th>
                    <th class="text-center">Own CR</th>
                    <th class="text-center">Capacity</th>
                    <th class="text-center">Rent Rate</th>
                    <th class="text-center">Amenities</th>
                    <th class="text-center">Assinged Students</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($this->tableItems as $item)
                    <tr>
                        <td>{{ $item->room_name }}</td>            
                        <td class="text-center">
                            @if($item->status === 'available')
                                <span class="badge bg-label-success">Available</span>
                            @elseif($item->status === 'under maintenance')
                                <span class="badge bg-label-warning">Under Maintenance</span>
                            @else
                                <span class="badge bg-label-danger">Unavailable</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($item->comfort_room == 1)
                                <span class="badge bg-label-success">Yes</span>
                            @else
                                <span class="badge bg-label-secondary">No</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $item->room_capacity }}</td>
                        <td class="text-center">₱{{ number_format($item->room_rate, 2) }}</td>
                        <td class="text-center">
                            <ul>
                                @if (count($item->items) === 0)
                                    <p>No amenity assigned to this room</p>
                                @else
                                    @foreach ($item->items as $inventory_item)
                                        <li class="form-check">
                                            <input class="form-check-input" type="checkbox" checked onclick="return false;">
                                            <label class="form-check-label">
                                                x{{ $inventory_item['quantity_used'] . ' ' . $inventory_item['inventory_item_name'] }}
                                            </label>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                        <td class="text-center">
                            <ul>
                                @if (count($item->students) === 0)
                                    <p>No students assigned to this room</p>
                                @else
                                    <ul>
                                        @foreach ($item->students as $student)
                                            <li>{{ $student['name'] }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </ul>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    </i> Modify
                                </button>

                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="javascript:void(0);" wire:click='showSelectedItem({{ $item->id }})' data-bs-toggle="modal" data-bs-target="#modal_addEditItem">
                                        <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);" wire:click='deleteSelectedItem({{ $item->id }})' data-bs-toggle="modal" data-bs-target="#modal_deleteItem">
                                        <i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
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