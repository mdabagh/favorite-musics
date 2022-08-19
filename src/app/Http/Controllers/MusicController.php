<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function show($slug)
   {
       return view('musics', [
           'musics' => Music::where('slug', '=', $slug)->first()
       ]);
   }
   public function store(Request $request)
   {
       $post = new Music;

       $post->title = $request->title;
       $post->body = $request->body;
       $post->slug = $request->slug;

       $post->save();

       return response()->json(["result" => "ok"], 201);
   }
}
