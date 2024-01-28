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
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Gender</th>
                    <th>Contact #</th>
                    <th>Assigned Room</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($this->students as $student)
                    <tr>
                        <td>{{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->contact }}</td>
                        <td>{{ $student->assigned_room }}</td>
                        <td>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                </i> Modify
                            </button>

                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="javascript:void(0);" wire:click='showSelectedStudent({{ $student->id }})' data-bs-toggle="modal" data-bs-target="#modal_viewStudentInformations">
                                    <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);" wire:click='deleteSelectedStudent({{ $student->id }})' data-bs-toggle="modal" data-bs-target="#modal_deletetion">
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
            {{ $this->students->links() }}
        </div>
    </div>
</div>