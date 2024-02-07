<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Student List</h5>

        <div class="d-flex flex-row">
            <input wire:model.live.debounce.200ms="search" class="form-control" type="text" placeholder="Search...">
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th wire:click="doSort('first_name')">Full Name <i class='bx bx-sort'></th>
                    <th>Email Address</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Contact #</th>
                    <th class="text-center">Assigned Room</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($this->tableItems) === 0)
                    <tr class="text-bg-secondary">
                        <td colspan="4" class="text-center">
                            <div class="alert alert-dark mb-0" role="alert">There are no record available</div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4"></td>    
                    </tr>
                @else
                    @foreach ($this->tableItems as $student)
                        <tr>
                            <td>{{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td class="text-center">{{ $student->gender }}</td>
                            <td class="text-center">{{ $student->contact }}</td>
                            <td class="text-center">{{ $student->room->room_name }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    </i> Modify
                                </button>

                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="javascript:void(0);" wire:click='selectedStudentPaymentHistory({{ $student->id }})' data-bs-toggle="modal" data-bs-target="#modal_paymentHistory">
                                        <i class="bx bx-money me-1"></i> View Payments</a>
                                    <a class="dropdown-item" href="javascript:void(0);" wire:click='showSelectedItem({{ $student->id }})' data-bs-toggle="modal" data-bs-target="#modal_addEditItem">
                                        <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);" wire:click='deleteSelectedItem({{ $student->id }})' data-bs-toggle="modal" data-bs-target="#modal_deleteItem">
                                        <i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div id="pagination">
        <div class="demo-inline-spacing d-flex justify-content-center align-items-center pe-3 justify-content-md-end">
            {{ $this->tableItems->links() }}
        </div>
    </div>
</div>

