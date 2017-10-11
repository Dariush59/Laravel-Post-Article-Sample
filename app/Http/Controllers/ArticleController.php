<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('articles.index' , compact('articles'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name' , 'id');
        return view('articles.create' , compact('categories'));
    }

    public function store()
    {
        $this->validate(request() , [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required'
        ]);

        $article = auth()
                    ->user()
                    ->articles()
                    ->create(request(['title' , 'body']));

        $article->categories()->attach(request('category'));

        session()->flash('message' , 'The article has created successfully.');

        return redirect('/');
    }

    public function show(Article $article)
    {
        $comments = $article->comments()->get();
        return view('articles.show' , compact('article' , 'comments'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all()->pluck('name' , 'id');
        return view('articles.edit' , compact('article' , 'categories'));
    }

    public function update(Article $article)
    {
        $article->update(request(['title' , 'body']));
        
        $article->categories()->sync(request('category'));

        return redirect('/');
    }
}
