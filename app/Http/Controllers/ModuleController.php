<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Module;

class ModuleController extends BaseController
{
    public function index() {
    	$categories = Category::all();
    	$modules = Module::with('category')->get();
        $data = [
            'title' => 'Modules',
            'categories' => $categories,
            'modules' => $modules
        ];
    	return $this->jsonResponse('success', null, $data);
    }

    public function store(Request $request) {
    	$module = new Module();
    	$module->name = $request->input('name');
    	$module->order = $request->input('order');
    	$module->icon = $request->input('icon');
    	$module->category_id = $request->input('category');
    	$module->save();
    	return redirect('modules')->with('status', 'Module created!');
    }
}
