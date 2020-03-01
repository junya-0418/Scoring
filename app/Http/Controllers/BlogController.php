<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use BlogService;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{

    public function index() {

        $blogs = BlogService::getBlog();

        return view('blog_lists', compact('blogs'));

    }

    public function show_form() {

        return view('blog_form');

    }

    public function create(BlogRequest $request) {

        Blog::create([
            'title' => $request->title,
            'content'  => $request->text
        ]);

        return redirect('/blog/lists');

    }
}
