@extends('layouts.app')


@section('content')
        <div class="container" style="width: 1091px; margin-top:20px">
                <div class="row">
                        <div class="col-7 overflow-auto" style="height: 900px">
                                @forelse ($followedUsers as $followedUser)
                                        @foreach ($followedUser->posts as $post)
                                                <div class="card my-3" style="width: 630px">
                                                        <div class="card-header">
                                                                <div class="d-flex align-items-center pt-2 pb-2">
                                                                        <div>
                                                                                @if ($post->user->imageUrl === NULL)
                                                                                        <img src="/css/images/avatar.jpeg" class="rounded-circle" style="width: 50px; height:50px">
                                                                                @else
                                                                                        <img src="/css/images/{{ $post->user->imageUrl }}" alt="" class="rounded-circle" width="50px">
                                                                                @endif 
                                                                        </div>
                                                                        <div class="pl-3">
                                                                        <h6>
                                                                                <strong><a href="{{ route('user.view', $post->user->id) }}" class="text-decoration-none text-dark">{{ $post->user->username }}</a></strong>
                                                                        </h6>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="card-body">
                                                                <img src="/css/images/{{ $post->imageUrl }}" alt="" style="width: 580px; height:560px; margin-bottom:20px">
                                                                <div class="d-flex align-items-center" style="margin-bottom: 8px">
                                                                        <div style="margin-right: 20px">
                                                                                @if ($post->likedBy(auth()->user()))
                                                                                <form action="{{ route('post.unlike', $post->id) }}">
                                                                                        @csrf
                                                                                        <button type="submit" class="" style="background: none; border: none">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                                                                </svg>
                                                                                        </button>
                                                                                </form>
                                                                                @else
                                                                                <form action="{{ route('post.like', $post->id) }}">
                                                                                        @csrf
                                                                                        <button type="submit" style="background: none; border:none">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                                                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                                                                                </svg>
                                                                                        </button>
                                                                                </form>
                                                                                @endif
                                                                        </div>
                                                                        <div>
                                                                                <form action="{{ route('post.view', $post->id) }}">
                                                                                        @csrf
                                                                                        <button type="submit" style="background: none; border:none">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                                                                                                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                                                                                </svg>
                                                                                        </button>
                                                                                </form>
                                                                        </div>
                                                                </div>
                                                                <div class="likes d-flex align-items-center" style="margin-bottom: 8px">
                                                                        <strong style="margin-right: 5px">{{ $post->likes->count() }}</strong>
                                                                        <strong>{{ Str::plural('like', $post->likes->count()) }}</strong>
                                                                </div>
                                                                <div class="d-flex" style="margin-bottom: 8px">
                                                                        <strong style="margin-right: 5px">{{ $post->user->username }}</strong>
                                                                        <p>{{ $post->caption }}</p>
                                                                </div>
                                                                <div>
                                                                        <a href="{{ route('post.view', $post->id) }}" class="text-decoration-none"><p>View <span>{{ Str::plural('comment', $post->comments->count()) }}</span></p></a>
                                                                </div>
                                                                <div class="">
                                                                        <p>{{ $post->created_at->diffForHumans(null, false, false) }}</p>
                                                                </div>
                                                        </div>
                                                        <div class="card-footer bg-white">
                                                                <form class="form-inline my-2 my-lg-0" onsubmit="commentFeed({{ $post->id}}, {{ auth()->user()->id }})">
                                                                        <input class="form-control mr-sm-2" type="search" id="commentPost{{ $post->id }}" placeholder="Add a comment..." aria-label="Search">
                                                                </form>
                                                        </div>
                                                </div> 
                                        @endforeach
                                @empty
                                
                                <div class="card">
                                        <div class="card-body">
                                                <p>You have no friends</p>
                                        </div>
                                </div>
                                @endforelse
                        </div>
                        <div class="col-5 p-5">
                                <div class="d-flex align-items-center pt-2 pb-2 justify-content-center">
                                        <div style="margin-right: 10px">
                                                @if (auth()->user()->imageUrl === NULL)
                                                        <img src="/css/images/avatar.jpeg" class="rounded-circle" style="width: 50px; height:50px">
                                                @else
                                                        <img src="/css/images/{{ auth()->user()->imageUrl }}" alt="" class="rounded-circle" width="60px">
                                                @endif
                                        </div>
                                        <div class="pl-3">
                                                <h4>
                                                        <strong>{{ auth()->user()->username }}</strong>
                                                </h4>
                                        </div>
                                </div>
                                <div>
                                        <p class="text-primary">All users</p>
                                </div>
                                <div class="users overflow-auto" style="height: 264px">
                                        @forelse ($users as $user)
                                        <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center pt-2 pb-2">
                                                        <div style="margin-right: 10px">
                                                                @if ($user->imageUrl === NULL)
                                                                <img src="/css/images/avatar.jpeg" class="rounded-circle" style="width: 50px; height:50px">
                                                                @else
                                                                        <img src="/css/images/{{ $user->imageUrl }}" alt="" class="rounded-circle" style="width: 50px; height:50px">
                                                                @endif                                                        
                                                        </div>
                                                        <div class="pl-3">
                                                                <h4>
                                                                        <strong>{{ $user->username }}</strong>
                                                                </h4>
                                                        </div>
                                                </div>
                                                <div>
                                                        <input type="text" value="{{ $user->id }}" id="user" hidden>
                                                        <input type="text" value="{{ auth()->user()->id }}" id="authUser" hidden>
                                                        <form action="{{ route('user.view', $user->id) }}">
                                                                @csrf
                                                                <button type="submit" style="background: none; border:none" class="text-primary">
                                                                        <p>View profile</p>
                                                                </button>
                                                        </form>
                                                </div>
                                        </div>
                                        @empty
                                            
                                        @endforelse
                                </div>
                        </div>
                </div>
        </div>
@endsection