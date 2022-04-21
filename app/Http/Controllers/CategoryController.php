<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Categories::latest()->paginate(8);
        return view('categories.categories_index',compact('categories'));
    }

    public function create(){
        return view('categories.categories_create');
    }

    public function store(Request $request){
        request()->validate([
            'category_name' => 'required'
        ]);
        $category = new Categories();
        $category->name = $request->category_name;
        $category->save();
        return redirect('/categories')->with('message','New Category have been Added!');
    }

    public function edit(Categories $category){
        return view('categories.categories_edit',compact('category'));
    }

    public function update(Request $request, Categories $category){
        request()->validate([
            'category_name' => 'required'
        ]);
        $category->name = $request->category_name;
        $category->save();
        return redirect('/categories')->with('message','Category have been Updated!');
    }

    public function search(Request $request){
        $query = request()->input('query');
        if($query != ''){
            $categories = Categories::where('name','like',"%$query%")->paginate(3);
        } else {
            $categories = Categories::all();
        }
        return view('categories.categories_index',compact('categories'));
    }
}
