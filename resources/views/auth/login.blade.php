@extends('layout.master')
@section('content')
<div class="col-md-4 mx-auto mt-4">
    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-success form-control">
        </div>
    </form>
</div>
@endsection
