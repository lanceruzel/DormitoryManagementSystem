<div class="row">
    <div class="col mb-3 d-flex flex-column">
        <label for="nameBasic" class="form-label">Type:</label>
        <select wire:model='print_type' class="form-select @error('print_type') is-invalid @enderror">
            <option value="All" selected>All</option>
            <option value="Monthly Rent">Monthly Rent</option>
            <option value="Maintenance">Maintenance</option>
            <option value="Others">Others</option>
        </select>

        <div class="invalid-feedback">
            @error('print_type')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col mb-3 d-flex flex-column">
        <label for="nameBasic" class="form-label">Month:</label>
        <select wire:model='print_month' class="w-100 form-select @error('print_month') is-invalid @enderror">
            <option value="1" selected>January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <div class="invalid-feedback">
            @error('print_month')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>