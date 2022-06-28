@extends('layouts.app')


@section('content')
    <div class="container" style="width: 50%;">
        <div class="row mb-2 border-bottom border-secondary" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
            <div class="col-sm-3 p-3">
                @if (auth()->user()->imageUrl === NULL)
                    <img src="/css/images/avatar.jpeg" class="rounded-circle" width="70%" >
                @else
                    <img src="/css/images/{{ auth()->user()->imageUrl }}" class="rounded-circle" width="70%" >
                @endif
            </div>
            <div class="col-sm-9">
                <div class="d-flex pb-2">
                    <h4 class="pr-5" style="margin-bottom: 0px; margin-right: 30px">{{ auth()->user()->username }}</h4>
                    @if (auth()->user())
                    <a href="{{ route('profile.edit', auth()->user()->id) }}" class="btn btn-primary btn-sm">Edit profile</a>
                    @else
                        <button >Follow</button> 
                    @endif

                    {{-- @can('update', $user->profile)
                        <a class="btn btn-secondary btn-sm" href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    @endcan    --}}
                </div>
                <div class="d-flex pb-3">
                    <div class="pr-5" style="margin-right: 10px"><strong>0</strong> Posts</div>
                    <div class="pr-5" style="margin-right: 10px"><a data-bs-toggle="modal" data-bs-target="#followersModal" class="text-decoration-none text-dark"><span><strong>{{ $followers->count() }}</strong></span>  {{ Str::plural('follower', $followers->count()) }}</a></div>
                    <div class="modal fade" id="followersModal" tabindex="-1" role="dialog" aria-labelledby="followersModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Followers</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                @foreach ($followedByUsers as $followers)
                                    <p class="border-bottom border-secondary">{{ $followers->username }}</p>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="pr-5" style="margin-right: 10px"><a data-bs-toggle="modal" data-bs-target="#followingModal" class="text-decoration-none text-dark"><span><strong>{{ $following->count() }}</strong></span>  {{ Str::plural('following', $following->count()) }}</a></div>
                    <div class="modal fade" id="followingModal" tabindex="-1" role="dialog" aria-labelledby="followingModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Followers</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                @foreach ($followingUsers as $following)
                                    <p class="border-bottom border-secondary">{{ $following->username }}</p>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            
                <div class="float-right">
                    <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">Add post</a>
                </div>
                {{-- <div>
                    <span><b>{{ 'k' }}</b></span>
                    <p>
                    {{ 'k'}}
                    </p>
                </div> --}}
                {{-- @can('update', $user->profile)
                @endcan --}}
            
            </div>
        </div>
        <div class="row pt-3" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
            <section class="posts">
                <div class="container">
                    <div class="row pt-3" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
                        @forelse ($posts as $post)
                            <div class="col-4 col-md-4 mb-4 align-self-stretch px-2" style="padding: 3px">
                                <a href="{{ route('post.view', $post->id ) }}">
                                    <img src="/css/images/{{ $post->imageUrl }}" alt="" class="w-100" style="width:278px; height:265px">
                                </a>
                            </div>
                        @empty
                            You have no posts
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </div>    
@endsection