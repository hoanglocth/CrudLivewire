<div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 style="float: left"><strong>All Students</strong></h6>
                        <button type="button" class="btn btn-sm btn-primary" style="float: right" data-bs-toggle="modal"
                            data-bs-target="#addStudentModal">Add Student</button>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add New Student -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addStudentModalLabel">Add New Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        
                        <div class="form-group row">
                            <label for="student_id" class="col-sm-5 col-form-label">Student ID</label>
                            <div class="col-sm-7">
                                <input type="number" id="student_id" class="form-control" wire:model="student_id">
                                @error('student_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_name" class="col-sm-5 col-form-label">Student Name</label>
                            <div class="col-sm-7">
                                <input type="text" id="student_name" class="form-control" wire:model="student_name">
                                @error('student_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_email" class="col-sm-5 col-form-label">Student Email</label>
                            <div class="col-sm-7">
                                <input type="email" id="student_email" class="form-control"
                                    wire:model="student_email">
                                @error('student_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_phone" class="col-sm-5 col-form-label">Student Phone</label>
                            <div class="col-sm-7">
                                <input type="number" id="student_phone" class="form-control"
                                    wire:model="student_phone">
                                @error('student_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </form>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="align-items: center">Add</button>
                </div>
            </div>
        </div>
    </div>

</div>
