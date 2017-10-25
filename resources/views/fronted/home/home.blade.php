@extends('fronted.master')
@section('titel')
    BITM
@endsection
@section('body')
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">
                <div class="card-group">
                    @foreach($publishedBlogs as $publishedBlog)
                    <div class="card">
                        <img class="card-img-top" src="{{ asset($publishedBlog->blog_image) }}" alt="Card image cap" height="250"/>
                        <div class="card-body">
                            <h4 class="card-title">{{ $publishedBlog->blog_title }}</h4>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>


                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach($publishedCategories as $publishedCategory)
                                    <li>
                                        <a href="#">{{ $publishedCategory->category_name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection