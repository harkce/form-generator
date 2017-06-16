<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index() {
		$categories = Category::all();
		return view('category',['title' => 'Categories','categories' => $categories]);
	}

    public function store(Request $request) {
    	$category = new Category;
    	$category->name = $request->name;
    	$category->order = $request->order;
    	$category->save();
    	return redirect('categories')->with('status', 'Category created!');
    }

    public function delete(Request $request) {
    	$category = Category::find($request->input('id'));
    	$category->delete();
    	return redirect('categories')->with('status', 'Category deleted!');
    }
}
