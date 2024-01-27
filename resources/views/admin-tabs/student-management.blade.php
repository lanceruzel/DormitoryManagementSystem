<div class="container-xxl flex-grow-1 container-p-y">

    <div class="w-100 d-flex align-items-center justify-content-between">
        <h4 class="fw-bold py-3 mb-4">Student Management</h4>

        <button class="btn btn-primary h-auto" data-bs-toggle="modal" data-bs-target="#modal_viewStudentInformations">
            <i class="bx bx-plus"></i>Add Student
        </button>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Student List</h5>

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
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                </i> Modify
                            </button>

                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal_viewStudentInformations">
                                    <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal_deletetion">
                                    <i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="pagination">
            <div
                class="demo-inline-spacing d-flex justify-content-center align-items-center pe-3 justify-content-md-end">
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
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Student Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-justified-student-info"
                                aria-controls="navs-justified-student-info" aria-selected="true">
                                <i class="tf-icons bx bx-user"></i> Personal Information
                            </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-justified-school"
                                aria-controls="navs-justified-school" aria-selected="true">
                                <i class="tf-icons bx bx-user"></i> School Information
                            </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-etc"
                                aria-controls="navs-justified-etc" aria-selected="false">
                                <i class="tf-icons bx bx-user"></i> Etc
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-justified-student-info" role="tabpanel">
                            @if(1 === 1)
                                <div class="alert alert-success mb-3" role="alert"> Test Success {{ session('') }} </div>
                            @endif

                            <div class="row mb-md-3">
                                <div class="col-md-6 d-flex flex-column align-items-center mb-3 mb-md-0">
                                    <img src="https://dummyimage.com/200/000/fff" alt="..."
                                        class="img-thumbnail" height="200px" width="200px">

                                    <button class="btn btn-primary mt-2 w-100">Upload</button>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" id="" class="form-control"
                                                placeholder="Enter Name" />
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Middle Name</label>
                                            <input type="text" id="" class="form-control"
                                                placeholder="Enter Name" />
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="nameBasic" class="form-label">Last Name</label>
                                            <input type="text" id="" class="form-control"
                                                placeholder="Enter Name" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" id="" class="form-control"
                                        placeholder="DD/MM/YYY" />
                                </div>

                                <div class="col-md-6 mb-3">
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
                                    <input type="text" id="" class="form-control"
                                        placeholder="Enter Email" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Contact #</label>
                                    <input type="tel" id="" class="form-control"
                                        placeholder="+63" />
                                </div>
                            </div>

                            <div class="divider">
                                <div class="divider-text fs-7">EMERGENCY CONTACT</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" id="" class="form-control"
                                        placeholder="Enter Emergency Contact Name" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Contact #</label>
                                    <input type="tel" id="" class="form-control"
                                        placeholder="+63" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" id="" class="form-control"
                                        placeholder="Enter Emergency Contact Address" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Relation</label>
                                    <input type="text" id="" class="form-control"
                                        placeholder="Ex. Mother" />
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="navs-justified-school" role="tabpanel">
                            @if(1 === 1)
                                <div class="alert alert-success mb-3" role="alert"> Test Success {{ session('') }} </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-12 d-flex align-items-center justify-content-center flex-column">
                                    <img src="https://dummyimage.com/500x600/454545/fff" alt="..."
                                        class="img-thumbnail" height="600px" width="500px">

                                        <div>
                                            <button class="btn btn-outline-primary mt-2">View</button>
                                            <button class="btn btn-primary mt-2">Upload</button>
                                        </div>
                                </div>
                            </div>

                            <div class="row d-flex align-items-center justify-content-center">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Student ID Number</label>
                                    <input type="text" id="" class="form-control" placeholder="21-XXXX" />
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">College</label>
                                    <input type="text" id="" class="form-control" placeholder="College of Information Communication Technology" />
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Program</label>
                                    <input type="text" id="" class="form-control" placeholder="Bachelor of Science in Information Technology Major in Network and Web Application" />
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="navs-justified-etc" role="tabpanel">
                            <div class="row">
                                <div class="col-6 d-flex flex-column">
                                    <label>
                                        Assigned Room
                                    </label>
                                    
                                    <select class="selectpicker" data-live-search="true" data-size="5">
                                        
                                        <option value="" disabled>Room 303</option>
                                        <option value="">Room 305</option>
                                        <option value="">Room 305</option>
                                        <option value="">Room 305</option>
                                        <option value="">Room 305</option>
                                        <option value="">Room 305</option>
                                        <option value="">Room 305</option>
                                        <option value="">Room 305</option>
                                        <option value="">Room 305</option>
                                        <option value="">Room 305</option>
                                    </select>
                                </div>
                            </div>
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
