<div>
    <div class="card mb-4">
        <h5 class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span>Account Information</span>
                </div>

                <div>
                    <button class="btn btn-primary btn-icon" wire:click='resetForm'>
                        <i class='bx bx-reset'></i>
                    </button>
                </div>
            </div>
        </h5>
        <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input wire:model="first_name" type="text"
                        class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter your first name"
                        autofocus />

                    <div class="invalid-feedback">
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input wire:model="last_name" type="text"
                        class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter your last name"
                        autofocus />

                    <div class="invalid-feedback">
                        @error('last_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input wire:model="email" type="text" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your email" />

                    <div class="invalid-feedback">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                @if($mode === 'create')
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-merge">
                            <input wire:model="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                            <div class="invalid-feedback">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Confirm password -->
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input wire:model="password_confirmation" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />

                        <div class="invalid-feedback">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input wire:model="password_old" type="password"
                            class="form-control @error('password_old') is-invalid @enderror"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />

                        <div class="invalid-feedback">
                            @error('password_old')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input wire:model="password_new" type="password"
                            class="form-control @error('password_new') is-invalid @enderror"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />

                        <div class="invalid-feedback">
                            @error('password_new')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                @endif  

                <div class="d-flex align-items-center justify-content-end">
                    @if($mode === 'create')
                        <button wire:click.prevent='storeItem' class="btn btn-primary d-grid mx-1">
                            <span wire:loading>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                                Loading....
                            </span>
                            
                                <span wire:loading.remove>Create Account</span>
                        </button>
                    @else
                        <button wire:click.prevent='deleteAccount' class="btn btn-outline-danger d-grid mx-1">
                            <span wire:loading>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                                Loading....
                            </span>
                            
                            <span wire:loading.remove>Delete</span>
                        </button>

                        <button wire:click.prevent='updateAccount' class="btn btn-primary d-grid mx-1">
                            <span wire:loading>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                                Loading....
                            </span>
                            
                            <span wire:loading.remove>Update</span>
                        </button>
                    @endif         
                </div>
        </div>
    </div>
</div>
