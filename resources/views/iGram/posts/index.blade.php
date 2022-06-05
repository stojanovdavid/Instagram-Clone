@extends('layouts.app')


@section('content')
    <div class="container" style="width: 50%;">
        <div class="row mb-2" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
            <div class="col-6">
                <img src="/css/images/{{ $post->imageUrl }}" alt="" class="w-100 rounded">
            </div>
            <div class="col-6">
                <div style="height: 486.8px">
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
                    <div class="row">
                        <div class="d-flex align-items-center pt-2">
                            <div>
                                <img src="/css/images/{{ $post->user->imageUrl }}" alt="" class="rounded-circle" width="50px">
                            </div>
                            <div class="pl-3">
                                <h6>
                                    <strong>{{ $post->caption }}</strong>
                                </h6>
                            </div>
                        </div>
                        @forelse ($post->comments  as $comment)
                            <div class="d-flex align-items-center pt-2">
                                <div>
                                    <img src="/css/images/{{ $comment->user->imageUrl }}" alt="" class="rounded-circle" width="50px">
                                </div>
                                <div class="pl-3">
                                    <h6>
                                        <strong>{{ $comment->comment_text }}</strong>
                                    </h6>
                                </div>                        
                            </div>
                        @empty
                            
                        @endforelse
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
@endsection