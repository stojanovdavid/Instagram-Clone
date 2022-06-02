@extends('layouts.app')


@section('content')
<div class="container" style="width: 50%;">
    <div class="row mb-2" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
        <div class="col-sm-3 p-3">
             <img src="/css/images/{{ $user->imageUrl }}" class="rounded-circle" width="70%" >
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
                <p>
                 {{ $user->bio}}
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
        <section class="posts">
            <div class="container">
                <div class="row pt-3" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
                    @forelse ($user->posts as $post)
                        <div class="col-sm-4" style="padding: 1px">
                            <a href="{{ route('post.view', $post->id ) }}">
                                <img src="/css/images/{{ $post->imageUrl }}" alt="" class="w-100">
                            </a>
                        </div>
                    @empty
                        This user has no posts
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection