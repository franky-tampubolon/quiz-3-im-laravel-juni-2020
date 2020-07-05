<?php

namespace App\Http\Controllers;

use App\ArticleModel;
use ArtikelSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = ArticleModel::getData();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('article/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->judul, '-');
        $data = $request->all();
        unset($data['_token']);
        // dd($data);   
        ArticleModel::simpan([
            'judul'     => $request->judul,
            'slug'     => $slug,
            'isi'     => $request->isi,
            'tag'     => $request->tag,
            'user_id'     => 1,
        ]);

        return redirect('/article')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArticleModel  $articleModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = ArticleModel::getDataById($id)->first();
        // dd($article);
        return view('article.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArticleModel  $articleModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = ArticleModel::getDataById($id)->first();
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArticleModel  $articleModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $slug = Str::slug($request->judul, '-');
        $data = $request->all();
        unset($data['_token']);
        // dd($data);   
        ArticleModel::updateData([
            'judul'     => $request->judul,
            'slug'     => $slug,
            'isi'     => $request->isi,
            'tag'     => $request->tag,
            'user_id'     => 1,
        ], $id);

        return redirect('/article')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleModel  $articleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ArticleModel::hapus($id);

        dd($data);
    }
}
