@extends('layouts.app')

@section('content')

<!--home view immediately the user log into our App-->
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>

        <!--We used a column of 9 here because according to bootstrap 
        a page is divided in to 12cols, so we divide the page into two as a multiple of 12
         with regards of the size of the contents-->
         <!--code to view the other side of our ig clone page-->
        <div class="col-9 pt-5">
            <!--Making the views in homeblade to be dynamic(by fetching data from the database)-->
            <div class="d-flex justify-content-between align-items-baseline"><!--justify and align commands -->
                
            <div class="d-flex align-items-center">
            <div class="h4">{{$user->username}}</div>

                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
            </div>


                {{-- To be sure only the authozised user can add a post on his page
                and be able to see the correct user name --}}

                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
            @endcan
            
            </div>

            {{-- TO hide the edit link so unauthozized users cannot click it --}}
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div style="padding-right: 9px;"><strong>{{$postCount}}</strong>post</div>
                <div style="padding-right: 9px;"><strong>{{$followersCount}}</strong>followers</div>
                <div style="padding-right: 9px;"><strong>{{$followingCount}}</strong>following</div>
            </div>
            <div class="pt-3 font-weight-bold">{{$user->profile->title}}</div><!--fetching the user's title from the db-->
            <div> {{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url}}</a></div> 
        </div>
    </div>

    <!-- To arrange the view post images. ThE COLUMN of 4 was used because we want
    to have 3 equal pictures on the screen(Grid of 12)-->
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
          <a href="/p/{{$post->id}}">
      <img src="/storage/{{$post->image}}" class="W-100">
      </a>
     </div>
            
        @endforeach
    </div>
</div>
@endsection
