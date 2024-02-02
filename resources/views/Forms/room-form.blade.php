<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Room name</label>
        <input wire:model='room_name' type="text" id="" class="form-control @error('room_name') is-invalid @enderror" placeholder="Enter room name" />

        <div class="invalid-feedback">
            @error('room_name')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="nameBasic" class="form-label">Capacity</label>
        <input wire:model='room_capacity' type="number" inputmode="numeric" id="" class="form-control @error('room_capacity') is-invalid @enderror" placeholder="Enter capacity" />

        <div class="invalid-feedback">
            @error('room_capacity')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 mb-3">
        <label for="nameBasic" class="form-label">Rental Rate</label>
        <input wire:model='room_rate' type="number" inputmode="numeric" id="" class="form-control @error('room_rate') is-invalid @enderror" placeholder="Enter rate" />
        
        <div class="invalid-feedback">
            @error('room_rate')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-6 mb-3">
        <label for="nameBasic" class="form-label">Status</label>

        <select wire:model='status' class="form-select @error('status') is-invalid @enderror">
            <option value="" disabled selected>Select Status</option>
            <option value="available" selected>Available</option>
            <option value="unavailable">Unavailable</option>
            <option value="under maintenance">Under Maintenance</option>
        </select>

        <div class="invalid-feedback">
            @error('status')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Room own restroom</label>

        <div class="d-flex align-items-center">
            <div class="form-check">
                <input wire:model='comfort_room' name="default-radio-1" class="form-check-input" type="radio" value="1" id="defaultRadio2" {{ $this->comfort_room === true ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultRadio2">Yes</label>
            </div>

            <div class="form-check ms-4">
                <input wire:model='comfort_room' name="default-radio-1" class="form-check-input" type="radio" value="0" id="defaultRadio2" {{ $this->comfort_room === false ? 'checked' : '' }}>
                <label class="form-check-label" for="defaultRadio2">No</label>
            </div>
        </div>
        
    </div>
</div>

<div class="row">
    <div wire:ignore class="col mb-3 d-flex flex-column">
        <label for="nameBasic" class="form-label">Ammenities</label>

        <select wire:ignore wire:model='selectedAmenities' class="form-select" name="states[]" multiple="multiple" id="amenities-selection">
            @foreach ($this->selectOptionItems() as $select)
                <option value="{{ $select->id }}">{{ $select->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="table-responsive text-nowrap">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th class="text-center">Item</th>
                <th class="text-center">Available</th>
                <th class="text-center">Count</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody wire:ignore id="selected-amenities-table-container">
            
        </tbody>
    </table>
</div>