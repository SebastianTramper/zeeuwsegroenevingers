<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categorie = Categorie::all();
        return view('admin/categorie/index' ,[
            'categorie' => $categorie
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin/categorie/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Categorie $categorie)
    {
        request()->validate([
            'name' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $categorie->name = request('name');

        $imagePath = str_replace('public', '', Storage::putFile('public', $request->file('image')));
        $categorie->image = $imagePath;
        $categorie->save();

        return redirect('/categorie');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $categorieName = $request->route('categories');
        $categorie = Categorie::all()->where('name','=',$categorieName)->first();

        $categorieName = $categorie->name;
        $categorieImage = $categorie->image;

        return view('admin/categorie/show', [
            'categorie' => $categorie,
            'categorieName' => $categorieName,
            'categorieImage' => $categorieImage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Categorie $categorie)
    {
        $categorie = Categorie::all();

        return view('admin/categorie/edit',[
            'categorie' => $categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categories)
    {
        request()->validate([
            'name' => 'required',
            'image' => 'image|max:2048'
        ]);
        $categories->name = request('name');

        $imageInput = $request->hasFile('image');
        if($imageInput){
            $imagePath = str_replace('public', '', Storage::putFile('public', $request->file('image')));
            $categories->image = $imagePath;
        }

        $categories->save();

        return redirect('/categorie/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
