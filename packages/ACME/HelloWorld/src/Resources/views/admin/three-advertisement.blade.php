@extends('admin::layouts.master')
<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
@section('page_title')
    Add Three Advertisement
@stop

@push('css')
    <style>
        .show_images h2{
            text-align: center;
            margin-bottom: 1rem;
            font-weight: revert;
            margin-top: 1rem;
        }


        .btn a{
            color: white;
            font-weight: bold;
        }

        .btn a:hover{
            color: black;
        }
        .editButton{
            color: white;
            background-color: blue;
        }   

        .deleteButton{
            background-color: red;
        }
    </style>
@endpush

@section('content-wrapper')

    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>Add Three Advertisement Banner</h1>
            </div>

            <div class="page-action">
                <a href="add_three_images"><button class="btn btn-primary" style="padding: 10px;">Add Images</button></a>
            </div>
        </div>

        <div class="page-content">
            <accordian :title=" 'Images' " :active="true">                
                <div slot="body" class="show_images">
                    <h2>List of the Image</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Banner Title</th>
                                <th>Banner Type</th>
                                <th>Banner Hyperlink</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($images as $image)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $image->banner_title}}</td>
                                <td>{{ $image->banner_type}}</td>
                                <td>{{ $image->banner_hyperlink}}</td>
                                <td>{{ $image->image}}</td>
                                <td>
                                    <a href="{{ url('admin/helloworld/edit_three_image', $image->id) }}"><button class="btn editButton">Edit</button></a> 
                                    <a href="{{ url('admin/helloworld/delete_three_image', $image->id) }}"><button class="btn deleteButton">Delete</button></a>
                                </td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </accordian>
        </div>
    </div>

@stop


@push('script')
   <!-- Bootstrap JS CDN -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
@endpush