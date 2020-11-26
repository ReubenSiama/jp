@extends('admin.layout.master')
@section('content')
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
                                            <form action="/approve/{{ $student->id }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                            </form>
                                            <form action="/decline/{{ $student->id }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                            </form>
                                        @endif
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
@endsection