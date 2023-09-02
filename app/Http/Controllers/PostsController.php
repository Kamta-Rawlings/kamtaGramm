<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() //controllers to go to page to create post
    {
        return view('posts.create');
 
    }

    // public function store()
    // {
    //     $data = request()->validate ([
    //     //    'another'=> '',
    //        'caption' => 'required',
    //        'image'  => ['required',' image'],

    //     ]);
       
    //  $imagePath = request('image')->store('uploads','public');
    // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
    // //  $image= Image::make
    //  $image->save();

    //  auth()->user()->posts()->create ([
    //         'caption'=>$data['caption'],
    //         'image' => $imagePath,
    //     ]);

    public function store()
    {
        $data = request()->validate ([
        //    'another'=> '',
           'caption' => 'required',
           'image'  => ['required',' image'],

        ]);

        $imagePath = request('image')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
        $image->save();

        auth()->user()->posts()->create ([
                 'caption'=>$data['caption'],
                 'image' => $imagePath,
                ]);

       return redirect('/profile/'.auth()->user()->id);
 
    }

    public function show(\App\Models\Post $post)
    {
       return view('posts.show', compact('post'));
    }

}
