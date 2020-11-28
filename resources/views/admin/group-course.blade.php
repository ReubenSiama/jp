@extends('admin.layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Courses</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($courses as $course)
                                    <a href="/students/{{ $course->id }}" class="link {{ Route::input('id') == $course->id ? 'text-white' : 'text-black' }}">
                                        <li class="list-group-item {{ Route::input('id') == $course->id ? 'active' : '' }}">
                                            {{ $course->course_name }}
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                @if(count($students) != 0)
                    @include('admin.students', [$students, $courses])
                @else
                    No data to display
                @endif
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
@endsection

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