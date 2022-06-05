@extends('layouts.app')

@section('content')
<div class="container" style="width: 50%;"> 
    <div class="bg-white mt-5 border border-secondary" style="margin: 0 auto">
        <div class="userinfo p-4">
            <form action="{{ route('profile.edit', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-2">
                        <img src="/css/images/{{ $user->imageUrl }}" class="rounded-circle" width="70%" >
                    </div>
                    <div class="col-10">
                        <p>{{ $user->username }}</p>
                        <label for="">Profile photo</label> <br>
                        <input type="file" name="image">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="" class="" style="margin-right: 10px; margin-bottom:30px">Username</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="username" placeholder="{{ $user->username }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="" class="" style="margin-right: 10px; margin-bottom:30px">Bio</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="bio" placeholder="{{ $user->bio }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="" class="" style="margin-right: 10px; margin-bottom:30px">Email</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="email" placeholder="{{ $user->email }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <input type="submit" name="email" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection