<?php

namespace App\Http\Controllers;

use App\Events\ArticleComment;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function byTag(String $tagTitle)
    {

        $articles = Article::with('tags')->whereHas('tags', function($q) use($tagTitle){
            $q->where('title',$tagTitle);
        })->paginate(5);
//        dd($tagTitle);
        return view('home', [
            'articles' => $articles,
            'tagTitle' => $tagTitle,
            'breadcrumbTitle' => "Тег:$tagTitle",
        ]);
    }


    function addComment(Article $article,Request $request):array {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'comment' => 'required',
        ]);

//        $event = new ArticleComment($article->id, $validated);
        ArticleComment::dispatch($article, $validated);

        return [
            'result' => 'Success'
        ];
    }

    function incLike(Article $article){
        $article->likes = $article->likes + 1;
        $article->save();
        return $article->likes;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(6);
        return view('home', [
            'articles' => $articles,
            'breadcrumbTitle' => 'Статьи',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function like(Article $article, Request $request)
    {
        $article->update([
            'likes' => $article->likes+1,
        ]);
        return [
            'likes' => $article->likes
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {

        $article->views = $article->views+1;
        $article->save();
        return view('show_article',[
            'article' => $article,
            'breadcrumbTitle' => "Статья: $article->title",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
