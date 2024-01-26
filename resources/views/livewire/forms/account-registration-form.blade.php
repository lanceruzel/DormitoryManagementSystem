<div>
    <form wire:submit="registerUser">

        @if(session()->has('success'))
            <div class="alert alert-success mb-3" role="alert"> {{ session('success') }} </div>
        @endif
        
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input wire:model="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter your first name" autofocus />

            <div class="invalid-feedback">
                @error('first_name')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input wire:model="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter your last name" autofocus />

            <div class="invalid-feedback">
                @error('last_name')
                    {{ $message }}
                @enderror
            </div>
        </div>


        <div class="mb-3">
            <label class="form-label">Email</label>
            <input wire:model="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" />

            <div class="invalid-feedback">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3 form-password-toggle">
            <label class="form-label">Password</label>
            <div class="input-group input-group-merge">
                <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror"
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
            <input wire:model="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" />

            <div class="invalid-feedback">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                <label class="form-check-label" for="terms-conditions">
                    I agree to
                    <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
            </div>
        </div>
        <button class="btn btn-primary d-grid w-100">Sign up</button>
    </form>
</div>
