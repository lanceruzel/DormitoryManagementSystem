<div class="row mb-1">
    <div class="col mb-3 d-flex flex-column">
        <label for="nameBasic" class="form-label">Payment By:</label>
        <select wire:model='studentID' class="form-select @error('studentID') is-invalid @enderror" id="student-selection">
            <option value="" disabled selected>Select Student</option>

            @foreach ($this->studentList as $student)
                <option value="{{ $student->id }}">{{ $student->first_name . ' ' . $student->last_name }}</option>
            @endforeach
        </select>

        <div class="invalid-feedback">
            @error('studentID')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="row mb-1">
    <div class="col mb-3 d-flex flex-column">
        <label for="nameBasic" class="form-label">Payment For:</label>
        <select wire:model='type' class="form-select @error('type') is-invalid @enderror">
            <option value="" disabled selected>Select type of payment</option>
            <option value="Monthly Rent">Monthly Rent</option>
            <option value="Maintenance">Maintenance</option>
            <option value="Others">Others</option>
        </select>

        <div class="invalid-feedback">
            @error('type')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="row mb-1">
    <div class="col mb-3 d-flex flex-column">
        <label for="nameBasic" class="form-label">Payment Method:</label>
        <select wire:model='payment_method' class="form-select @error('payment_method') is-invalid @enderror">
            <option value="" disabled selected>Select payment method</option>
            <option value="GCash">Gcash</option>
            <option value="Paymaya">Paymaya</option>
            <option value="Cash">Cash</option>
        </select>

        <div class="invalid-feedback">
            @error('payment_method')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="row mb-1">
    <div class="col mb-3 d-flex flex-column">
        <label for="nameBasic" class="form-label">Amount:</label>

        <div class="input-group input-group-merge">
            <span class="input-group-text">₱</span>
            <input wire:model='amount' type="number" class="form-control @error('amount') is-invalid @enderror">
        </div>

        <div class="invalid-feedback">
            @error('amount')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>