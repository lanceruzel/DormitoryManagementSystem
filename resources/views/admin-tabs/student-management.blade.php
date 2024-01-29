<div class="container-xxl flex-grow-1 container-p-y">

    <div class="w-100 d-flex align-items-center justify-content-between">
        <h4 class="fw-bold py-3 mb-4">Student Management</h4>

        <button class="btn btn-primary h-auto" data-bs-toggle="modal" data-bs-target="#modal_addStudent">
            <i class="bx bx-plus"></i>Add Student
        </button>
    </div>

    @livewire('StudentTab.StudentTable')

    @livewire('StudentTab.StudentModal')
</div>