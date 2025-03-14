<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function showroom()
    {
        $posts = Post::paginate(24);
        return view('posts.showroom', compact('posts')); 
    }

    public function singleVehicle(Post $post)
    {
        return view('posts.single-vehicle', ['post' => $post]); 
    }


    public function search( $term)
    {
        $posts = Post::search($term)-get();
       // $posts->load()
        return $posts;
    }
}