    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Students</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Course
                                        </th>
                                        <th>
                                            Father's Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Contact
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>
                                                    {{ $student->name }}
                                                </td>
                                                <td>
                                                    {{ $student->studentDetail->course->course_name }}
                                                </td>
                                                <td>
                                                    {{ $student->studentDetail->fathers_name }}
                                                </td>
                                                <td>
                                                    {{ $student->email }}
                                                </td>
                                                <td class="text-primary">
                                                    {{ $student->studentDetail->contact_no }}
                                                </td>
                                                <td>
                                                    {{ $student->studentDetail->status }}
                                                </td>
                                                <td>
                                                @if($student->studentDetail->status == 'Pending')
                                                <div class="btn-group">
                                                    <form action="/approve/{{ $student->id }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-default btn-sm">Approve</button>
                                                    </form>
                                                    <form action="/decline/{{ $student->id }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm">Decline</button>
                                                    </form>
                                                </div>
                                                @else
                                                <div class="btn-group">
                                                    <button
                                                    data-id="{{ $student->id }}"
                                                    data-name="{{ $student->name }}"
                                                    data-email="{{ $student->email }}"
                                                    data-fathersname="{{ $student->studentDetail->fathers_name }}"
                                                    data-course="{{ $student->studentDetail->course_id }}"
                                                    data-contact="{{ $student->studentDetail->contact_no }}"
                                                    data-status="{{ $student->studentDetail->status }}"
                                                    data-toggle="modal"
                                                    data-target="#edit"
                                                    class="btn btn-sm btn-success edit-student">Edit</button>
                                                    <button
                                                    data-id="{{ $student->id }}"
                                                    data-toggle="modal"
                                                    data-target="#delete"
                                                    class="btn btn-sm btn-danger delete-student">Delete</button>
                                                </div>
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form action="/update-student" method="post">
    @csrf
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editLabel">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <input type="hidden" name="id" id="edit-id">
            <div class="form-goup">
                <label for="edit-course">Course</label>
                <select name="course" id="edit-course" class="form-control">
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="edit-name">Name</label>
                <input type="text" name="name" id="edit-name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="edit-email">Email</label>
                <input type="email" name="email" id="edit-email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="edit-father">Father's Name</label>
                <input type="text" name="father_name" id="edit-father" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="edit-contact">Contact</label>
                <input type="text" name="contact" id="edit-contact" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="edit-status">Status</label>
                <select name="status" id="edit-status" class="form-control">
                    <option value="Approved">Approved</option>
                    <option value="Declined">Declined</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </div>
    </div>
    </div>
</form>

<form action="/delete-student" method="post">
    @csrf
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <input type="hidden" name="id" id="delete-id">
            Are you sure you want to delete this user?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes</button>
        </div>
        </div>
    </div>
    </div>
</form>

@section('scripts')

<script>
    $(document).ready(function(){
        $('.edit-student').on('click', function(){
            let id = $(this).data("id");
            let name = $(this).data('name');
            let email = $(this).data('email');
            let fathers_name = $(this).data('fathersname');
            let course = $(this).data('course');
            let contact = $(this).data('contact');
            let status = $(this).data('status');

            $('#edit-id').val(id);
            $('#edit-email').val(email);
            $('#edit-name').val(name);
            $('#edit-father').val(fathers_name);
            $('#edit-course').val(course);
            $('#edit-contact').val(contact);
            $('#edit-status').val(status);
            
        });

        $('.delete-student').on('click', function(){
            let id = $(this).data("id");
            $('#delete-id').val(id);
        });
    });
</script>

@endsection