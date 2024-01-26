<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Student Management</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Student List</h5>
            
            <button class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#modal_viewStudentInformations">+ Add Student</button>
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
                    <tr>
                        <td>Juan Dela Cruz</td>
                        <td>juandelacruz@gmail.com</td>
                        <td>Male</td>
                        <td>+639204732978</td>
                        <td>Room 303</td>
                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal_deletetion">Delete</button>

                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal_viewStudentInformations">View</button>                            
                        </td>
                    </tr>

                    <tr>
                        <td>Maria Mercedes</td>
                        <td>mariamercedes@gmail.com</td>
                        <td>Female</td>
                        <td>+639443442978</td>
                        <td>Room 303</td>
                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal_deletetion">Delete</button>

                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal_viewStudentInformations">View</button>   
                        </td>
                    </tr>

                    <tr>
                        <td>Juan Dela Cruz</td>
                        <td>juandelacruz@gmail.com</td>
                        <td>Male</td>
                        <td>+639204732978</td>
                        <td>Room 303</td>
                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal_deletetion">Delete</button>

                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal_viewStudentInformations">View</button>   
                        </td>
                    </tr>

                    <tr>
                        <td>Juan Dela Cruz</td>
                        <td>juandelacruz@gmail.com</td>
                        <td>Male</td>
                        <td>+639204732978</td>
                        <td>Room 303</td>
                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal_deletetion">Delete</button>

                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal_viewStudentInformations">View</button>   
                        </td>
                    </tr>
                </tbody>
            </table>

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
    </div>

    <div class="modal fade" id="modal_viewStudentInformations" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Student Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" id="" class="form-control" placeholder="Enter Name" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nameBasic" class="form-label">Last Name</label>
                            <input type="text" id="" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" id="" class="form-control" placeholder="DD/MM/YYY" />
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Gender</label>

                            <select class="form-select" aria-label="gender">
                                <option selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Home Address</label>
                            <input type="text" id="" class="form-control"
                                placeholder="Enter home address" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" id="" class="form-control" placeholder="Enter Email" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contact #</label>
                            <input type="tel" id="" class="form-control" placeholder="+63" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Emergency Contact Name</label>
                            <input type="text" id="" class="form-control"
                                placeholder="Enter Emergency Contact Name" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Emergency Contact #</label>
                            <input type="tel" id="" class="form-control" placeholder="+63" />
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
