<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
</head>
<body>
    @include('navbar')
    <div class="container" style="width: 50%;">
        <div class="row mb-2" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
            <div class="col-sm-3 p-3">
                 <img src="/css/images/ninja.png" class="rounded-circle" width="70%" >
            </div>
            <div class="col-sm-9">
                <div class="d-flex pb-2">
                    <h4 class="pr-5" style="margin-bottom: 0px">{{ $user->username }}</h4>
                    <input type="text" value="{{ $user->id }}" id="user" hidden>
                    <input type="text" value="{{ auth()->user()->id }}" id="authUser" hidden>
                    <input type="button" value="Follow" onclick="follow('{{ $user->id; }}')">
                    {{-- @can('update', $user->profile)
                         <a class="btn btn-secondary btn-sm" href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    @endcan    --}}
                </div>
                <div class="d-flex pb-3">
                     <div class="pr-5" style="margin-right: 10px"><strong></strong> Posts</div>
                     <div class="pr-5" style="margin-right: 10px"><span><strong>{{ $followers->count() }}</strong></span>  {{ Str::plural('follower', $followers->count()) }}</div>
                     <div class="pr-5" style="margin-right: 10px"><strong>0</strong> Following</div>
                </div>
               
                <div>
                    <span><b>{{ 'k' }}</b></span>
                    <p>
                     {{ 'k'}}
                    </p>
                </div>
                <div>
                    <a href="" style="text-decoration: none">Link</a>
                </div>
                {{-- @can('update', $user->profile)
                 <div class="float-right">
                     <a class="btn btn-primary btn-sm" href="/p/create">Add new post</a>
                 </div>   
                @endcan --}}
               
            </div>
        </div>
        <div class="row pt-3" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">

        <script src="{{ url('js/index.js') }}"></script>
</body>
</html>