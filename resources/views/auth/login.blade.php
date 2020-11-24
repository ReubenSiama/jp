@extends('layout.master')
@section('content')
<div class="col-sm-4 offset-4 mt-4">
    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-success form-control">
        </div>
    </form>
</div>
@endsection
