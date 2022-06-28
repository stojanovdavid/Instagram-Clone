@extends('layouts.app')


@section('content')
    <div class="container" style="width: 50%;">
        <div class="row mb-2" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
            <div class="col-6">
                <img src="/css/images/{{ $post->imageUrl }}" alt="" class="rounded" style="width: 438px; height:418px">
            </div>
            <div class="col-6">
                    <div class="d-flex align-items-center pt-2 border-bottom border-secondary pb-2">
                        <div>
                            <img src="/css/images/{{ $post->user->imageUrl }}" alt="" class="rounded-circle" width="50px">
                        </div>
                        <div class="pl-3">
                            <h6>
                                <strong>{{ $post->user->username }}</strong>
                            </h6>
                        </div>
                    </div>
                    <div class="overflow-auto" style="max-height: 350px;">
                        <div class="container">
                            <div class="row" style="margin-bottom:20px">
                                <div class="d-flex align-items-center pt-2">
                                    <div style="margin-right: 9.5px" class="pl-3 d-flex flex-column align-items-baseline">
                                        @if ($post->user->imageUrl === NULL)
                                            <img src="/css/images/avatar.jpeg" class="rounded-circle" style="width: 50px; height:50px">
                                        @else
                                            <img src="/css/images/{{ $post->user->imageUrl }}" alt="" class="rounded-circle" style="width: 50px; height:50px">
                                        @endif
                                    </div>
                                    <div class="pl-3">
                                        <h6>
                                            <strong>{{ $post->caption }}</strong>
                                        </h6>
                                    </div>
                                </div>
                                @forelse ($post->comments  as $comment)
                                    <div class="d-flex align-items-center pt-2 justify-content-between">
                                        <div class="d-flex align-items-center pt-2">
                                            <div style="margin-right: 10px">
                                                @if ($comment->user->imageUrl === NULL)
                                                    <img src="/css/images/avatar.jpeg" class="rounded-circle" style="width: 50px; height:50px">
                                                @else
                                                    <img src="/css/images/{{ $comment->user->imageUrl }}" alt="" class="rounded-circle" style="width: 50px; height:50px">
                                                @endif
                                            </div>
                                            <div class="pl-3 d-flex flex-column align-items-baseline">
                                                <h6>
                                                    <div class="d-flex" style="margin-top: 22px">
                                                        <a href="{{route('user.view', $comment->user->id)}}" class="text-decoration-none text-dark">                                                        
                                                            <strong style="margin-right: 9.5px">{{ $comment->user->username }}</strong>
                                                        </a>
                                                            <p>{{ $comment->comment_text }}</p>
                                                    </div>
                                                </h6>
                                                <div class="d-flex">
                                                    <div class="" style="margin-right:9px">
                                                        <p>{{ $comment->created_at->diffForHumans(null, true, true) }}</p>
                                                    </div>
                                                    @if (auth()->user()->id == $comment->user->id)
                                                    <div class="" style="margin-right:9px">
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#deleteCommentModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                                            </svg>
                                                        </a>
                                                        <div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog" aria-labelledby="deleteCommentModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-body">
                                                                  <h3 class="text-danger text-center border-bottom border-secondary py-3"><a href="{{ route('comment.delete', $comment->id) }}" class="text-decoration-none">  Delete comment</a></h3>
                                                                  <h3 class="py-3 text-center" data-bs-dismiss>Close</h3>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>                     
                                    </div>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="align-self-end">
                        <div class="">
                            @if ($post->likedBy(auth()->user()))
                                <form action="{{ route('post.unlike', $post->id) }}">
                                        @csrf
                                        <button type="submit" class="" style="background: none; border: none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                </svg>
                                        </button>
                                </form>
                            @else
                                <form action="{{ route('post.like', $post->id) }}">
                                        @csrf
                                        <button type="submit" style="background: none; border:none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                                </svg>
                                        </button>
                                </form>
                            @endif
                            <div class="d-flex align-items-center pt-2">
                                <p style="margin-right: 5px">{{ $post->likes->count() }} </p>
                                    <p>{{ Str::plural('like', $post->likes->count()) }}</p>
                            </div>
                        </div>
                        <div>
                            <form class="form-inline my-2 my-lg-0" id="" onsubmit="comment({{ $post->id}}, {{ auth()->user()->id }})">
                                <input class="form-control mr-sm-2 rounded" type="search" id="commentPost" name="comPost" placeholder="Add a comment..." aria-label="Search">
                            </form>
                        </div>
                    </div>
            </div>
        </div>
        
    </div>    
@endsection