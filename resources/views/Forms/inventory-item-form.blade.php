<div class="row">
    <div class="col mb-3">
        <label class="form-label">Item Name</label>
        <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter item name" />

        <div class="invalid-feedback">
            @error('name')
                {{ $message }}
            @enderror
        </div>
    </div>     
</div>

<div class="row">
    <div class="col">
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" rows="3"></textarea>

            <div class="invalid-feedback">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Quantity</label>
        <input wire:model="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Quantity" />
        <div class="invalid-feedback">
            @error('quantity')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Unit Price</label>
        <input wire:model="unit_price" type="number" class="form-control @error('unit_price') is-invalid @enderror" placeholder="Enter Unit Price" />

        <div class="invalid-feedback">
            @error('unit_price')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>