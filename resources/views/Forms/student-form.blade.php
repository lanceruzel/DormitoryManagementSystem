<div>
    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-student-info" aria-controls="navs-justified-student-info"
                aria-selected="true">
                <i class="tf-icons bx bx-user"></i> Personal Information

                @if($errors->has('first_name')
                || $errors->has('middle_name')
                || $errors->has('last_name')
                || $errors->has('birthdate')
                || $errors->has('gender')
                || $errors->has('address')
                || $errors->has('email')
                || $errors->has('contact')
                || $errors->has('e_fullname')
                || $errors->has('e_contact')
                || $errors->has('e_address')
                || $errors->has('e_relation'))
                    <span class="badge badge-center rounded-pill bg-danger">!</span>
                @endif
            </button>
        </li>

        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-school" aria-controls="navs-justified-school" aria-selected="true">
                <i class="tf-icons bx bx-user"></i> School Information

                @if($errors->has('s_id')
                || $errors->has('s_college')
                || $errors->has('s_program'))
                    <span class="badge badge-center rounded-pill bg-danger">!</span>
                @endif
            </button>
        </li>

        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-etc" aria-controls="navs-justified-etc" aria-selected="false">
                <i class="tf-icons bx bx-user"></i> Etc

                @if($errors->has('assigned_room'))
                    <span class="badge badge-center rounded-pill bg-danger">!</span>
                @endif
            </button>
        </li>
    </ul>

    @if(session()->has('success'))
        <div class="alert alert-success mb-3" role="alert"> 
            {{ session('success') }} 
        </div>
    @endif

    <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-student-info" role="tabpanel">
            <div class="row mb-md-3">
                <div class="col-md-6 d-flex flex-column align-items-center mb-3 mb-md-0">
                    <img src="https://dummyimage.com/200/000/fff" alt="..." class="img-thumbnail" height="200px"
                        width="200px">

                    <button class="btn btn-primary mt-2 w-100">Upload</button>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">First Name</label>
                            <input wire:model="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                placeholder="Enter Name" />

                                <div class="invalid-feedback">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Middle Name</label>
                            <input wire:model="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror"
                                placeholder="Enter Name" />

                                <div class="invalid-feedback">
                                    @error('middle_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="nameBasic" class="form-label">Last Name</label>
                            <input wire:model="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                placeholder="Enter Name" />

                                <div class="invalid-feedback">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input wire:model="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" placeholder="DD/MM/YYY" />

                    <div class="invalid-feedback">
                        @error('birthdate')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Gender</label>

                    <select wire:model="gender" class="form-select @error('gender') is-invalid @enderror" aria-label="gender">
                        <option selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                    <div class="invalid-feedback">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Home Address</label>
                    <input wire:model="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Enter home address" />

                    <div class="invalid-feedback">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input wire:model="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" />

                    <div class="invalid-feedback">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact #</label>
                    <input wire:model="contact" type="tel" class="form-control @error('contact') is-invalid @enderror" placeholder="+63" />

                    <div class="invalid-feedback">
                        @error('contact')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="divider">
                <div class="divider-text fs-7">EMERGENCY CONTACT</div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input wire:model="e_fullname" type="text" class="form-control @error('e_fullname') is-invalid @enderror"
                        placeholder="Enter Emergency Contact Name" />

                        <div class="invalid-feedback">
                            @error('e_fullname')
                                {{ $message }}
                            @enderror
                        </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact #</label>
                    <input wire:model="e_contact" type="tel" class="form-control @error('e_contact') is-invalid @enderror" placeholder="+63" />

                    <div class="invalid-feedback">
                        @error('e_contact')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Address</label>
                    <input wire:model="e_address" type="text" class="form-control @error('e_address') is-invalid @enderror"
                        placeholder="Enter Emergency Contact Address" />

                        <div class="invalid-feedback">
                            @error('e_address')
                                {{ $message }}
                            @enderror
                        </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Relation</label>
                    <input wire:model="e_relation" type="text" class="form-control @error('e_relation') is-invalid @enderror" placeholder="Ex. Mother" />

                    <div class="invalid-feedback">
                        @error('e_relation')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="navs-justified-school" role="tabpanel">
            <div class="row mb-3">
                <div class="col-12 d-flex align-items-center justify-content-center flex-column">
                    <img src="https://dummyimage.com/500x600/454545/fff" alt="..." class="img-thumbnail"
                        height="600px" width="500px">

                    <div>
                        <button class="btn btn-outline-primary mt-2">View</button>
                        <button class="btn btn-primary mt-2">Upload</button>
                    </div>
                </div>
            </div>

            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 mb-3">
                    <label class="form-label">Student ID Number</label>
                    <input wire:model="s_id" type="text" class="form-control @error('s_id') is-invalid @enderror" placeholder="21-XXXX" />

                    <div class="invalid-feedback">
                        @error('s_id')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">College</label>
                    <input wire:model="s_college" type="text" class="form-control @error('s_college') is-invalid @enderror"
                        placeholder="College of Information Communication Technology" />

                        <div class="invalid-feedback">
                            @error('s_college')
                                {{ $message }}
                            @enderror
                        </div>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Program</label>
                    <input wire:model="s_program" type="text" class="form-control @error('s_program') is-invalid @enderror"
                        placeholder="Bachelor of Science in Information Technology Major in Network and Web Application" />

                        <div class="invalid-feedback">
                            @error('s_program')
                                {{ $message }}
                            @enderror
                        </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="navs-justified-etc" role="tabpanel">
            <div class="row">
                <div class="col-6 d-flex flex-column">
                    <label>
                        Assigned Room
                    </label>

                    <select wire:model="assigned_room" class="form-select @error('assigned_room') is-invalid @enderror" data-live-search="true" data-size="5">
                            <option value="0" disabled>Select Room</option>
                        
                        @foreach ($this->rooms as $item)
                            <option value="{{ $item->id }}">{{ $item->room_name }}</option>
                        @endforeach
                    </select>

                    <div class="invalid-feedback">
                        @error('assigned_room')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>