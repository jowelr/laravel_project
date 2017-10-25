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
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($allCategories as $allCategory)
                    <tr>
                        <td>{{ $allCategory->id }}</td>
                        <td>{{ $allCategory->category_name }}</td>
                        <td>{{ $allCategory->category_description }}</td>
                        <td>{{ $allCategory->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            <a href="{{ url('/category/edit/'.$allCategory->id) }}" class="btn btn-primary btn-xs" title="Edit Category">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ url('/category/delete/'.$allCategory->id) }}" class="btn btn-danger btn-xs" title="Delete Category" onclick="return confirm('Are you sure to delete this'); ">
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