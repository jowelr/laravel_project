<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('titel')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontent')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('frontent')}}/css/blog-post.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
@include('fronted.includes.menu')
<!-- Page Content -->
@yield('body')

@include('fronted.includes.footer')


<script src="{{asset('frontent')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('frontent')}}/vendor/popper/popper.min.js"></script>
<script src="{{asset('frontent')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>

