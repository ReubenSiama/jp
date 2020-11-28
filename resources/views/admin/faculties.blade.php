@extends('admin.layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title ">Faculties</h4>
                        <p class="card-category">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" type="button">Add</button>
                        </p>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                @foreach($faculties as $faculty)
                                    <tr>
                                        <td>
                                            {{ $faculty->name }}
                                        </td>
                                        <td>
                                            {{ $faculty->email }}
                                        </td>
                                        <td>
                                        @if($faculty->role_id == 2)
                                            Faculty
                                        @else
                                            Admin
                                        @endif
                                        </td>
                                        <td class="text-primary">
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-success edit-faculty"
                                                data-id="{{ $faculty->id }}"
                                                data-name="{{ $faculty->name }}"
                                                data-email="{{ $faculty->email }}"
                                                data-role="{{ $faculty->role_id }}"
                                                data-toggle="modal"
                                                data-target="#edit"
                                                >Edit</button>
                                                <button data-id="{{ $faculty->id }}" data-toggle="modal"
                                                data-target="#delete" class="btn btn-sm btn-danger delete-faculty">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<form action="/add-faculty" method="post">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Faculty</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-goup">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="2">Faculty</option>
                    <option value="3">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{ old('name') }} " name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control" required>
                @error('email')
                <div class="alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
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


<form action="/update-faculty" method="post">
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
                <label for="edit-role">Role</label>
                <select name="role" id="edit-role" class="form-control" value="{{ old('role') }}">
                    <option value="2">Faculty</option>
                    <option value="3">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edit-name">Name</label>
                <input type="text" name="name" id="edit-name" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="edit-email">Email</label>
                <input type="email" name="edit_email" id="edit-email" class="form-control" required value="{{ old('edit-email') }}">
                @if(session('emailError'))
                    <div class="alert-danger">{{ session('emailError') }}</div>
                @endif
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

<form action="/delete-faculty" method="post">
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
        @error('email')
            $("#exampleModal").modal('show');
        @enderror

        @if(session('emailError'))
            $("#edit").modal('show');
        @endif

        $('.edit-faculty').on('click', function(){
            let id = $(this).data("id");
            let name = $(this).data('name');
            let email = $(this).data('email');
            let role = $(this).data('role');
            $('#edit-id').val(id);
            $('#edit-email').val(email);
            $('#edit-name').val(name);
            $('#edit-role').val(role);
        });

        $('.delete-faculty').on('click', function(){
            let id = $(this).data("id");
            $('#delete-id').val(id);
        });
    });
</script>

@endsection