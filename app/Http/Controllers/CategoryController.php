<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $articles = $category->articles()->paginate(10);
        return view('articles.index' , compact('articles'));
    }

    public function create()
    {
        return view('categories.create' );
    }

    public function store(){

        $this->validate(request() , [
            'name' => 'required',
            'slug' => 'required'
        ]);

//        $category = new Category();
//        $category->name = request('name');
//        $category->slug = request('slug');
//        $category->save();

        Category::create(request(['name', 'slug'] ));


        session()->flash('message' , 'The category has created successfully.');

        return redirect('/');
    }


}
