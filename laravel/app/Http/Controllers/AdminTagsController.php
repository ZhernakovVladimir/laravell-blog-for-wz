<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Http\RedirectResponse;
use App\Tag;
class AdminTagsController extends Controller
{
    public function index()
    {
    	$tags = Tag::All();
    	return view('admin.tags.index',compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.show',compact('tag'));
    }

    public function create()
    {
    	return view('admin.tags.create');
    }


    public function store(CreateTagRequest $request)
    {
   
        $input = $request->All();
        Tag::Create($input);
        return redirect('admin/tags/');
    }

    public function edit($id)
    {
    	$tag = Tag::FindOrFail($id);
    	return view('admin.tags.edit' , compact('tag'));
    }

    public function update($id , UpdateTagRequest $request)
    {
        $Tag = Tag::FindOrFail($id);
        $Tag->update($request->All());
        return redirect('admin/tags/' . $id);
    }

    public function destroy($id)
    {
        $Tag = Tag::FindOrFail($id);
        $Tag->delete();
        return redirect('admin/tags/');        
    }
}
