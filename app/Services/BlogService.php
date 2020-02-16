<?php

namespace App\Services;
use App\Blog;

class BlogService{

    public function getBlog(){

        return Blog::all();

    }
}
