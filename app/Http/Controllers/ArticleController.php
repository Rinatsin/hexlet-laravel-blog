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
        $articles = Article::paginate(5);

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
     * Show the form to create a new blog post.
     *
     * @return Response
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    /**
     * Store a new blog post.
     *
     * @param Request $request http request object
     *
     * @return Response
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
            ->route('articles.index');
    }

    /**
     * Store a new blog post.
     *
     * @param int $id Article id
     *
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

        /**
     * Store a new blog post.
     *
     * @param Request $request http request object
     * @param integer $id      Article id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:articles, name' . $article->id,
            'body' => 'required|min:100',
        ]);

        $article->fill($request->all());
        $article->save();

        $request->session()->flash('status', 'Your article has been updated!');
        return redirect()
            ->route('articles.index');
    }
}
