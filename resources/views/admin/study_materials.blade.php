@extends('admin.layout.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                    <h4 class="card-title ">Study Materials</h4>
                    <p class="card-category">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" type="button">Add Study Material</button>
                    </p>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Title
                            </th>
                            <th>
                                File
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Uploaded By
                            </th>
                        </thead>
                        <tbody>
                            @foreach($studyMaterials as $material)
                                <tr>
                                    <td>{{ $material->title }}</td>
                                    <td>
                                        <div class="media">
                                            <video oncontextmenu="return false;" controls controlslist="nodownload" height="200">
                                                <source src="{{ asset('/storage'.$material->url) }}">
                                            </video>
                                        </div>
                                        {{ $material->url }}
                                    </td>
                                    <td>{{ $material->description }}</td>
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
<form action="/add-study-material" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Study Material</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="file" class="btn btn-success btn-sm">Please Select A File</label>
                <input type="file" name="file" id="file" required accept="video/*">
            </div>
            <p class="file_name">No file chosen</p>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="4" class="form-control" required></textarea>
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

@section('scripts')

<script>
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            if($('input[type="file"]').val()){
                var fileName = e.target.files[0].name;
                $('.file_name').text(fileName);
            }else{
                $('.file_name').text('No file Chosen');
            }
        });
    });
</script>

@endsection