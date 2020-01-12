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

    /**
     * Show article by id
     *
     * @return View
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    /**
     * Show article by id
     *
     * @param Request $request Request object
     *
     * @return View
     */
    public function store(Request $request)
    {
        //Проверка данных
        $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:100',
        ]);

        $article = new Article();
        $article->fill($request->all());
        $article->save();

        $request->session()->flash('status', 'Your article has been created!');
        return redirect()
            ->route('articles.create');
    }
}
