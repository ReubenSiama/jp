@extends('layout.master')
@section('content')
<div class="col-md-4 mx-auto mt-4">
    <form action="/register" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <select name="course" id="course" class="form-control" required>
                <option value="">--Select Course--</option>
                @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }} ({{$course->duration}})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="father_name">Father's Name</label>
            <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Father's Name" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact No.</label>
            <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact No." required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-success form-control">Register</button>
    </form>
</div>
@endsection