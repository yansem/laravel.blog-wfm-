<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at', 'DESC')->paginate(2);
        return view('home.index', compact('posts'));
    }

    public function show($slug)
    {
        return view('home.show');
    }
}
