<?php

namespace App\Http\Controllers;
use App\Categorie;
use App\Posts;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post = Posts::latest()->get();

        foreach ($post as $p){
            $post_time_unformatted = explode(' ',$p->created_at);
            $post_time = array_shift($post_time_unformatted);
            $post_time = date('d-m-Y', strtotime($post_time));
        }
        return view('home', [
            'post' => $post,
            'post_time' => $post_time,

        ]);

    }
}
