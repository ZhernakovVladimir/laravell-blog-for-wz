<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaticPage;
use App\Http\Requests;
use App\Http\Requests\StaticPagesRequest;

class AdminStaticPagesController extends Controller
{
    public function index(Request $request)
    {
    	$message = $request->session()->get('message');
    	$static_pages = StaticPage::All()->Lists('published','name');
    	return view('admin.static.index',compact('static_pages','message'));
    }

    public function saveSettings(StaticPagesRequest $request)
    {
    	$about = StaticPage::where('name','=','about')->firstOrFail();
    	$about->published = $request->about_published;
    	$about->save();
    	$contact = StaticPage::where('name','=','contact')->firstOrFail();
    	$contact->published = $request->contact_published;
    	$contact->save();
    	return redirect('admin/static')->with('message','изменения успешно сохранены');
    }
}
