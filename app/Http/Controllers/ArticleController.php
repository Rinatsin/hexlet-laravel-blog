<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Create articles list
     *
     * @return View
     */
    public function index()
    {
        $articles = Article::paginate(3);

        return view('article.index', compact('articles'));
    }

    /**
     * Show article by id
     *
     * @param integer $id articcle id
     *
     * @return View
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('article.show', compact('article'));
    }
}
