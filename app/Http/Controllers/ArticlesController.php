<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')->orderBy('name', 'asc')->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'articleCategories' => \App\ArticleCategory::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('articles.create', $relations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article();

        $article->name = $request->input('name');
        $article->article_category_id = $request->input('article_category_id');
        $article->url = $request->input('url');
        $article->description = $request->input('description');

        $article->save();

        return redirect()->route('articles.index')
            ->with('success', 'The Article: ' . $article->name . ' has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        $relations = [
            'article_categories' => \App\ArticleCategory::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('articles.edit', compact('article') + $relations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->name = $request->input('name') ?? $article->name;
        $article->article_category_id = $request->input('article_category_id') ?? $article->article_category_id;
        $article->url = $request->input('url') ?? $article->url;
        $article->description = $request->input('description') ?? $article->description;

        $article->update();

        return redirect()->route('articles.index')
            ->with('success', 'The Article: ' . $article->name . ' has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'The Article: ' . $article->name . ' has been successfully deleted!');
    }

    /**
     * Delete all selected Article Categories at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Article::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
