@extends('admin.layout.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                    <h4 class="card-title ">Study Materials</h4>
                    @if(Auth::user()->role_id != 1)
                    <p class="card-category">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" type="button">Add Study Material</button>
                    </p>
                    @endif
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
                            @if(Auth::user()->role_id != 1)
                            <th>
                                Make Public/Private
                            </th>
                            @endif
                        </thead>
                        <tbody>
                            @foreach($studyMaterials as $material)
                                <tr>
                                    <td>{{ $material->title }}</td>
                                    <td>
                                        <div class="media">
                                            <video data-id="{{ $material->id }}" id="{{ $material->id }}" class="embed-responsive-item video" oncontextmenu="return false;" controls controlslist="nodownload" height="200">
                                                <source src="{{ asset('/storage'.$material->url) }}">
                                            </video>
                                        </div>
                                    </td>
                                    <td>{{ $material->description }}</td>
                                    <td>{{ $material->user->name }}</td>
                                    @if(Auth::user()->role_id != 1)
                                    <td>
                                        <form action="/change-video/{{ $material->id }}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="{{ $material->status == 'Public' ? 'Private' : 'Public' }}">
                                            <button type="submit" class="btn btn-sm btn-success">Make {{ $material->status == 'Public' ? 'Private' : 'Public' }}</button>
                                        </form>
                                    </td>
                                    @endif
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
                <label for="course">Course</label>
                <select name="course" id="course" class="form-control" required>
                    <option value="">--Select Course --</option>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }} ({{ $course->duration }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="file" class="btn btn-success btn-sm">Please Select A File</label>
                <input type="file" name="file" id="file" required accept="video/*">
            </div>
            <p class="file_name">No file chosen</p>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn upload-material btn-primary">Save</button>
        </div>
        </div>
    </div>
    </div>
</form>
@endsection

@section('scripts')

<script>
    $(document).ready(function(){
        let fileName = null;
        $('button.upload-material').on('click', function(){
            if(fileName == null){
                alert('No file chosen');
                return false;
            }
        });
        $('input[type="file"]').change(function(e){
            if($('input[type="file"]').val()){
                fileName = e.target.files[0].name;
                $('.file_name').text(fileName);
            }else{
                fileName = null;
                $('.file_name').text('No file Chosen');
            }
        });

        $('.video').on('click', function(){
            var id = $(this).data("id");
            var video = document.getElementById(id);
            var video_duration = document.getElementById(id).duration
            console.log(video);
        })
    });
</script>

@endsection