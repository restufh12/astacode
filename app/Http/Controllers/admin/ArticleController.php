<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('admin.pages.articles.index')->with([
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'assets/article', 'public'
        );

        if(Article::create($data)){
            $notification = array(
                'message' => 'Add article successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Add article failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('articles.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        
        return view('admin.pages.articles.edit')->with([
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $data = $request->all();
        $article = Article::findOrFail($id);

        if($request->file('photo') != ''){
            $data['photo'] = $request->file('photo')->store(
                'assets/article', 'public'
            );
            Storage::delete('/public/'.$request->hidden_file);
        } 
        
        if($article->update($data)){
            $notification = array(
                'message' => 'Update article successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Update article failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('articles.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if($article->delete()){
            $notification = array(
                'message' => 'Delete article successful', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Delete article failed', 
                'alert-type' => 'error'
            );
        }

        return redirect()->route('articles.index')->with($notification);
    }
}
