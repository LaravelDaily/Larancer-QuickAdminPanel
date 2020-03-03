<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleCategories = ArticleCategory::orderBy('name', 'asc')->get();

        return view('article_categories.index', compact('articleCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articleCategories = new ArticleCategory();

        $articleCategories->name = $request->input('name');
        $articleCategories->description = $request->input('description');

        $articleCategories->save();

        return redirect()->route('article-categories.index')
            ->with('success', 'The Article Category: ' . $articleCategories->name . ' has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        return view('article_categories.show', compact('articleCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('article_categories.edit', compact('articleCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $articleCategory->name = $request->input('name') ?? $articleCategory->name;
        $articleCategory->description = $request->input('description') ?? $articleCategory->description;

        $articleCategory->update();

        return redirect()->route('article-categories.index')
            ->with('success', 'The Article Category: ' . $articleCategory->name . ' has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $articleCategory->delete();

        return redirect()->route('article-categories.index')
            ->with('success', 'The Article Category: ' . $articleCategory->name . ' has been successfully deleted!');
    }

    /**
     * Delete all selected Article Categories at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = ArticleCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
