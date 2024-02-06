<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Item List</h5>

        <div class="d-flex flex-row">
            <input wire:model.live.debounce.200ms="search" class="form-control" type="text" placeholder="Search...">
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th wire:click="doSort('first_name')">Name <i class='bx bx-sort'></th>
                    <th>Email</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($this->tableItems) === 0)
                    <tr class="text-bg-secondary">
                        <td colspan="2" class="text-center">
                            <div class="alert alert-dark mb-0" role="alert">There are no record available</div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"></td>    
                    </tr>
                @else
                    @foreach ($this->tableItems as $item)
                        <tr>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="text-center">
                                <button class="btn btn-secondary" wire:click='showSelectedItem({{ $item->id }})'>
                                    Select
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div id="pagination">
        <div class="demo-inline-spacing d-flex justify-content-center align-items-center pe-3 justify-content-md-end">
            {{ $this->tableItems->links() }}
        </div>
    </div>
</div>