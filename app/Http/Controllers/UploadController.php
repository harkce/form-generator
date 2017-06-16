<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index() {
    	return view('upload.upload');
    }

    public function store(Request $request) {
    	if ($request->hasFile('bahaha')) {
    		return $request->bahaha->storeAs('public', 'naon.png');
    		// return Storage::put('public/upload', $request->file('image'));
    	} else {
    		return 'No bahaha found';
    	}
    }

    public function show() {
    	$url =  Storage::url('naon.png');
    	return '<img src=' . $url . ' />';
    }
}
