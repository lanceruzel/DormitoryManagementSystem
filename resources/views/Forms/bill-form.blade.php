<div class="row mb-1">
    <div class="col mb-3 d-flex flex-column">
        <label for="nameBasic" class="form-label">Payment By:</label>
        <select wire:model='studentID' class="form-select @error('studentID') is-invalid @enderror" id="student-selection">
            <option value="" disabled selected>Select Student</option>
            <option value="1">Lance Ruzel Ambrocio</option>
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
            <option value="1">Monthly Rent</option>
            <option value="1">Maintenance</option>
            <option value="1">Others</option>
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
            <option value="1">GCASH</option>
            <option value="1">Cash</option>
            <option value="1">Paymaya</option>
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
        <input wire:model='amount' type="number" class="form-control @error('amount') is-invalid @enderror">

        <div class="invalid-feedback">
            @error('amount')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>