@extends('admin.layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title ">Settings</h4>
                        <p class="card-category">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" type="button">Add Settings</button>
                        </p>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Key
                                </th>
                                <th>
                                    Value
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                            @foreach($settings as $setting)
                                <tr>
                                    <td>
                                        {{ $setting->key }}
                                    </td>
                                    <td>
                                        {{ $setting->value }}
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
<form action="/add-setting" method="post">
@csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Setting</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="key">Key</label>
                <input type="text" name="key" id="key" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="value">Value</label>
                <input type="text" name="value" id="value" class="form-control" required>
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