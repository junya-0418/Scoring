<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BlogService;

class BlogController extends Controller
{

    public function index() {

        $blogs = BlogService::getBlog();

        return view('blog_lists', compact('blogs'));

    }
}
