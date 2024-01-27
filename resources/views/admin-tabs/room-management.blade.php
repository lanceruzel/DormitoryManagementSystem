<div class="container-xxl flex-grow-1 container-p-y">
    <div class="w-100 d-flex align-items-center justify-content-between">
        <h4 class="fw-bold py-3 mb-4">Room Management</h4>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_viewStudentInformations">
            <i class="bx bx-plus"></i>Add Room
        </button>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Room List</h5>
            
            <div class="d-flex flex-row">
                <input class="form-control" type="text" placeholder="Ex. Juan Dela Cruz">
                <button class="ms-2 btn btn-primary d-flex flex-row align-items-center">
                    <i class="bx bx-search"></i> Find
                </button>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Availability</th>
                        <th>Capacity</th>
                        <th>Rent Rate</th>
                        <th>Amenities</th>
                        <th>Assinged Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>Room 403</td>
                        <td><span class="badge bg-label-success">Available</span></td>
                        <td>5</td>
                        <td>₱5,000.00</td>
                        <td>
                            <ul>
                                <li class="form-check">
                                    <input class="form-check-input" type="checkbox" checked onclick="return false;">
                                    <label class="form-check-label">
                                        Aircon
                                    </label>
                                </li>
    
                                <li class="form-check">
                                    <input class="form-check-input" type="checkbox" checked onclick="return false;">
                                    <label class="form-check-label">
                                        Comfort Room
                                    </label>
                                </li>
    
                                <li class="form-check">
                                    <input class="form-check-input" type="checkbox" checked onclick="return false;">
                                    <label class="form-check-label">
                                        Electric Fan
                                    </label>
                                </li>
    
                                <li class="form-check">
                                    <input class="form-check-input" type="checkbox" checked onclick="return false;">
                                    <label class="form-check-label">
                                        Water Dispenser
                                    </label>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li>Juan Dela Cruz</li>
                                <li>Palbo Escobar</li>
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    </i> Modify
                                </button>

                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal_viewStudentInformations">
                                        <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal_deletetion">
                                        <i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="pagination">
            <div class="demo-inline-spacing d-flex justify-content-center align-items-center pe-3 justify-content-md-end">
                <!-- Basic Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item first">
                            <a class="page-link" href="javascript:void(0);"><i
                                    class="tf-icon bx bx-chevrons-left"></i></a>
                        </li>
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);"><i
                                    class="tf-icon bx bx-chevron-left"></i></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">2</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">5</a>
                        </li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);"><i
                                    class="tf-icon bx bx-chevron-right"></i></a>
                        </li>
                        <li class="page-item last">
                            <a class="page-link" href="javascript:void(0);"><i
                                    class="tf-icon bx bx-chevrons-right"></i></a>
                        </li>
                    </ul>
                </nav>
                <!--/ Basic Pagination -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_viewStudentInformations" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Room Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Room Number</label>
                            <input type="text" id="" class="form-control" placeholder="Enter room number" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nameBasic" class="form-label">Capacity</label>
                            <input type="number" inputmode="numeric" id="" class="form-control" placeholder="Enter capacity" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3>
                            <label for="nameBasic" class="form-label">Rental Rate</label>
                            <input type="number" inputmode="numeric" id="" class="form-control" placeholder="Enter rate" />
                        </div>

                        <div class="col-6 mb-3>
                            <label for="nameBasic" class="form-label">Availability</label>
                            
                            <select class="form-control selectpicker">
                                <option value="" selected>Available</option>
                                <option value="">Unavailable</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Ammenities</label>
                            
                            <select class="form-control selectpicker" multiple title="Choose one of the following...">
                                <option value="">Aircon</option>
                                <option value="">Comfort Room</option>
                                <option value="">Electric Fan</option>
                                <option value="">Water Dispenser</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_deletetion" tabindex="-1" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary">Yes, confirm delete</button>
                </div>
            </div>
        </div>
    </div>
</div>