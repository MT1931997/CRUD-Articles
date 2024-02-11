<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Http\Requests\ArticleRequest;
use DataTables;

class ArticleController extends Controller
{

    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        return view('articles.index');
    }

    public function getData()
    {
        $articles = $this->articleRepository->all();
        return DataTables::of($articles)
            ->addColumn('action', function ($article) {
                return '<a href="'.route('articles.edit', $article->id).'" class="btn btn-sm btn-primary">Edit</a> <form action="'.route('articles.destroy', $article->id).'" method="post" style="display:inline">
                '.csrf_field().'
                '.method_field('DELETE').'
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>';
            })
            ->make(true);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $this->articleRepository->create($request->validated());
        return redirect()->route('articles.index')->with('success', 'Article created successfully');
    }

    public function edit($id)
    {
        $article = $this->articleRepository->find($id);
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $this->articleRepository->update($id, $request->validated());
        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $this->articleRepository->delete($id);
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }

}
