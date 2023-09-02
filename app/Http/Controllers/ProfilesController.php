<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //code to return the exact user in the profiles page
    public function index(\App\Models\User $user)
    {
        // $user= User::findorFail($user); 
        // return view('profiles.index', [
        //     'user'=>$user,
        // ]);

        return view('Profiles.index', compact('user'));

       // dd($user);
       // dd(User::find($user));findorfail is used when a user gives something inappropriate to the web 
       //so it breaks
      
    } //old and long way for the eindex route

    public function edit(\App\Models\User $user)
    {
        // $this->authorize ('update', $user->profile);
        return view('Profiles.edit', compact('user'));
       
       
       

    }

    public function update(\App\Models\User $user)
    {
        // closing the edit profile endpoint
    //  $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',

        ]);
        // dd($data);
       

        if(request('image')){

            $imagePath = request('image')->store('profile','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(100,100);
            $image->save();
           
            //use this path to let you be able to leave the pic open
            $imageArray = ['image' => $imagePath];
    
        }
        // dd($data);

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
            //['image'=>$imagePath ?? null]
        ));

        return redirect("/profile/{$user->id}");
    }
}
