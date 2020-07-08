<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class PostsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.j
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categorie = Categorie::all();

        return view('admin/post/create', [
            'categorie' => $categorie
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Posts $post)
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'text' => 'required',
            'categorie' => 'required',
            'seizoen' => 'required',
            'image' => 'sometimes|file|image|max:20000'
        ]);


        $slug = str_replace(" ", "-", request('title'));
        $post->slug = $slug;
        $post->title = request('title');
        $post->excerpt = request('excerpt');
        $post->text = request('text');
        $post->categorie_id = request('categorie');
        $post->seizoen_id = request('seizoen');


        $imagePath = str_replace('public', '', Storage::putFile('public', $request->file('image')));
        $post->image = $imagePath;
        $post->save();

        /*
         * Crop images to the right size (using package http://image.intervention.io/)
         * for local change storage/ to storage and in your view add storage before src
         */
        $image = Image::make(public_path('storage/' . $post->image))->fit(700,400);
        $image->orientate();
        $image->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Categorie $categorie,Posts $post, $categories, $posts)
    {
        $slug = str_replace("-", " ",$posts);
        $artikel = $post->where('title', '=', $slug)->first();
        return view("post",[
            'artikel' => $artikel,
            'categories' => $categorie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        //
    }
}
