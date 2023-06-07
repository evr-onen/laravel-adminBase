<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Markdown;

use App\Http\Controllers\Controller;
use App\Models\CustomField;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    protected $viewFactory;

    public function __construct()
    {

        $this->middleware('auth:api', ['except' => ['login', 'register']]);

        if (request()->hasCookie('lang')) {
            $lang = request()->cookie('lang');
        } else {

            $languages = explode(',',  request()->header('Accept-Language'));
            $languages  = explode(';', $languages[0]);
            $lang   = explode('-', $languages[0])[0];
        }
        app()->setLocale($lang);
    }


    public function viewDashboardCreateBlogs()
    {
        $lang = request()->cookie('lang');
        $cats = Category::all();

        $allTranslations = $cats->map(function ($cat) {
            $translations = $cat->getTranslations();
            $translations['id'] = $cat->id;
            return $translations;
        });

        $blogs = Blog::with('categories')->get();
        view()->share(['cats' => $cats, 'lang' => $lang, 'allCats' => $allTranslations,  'blogs' => $blogs]);
        return  view('blogs.create');
    }


    public function getBlogs()
    {
        $blogs = Blog::with('categories')->get();
        foreach ($blogs as $blog) {
            if ($blog) {
                $blog->markdownHtml = Markdown::parse($blog->content);
            }
        }
        view()->share(['blogs' => $blogs]);
        return view('blogs.list', compact('blogs'));
    }




    public function createBlog(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'cats' => 'required',
            'file' => 'required|file|mimes:jpeg,png,gif,pdf',
        ]);



        $image = $request->file('file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $blog = Blog::create([
            'title'      => request()->get('title'),
            'img_path'     => "/uploads/product_images/" . $new_name,
            'content'  => request()->get('content'),

        ]);
        $categories = explode(',', $request->input('cats'));
        $blog->categories()->attach($categories);
        $image->move(public_path('/uploads/product_images'), $new_name);

        return $blog;
    }
}
