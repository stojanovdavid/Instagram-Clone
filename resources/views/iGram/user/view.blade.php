@extends('layouts.app')


@section('content')
<div class="container" style="width: 50%;">
    <div class="row mb-2" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
        <div class="col-sm-3 p-3">
            @if ($user->imageUrl == NULL)
                <img src="/css/images/avatar.jpeg" class="rounded-circle" width="70%">
            @else
                <img src="/css/images/{{ $user->imageUrl }}" class="rounded-circle" width="70%" >
            @endif
        </div>
        <div class="col-sm-9">
            <div class="d-flex pb-2">
                <h4 class="pr-5" style="margin-bottom: 0px; margin-right:10px">{{ $user->username }}</h4>
                <input type="text" value="{{ $user->id }}" id="user" hidden>
                <input type="text" value="{{ auth()->user()->id }}" id="authUser" hidden>
                @if ($isFollowing->isEmpty())
                    <input type="button" value="Follow" onclick="follow('{{ $user->id }}')">
                @else
                    <input type="button" value="Unfollow" onclick="unfollow('{{ $user->id }}')">
                @endif
            </div>
            <div class="d-flex pb-3">
                 <div class="pr-5" style="margin-right: 10px"><strong></strong> Posts</div>
                 <div class="pr-5" style="margin-right: 10px"><span><strong>{{ $followers->count() }}</strong></span>  {{ Str::plural('follower', $followers->count()) }}</div>
                 <div class="pr-5" style="margin-right: 10px"><strong style="margin-right: 7px">{{ $following->count() }}</strong><span>Following</span></div>
            </div>
            <div>
                <p>
                 {{ $user->bio}}
                </p>
            </div>
            <div>
                @if ((auth()->user()->id !== $user->id) && !$isFollowing->isEmpty())
                    <form action="{{ route('userChat', $user->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Message</button>
                    </form>
                @else
                    
                @endif
            </div>
        </div>
    </div>
    <div class="row pt-3" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
        <section class="posts">
            <div class="container">
                <div class="row pt-3" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
                    @forelse ($user->posts as $post)
                        <div class="col-4 col-md-4 mb-4 align-self-stretch px-2" style="padding: 3px">
                            <a href="{{ route('post.view', $post->id ) }}">
                                <img src="/css/images/{{ $post->imageUrl }}" alt="" class="w-100" style="width:278px; height:265px">
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