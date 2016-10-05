<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\RedirectResponse;
use App\Category;

class AdminCategoriesController extends Controller
{
    public function index()
    {
    	$categories = Category::All();
    	return view('admin.categories.index',compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show',compact('category'));
    }

    public function create()
    {
    	return view('admin.categories.create');
    }


    public function store(CreateCategoryRequest $request)
    {
   
        $input = $request->All();
        Category::Create($input);
        return redirect('admin/categories/');
    }

    public function edit($id)
    {
    	$category = Category::FindOrFail($id);
    	return view('admin.categories.edit' , compact('category'));
    }

    public function update($id , UpdateCategoryRequest $request)
    {
        $category = Category::FindOrFail($id);
        $category->update($request->All());
        return redirect('admin/categories/' . $id);
    }

    public function destroy($id)
    {
        $category = Category::FindOrFail($id);
        $category->delete();
        return redirect('admin/categories/');        
    }
}
