@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <p class="text-center">
            Profile
          </p>
        </div>

        <div class="panel-body">
          <center>
              <img src="{{ Storage::url($user->avatar) }}" width="100px" height="100px" style="border-radius:50%;" alt="">
          </center>
          <p class="text-center" style="margin-top:10px;">
            {{ $user->profile->location }}
          </p>
          <p class="text-center" style="margin-top:20px;">
            @if(Auth::id() == $user->id)
              <a href="{{ route('profile.edit') }}" class="btn btn-md btn-primary">Edit Profile</a>
            @endif
          </p>
        </div>
      </div>

      @if(Auth::id() !== $user->id)
        <div class="panel panel-default">
          <div class="body">
            <friend :profile_user_id="{{ $user->id }}"></friend>
          </div>
      </div>
      @endif

      <div class="panel panel-default">
          <div class="panel-heading">
            <p class="text-center">
              About Me
            </p>
          </div>
          <div class="panel-body">
            <p class="text-center">
              {{ $user->profile->about }}
            </p>
          </div>
        </div>
    </div>
  </div>

@stop
{{--  @  --}}