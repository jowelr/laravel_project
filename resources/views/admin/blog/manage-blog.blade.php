@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr/>
            <div class="well">
                @if($message = Session::get('message'))
                    <h1 class="text-success text-center">{{ $message }}</h1>
                    <hr/>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>Blog Id</th>
                        <th>Blog Title</th>
                        <th>Category Name</th>
                        <th>Publication status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($allBlogs as $allBlog)
                        <tr>
                            <td>{{ $allBlog->id }}</td>
                            <td>{{ $allBlog->blog_title }}</td>
                            <td>{{ $allBlog->category_name }}</td>
                            <td>{{ $allBlog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{ url('/blog/view/'.$allBlog->id) }}" class="btn btn-info btn-xs" title="View Blog Details">
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                </a>

                                @if($allBlog->publication_status == 1)
                                <a href="{{ url('/blog/unpublished/'.$allBlog->id) }}" class="btn btn-success btn-xs" title="Published Blog">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                @else
                                    <a href="{{ url('/blog/published/'.$allBlog->id) }}" class="btn btn-warning btn-xs" title="Published Blog">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                @endif
                                <a href="{{ url('/blog/edit/'.$allBlog->id) }}" class="btn btn-primary btn-xs" title="Edit Blog">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ url('/blog/delete/'.$allBlog->id) }}" class="btn btn-danger btn-xs" title="Delete Blog" onclick="return confirm('Are you sure to delete this'); ">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection