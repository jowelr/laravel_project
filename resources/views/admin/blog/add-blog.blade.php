@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr/>
            <div class="well">
                @if($message = Session::get('message'))
                    <h1 class="text-center text-success">{{ $message }}</h1>
                    <hr/>
                @endif
                <form class="form-horizontal" action="{{ url('/blog/new') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Blog Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="blog_title" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('blog_title') ? $errors->first('blog_title') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id">
                                <option>---Select Category Name---</option>
                                @foreach($publishedCategories as $publishedCategory)
                                <option value="{{ $publishedCategory->id }}">{{ $publishedCategory->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Blog Description</label>
                        <div class="col-sm-9">
                            <textarea name="blog_description" class="form-control" style="resize: vertical;"></textarea>
                            <span class="text-danger">{{ $errors->has('blog_description') ? $errors->first('blog_description') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Blog Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="blog_image" accept="image/*"/>
                            <span class="text-danger">{{ $errors->has('blog_image') ? $errors->first('blog_image') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Publication status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="publication_status">
                                <option>---Select Publication Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Blog Info"/>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection