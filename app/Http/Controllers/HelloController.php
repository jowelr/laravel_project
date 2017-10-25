<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use DB;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        //$publishedBlogs = Blog::where('publication_status', 1)->get();

        $publishedBlogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->get();

        $publishedCategories = Category::where('publication_status', 1)->get();

//        return $publishedBlogs;
        return view('fronted.home.home', [
            'publishedBlogs'=>$publishedBlogs,
            'publishedCategories' => $publishedCategories
        ]);
    }
    public function about(){
        return view('fronted.about.about');
    }
    public function service(){
        return view('fronted.service.service');
    }
    public function Contact(){
        return view('fronted.Contact.Contact');
    }
}
