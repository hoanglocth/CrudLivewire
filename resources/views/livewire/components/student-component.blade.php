<div>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h3><strong>Laravel LivewireCRUD with Bootstrap Modal</strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong>All Students</strong></h5>
                        <button class="btn btn-sm btn-primary" style="float: right;" data-bs-toggle="modal"
                            data-bs-target="#addStudentModal">Add
                            New Student</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($students->count() > 0)
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->student_name }}</td>
                                            <td>{{ $student->student_email }}</td>
                                            <td>{{ $student->student_phone }}</td>
                                            <td style="text-align: center;">
                                                {{-- <button class="btn btn-sm btn-secondary"
                                                    wire:click="viewStudentDetails({{ $student->student_id }})">View</button>
                                                <button class="btn btn-sm btn-primary"
                                                    wire:click="editStudents({{ $student->student_id }})">Edit</button> --}}

                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteStudentModal"
                                                    wire:click="deleteConfirmation('{{ $student->uuid }}')">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><small>No Student Found</small>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Add Student --}}
    <div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveStudentData">
                        <div class="form-group row">
                            <label for="student_id" class="col-3">Student ID</label>
                            <div class="col-9">
                                <input type="text" id="student_id" class="form-control" wire:model="student_id">
                                @error('student_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top: 10px">
                            <label for="student_name" class="col-3">Name</label>
                            <div class="col-9">
                                <input type="text" id="student_name" class="form-control" wire:model="student_name">
                                @error('student_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top: 10px">
                            <label for="student_email" class="col-3">Email</label>
                            <div class="col-9">
                                <input type="email" id="student_email" class="form-control"
                                    wire:model="student_email">
                                @error('student_email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top: 10px">
                            <label for="student_phone" class="col-3">Phone</label>
                            <div class="col-9">
                                <input type="number" id="student_phone" class="form-control"
                                    wire:model="student_phone">
                                @error('student_phone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top: 10px">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- Confirm Delete --}}
    <div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Delete Confirmation</h1>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this student data!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteStudentData()">Yes! Delete</button>
                </div>

            </div>
        </div>
    </div>
</div>



@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addStudentModal').modal('hide');
            $('#editStudentModal').modal('hide');
            $('#deleteStudentModal').modal('hide');
        });
        window.addEventListener('show-edit-student-modal', event => {
            $('#editStudentModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event => {
            $('#deleteStudentModal').modal('show');
        });

        window.addEventListener('show-view-student-modal', event => {
            $('#viewStudentModal').modal('show');
        });
    </script>
@endpush
