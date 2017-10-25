<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $publishedCategories = Category::where('publication_status', 1)->get();

        return view('admin.blog.add-blog', ['publishedCategories'=>$publishedCategories]);
    }

    protected function blogFieldValidation($request) {
        $this->validate($request, [
            'blog_title'=> 'required|alpha',
            'blog_description' => 'required',
            'blog_image' => 'required'
        ]);
    }

    protected function saveBlogImage($request) {
        $blogImage = $request->file('blog_image');
        $imageName = $blogImage->getClientOriginalName();
        $directory = 'blog-images/';
        $blogImage->move($directory, $imageName);
        $imageUrl = $directory.$imageName;
        return $imageUrl;
    }

    public function saveBlogBasicInfo($request, $imageUrl) {
        $blog = new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->category_id = $request->category_id;
        $blog->blog_description = $request->blog_description;
        $blog->blog_image = $imageUrl;
        $blog->publication_status = $request->publication_status;
        $blog->save();
    }

    public function saveBlogInfo(Request $request) {
        $this->blogFieldValidation($request);
        $imageUrl = $this->saveBlogImage($request);
        $this->saveBlogBasicInfo($request, $imageUrl);
        return redirect('/blog/add')->with('message', 'Blog Info create successfully');
    }
    public function manageBlogInfo() {
        //$allBlogs = Blog::all();

        $allBlogs= DB::table('blogs')
                        ->join('categories', 'blogs.category_id', '=', 'categories.id')
                        ->select('blogs.*', 'categories.category_name')
                        ->get();
        return view('admin.blog.manage-blog', ['allBlogs'=>$allBlogs]);
    }
    public function viewBlogInfo($id) {
        //return $id;
        //$blogById = Blog::find($id);
        $blogById = DB::table('blogs')
                        ->join('categories', 'blogs.category_id', '=', 'categories.id')
                        ->select('blogs.*', 'categories.category_name')
                        ->where('blogs.id',$id)
                        ->first();
//        return $blogById->blog_image;
        return view('admin.blog.view-blog', ['blogById'=>$blogById]);
    }
    public function unpublishedBlogInfo($id) {
        $blogById = Blog::find($id);
        $blogById->publication_status = 0;
        $blogById->save();

        return redirect('/blog/manage')->with('message', 'Blog info unpublished successfully');
    }
    public function publishedBlogInfo($id) {
        $blogById = Blog::find($id);
        $blogById->publication_status = 1;
        $blogById->save();

        return redirect('/blog/manage')->with('message', 'Blog info published successfully');
    }
    public function editBlogInfo($id) {
        $blogById = Blog::find($id);
        $publishedCategories = Category::where('publication_status', 1)->get();
        return view('admin.blog.edit-blog', [
            'publishedCategories'=>$publishedCategories,
            'blogById'=>$blogById
        ]);
    }
    public function updateBlogInfo(Request $request) {
        $blogImage = $request->file('blog_image');
        if($blogImage) {
            unlink();
        } else {



        }
    }
}
