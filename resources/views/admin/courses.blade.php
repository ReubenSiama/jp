@extends('admin.layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title ">Students</h4>
                        <p class="card-category">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" type="button">Add Course</button>
                        </p>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Course
                                </th>
                                <th>
                                    Duration
                                </th>
                                <th>
                                    Fee
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>
                                        {{ $course->course_name }}
                                    </td>
                                    <td>
                                        {{ $course->duration }}
                                    </td>
                                    <td>
                                        ₹ {{ $course->fee }}
                                    </td>
                                    <td class="text-primary">
                                        <button class="btn btn-sm btn-success">Edit</button>
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

<!-- Modal -->
<form action="/add-course" method="post">
@csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" name="course_name" id="course_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="course_duration">Course Duration</label>
                <input type="text" name="course_duration" id="course_duration" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="course_fee">Course Fee</label>
                <input type="text" name="course_fee" id="course_fee" class="form-control" required>
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
@endsection