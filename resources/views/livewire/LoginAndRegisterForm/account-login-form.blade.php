<div>
    @if(session()->has('fail'))
        <div class="alert alert-danger mb-3" role="alert"> {{ session('fail') }} </div>
    @endif

    <form wire:submit="login">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input wire:model="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" autofocus />

            <div class="invalid-feedback">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
            </div>

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

        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
        </div>
    </form>
</div>