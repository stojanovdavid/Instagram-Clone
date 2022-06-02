@extends('layouts.app')


@section('content')
    <div class="container" style="width: 50%;">
        <div class="row mb-2" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
            <div class="col-6">
                <img src="/css/images/{{ $post->imageUrl }}" alt="" class="w-100 rounded">
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
                    <div>
                        <form action="{{ route('comment.add') }}" method="post">
                            <input type="text" name="comment" placeholder="Add a comment...">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>    
@endsection