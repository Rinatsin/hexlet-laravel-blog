<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleStoreRequest;
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
    public function store(ArticleStoreRequest $request)
    {
        //Проверка данных
        $request->validated();

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
    public function update(ArticleStoreRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validated();

        $article->fill($request->all());
        $article->save();

        $request->session()->flash('status', 'Your article has been updated!');
        return redirect()
            ->route('articles.index');
    }

    /**
     * Delete a  blog post.
     *
     * @param int $id Article id
     *
     * @return void
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();
        }

        //$request->session()->flash('status', 'Your article has been deleted!');
        return redirect()->route('articles.index');
    }
}
