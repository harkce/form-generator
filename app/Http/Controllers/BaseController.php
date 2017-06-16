<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller{
    protected function jsonResponse($code, $message, $content){
      return response()
        ->json(['code' => $code,'message' => $message, 'content' => $content])
        ->header('Content-type', 'application/json')
        ->header('Access-Controll-Allow-Origin','*');
    }
}
