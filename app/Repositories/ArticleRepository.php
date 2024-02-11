<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository implements CrudRepositoryInterface
{
    public function all()
    {
        return Article::all();
    }

    public function find($id)
    {
        return Article::findOrFail($id);
    }

    public function create(array $data)
    {
        return Article::create($data);
    }

    public function update($id, array $data)
    {
        $article = Article::findOrFail($id);
        $article->update($data);
        return $article;
    }

    public function delete($id)
    {
        Article::findOrFail($id)->delete();
    }
    
}
