<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all('id', 'title', 'url', 'type', 'headerCode', 'body', 'footerCode'); 
       return response()->json([
           'pages'=> $pages
       ]); 
        
    }



    public function update(Request $request){

        $page = Page::find($request->id); 
        $page->title = $request->title; 
        $page->url = $request->url; 
        $page->type = $request->type; 
        $page->headerCode = $request->headerCode; 
        $page->body = $request->body; 
        $page->footerCode = $request->footerCode; 
        $page->save(); 

        return response()->json([
            'data'=> $page
        ]); 
    }
}
