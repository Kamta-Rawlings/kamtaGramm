@extends('layouts.app')

@section('content')

<!--home view immediately the user log into our App-->
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">

        @csrf
        @method('PATCH')

        <div class="row">
            
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Profiles</h1>
                </div>
                
                    <label for="title" class="col-md-4 col-form-label">Post title</label>
                    <div class="col-md-6">
                        <input id="title" type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                         name="title" value="{{ old('title') ?? $user->profile->title}}" {{--use the current title or maintain whhats there when validation fails--}}
                        required autocomplete="title" autofocus> 
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="description" class="col-md-4 col-form-label">Post description</label>
                        <div class="col-md-6">
                            <input id="description" type="text" 
                            class="form-control @error('description') is-invalid @enderror" 
                            name="description" value="{{ old('description') ?? $user->profile->description}}" 
                            required autocomplete="description" autofocus>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="url" class="col-md-4 col-form-label">Post url</label>
                            <div class="col-md-6">
                                <input id="url" type="text" 
                                class="form-control @error('url') is-invalid @enderror" 
                                name="url" value="{{ old('url') ?? $user->profile->url }}" 
                                required autocomplete="url" autofocus>
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   
                    <div class="row pt-3">
                            <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                             <input type="file" class="form-control-file" id="image" name="image">
                             @error('image')
                          
                                 <strong>{{ $message }}</strong>
                              
                               @enderror
                    </div>

                    <div class=" pt-3">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
            </div>
        </div>
    </form>
</div>
@endsection
