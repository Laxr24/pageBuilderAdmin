<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

// if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class UploadController extends Controller{
    public function index()
	{
		return view('upload')->with(['msg'=>'Upload your file here']);
	}
	// public function uploadtoserver(){
	// 	return response()->json(['hi'=>'mEssage']); 
	// }

	public function uploadtoserver(Request $request)
   {
	   return response()->json(['msg'=>'hi']); 
   }
}
