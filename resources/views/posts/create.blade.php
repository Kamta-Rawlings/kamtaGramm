@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">

        @csrf

        <div class="row">
            
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Add new Post</h1>
                </div>
                
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                    <div class="col-md-6">
                        <input id="caption" type="text" 
                        class="form-control @error('caption') is-invalid @enderror" 
                        name="caption" value="{{ old('caption') }}" 
                        required autocomplete="caption" autofocus>
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                    <div class="row pt-3">
                            <label for="image" class="col-md-4 col-form-label ">Post Image</label>
                             <input type="file" class="form-control-file" id="image" name="image">
                             @error('image')
                          
                                 <strong>{{ $message }}</strong>
                              
                               @enderror
                    </div>

                    <div class=" pt-3">
                        <button class="btn btn-primary">Add new post</button>
                    </div>
            </div>
        </div>
    </form>
    
</div>
@endsection
