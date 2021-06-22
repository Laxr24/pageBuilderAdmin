<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::all('id','title', 'tagline', 'faviconLink', 'loginURL', 'homepageURL', 'errorpageURL'); 

        if(count($settings)){
            return response()->json([
                'id' => $settings[0]->id,
                'title'=>$settings[0]->title,
                'tagline'=>$settings[0]->tagline,
                'loginURL'=>$settings[0]->loginURL,
                'faviconLink'=>$settings[0]->faviconLink,
                'homepageURL'=>$settings[0]->homepageURL,
                'errorpageURL'=>$settings[0]->errorpageURL,
            ]); 
        }
        else{
            return response()->json([
                'title'=>'Default Title',
                'tagline'=>'Default Tagline',
                'loginURL'=>'admin',
                'faviconLink'=>'/media/favicon.png',
                'homepageURL'=>'/',
                'errorpageURL'=>'404',
            ]); 
        }

    }

    public function update(Request $request){

        $settings = Setting::find(1);  

        $settings->title = $request->title; 
        $settings->tagline = $request->tagline; 
        $settings->faviconLink = $request->faviconLink; 
        $settings->loginURL = $request->loginURL; 
        $settings->homepageURL = $request->homepageURL; 
        $settings->errorpageURL = $request->errorpageURL; 
        
        $save->save(); 


        return response()->json([
            'title'=> $request->title,
            'tagline'=> $request->tagline, 
            'faviconLink'=>$request->faviconLink,
            'loginURL'=>$request->loginURL,
            'homepageURL'=>$request->homepageURL,
            'errorpageURL'=>$request->errorpageURL,
        ], 200); 
    }
}
