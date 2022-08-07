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
                    <a href="{{ route('profile.edit', auth()->user()->id) }}" class="btn btn-primary" style="margin-right: 20px">Edit profile</a>
                    @else
                        <button >Follow</button> 
                    @endif

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccModal">
                        Delete account
                      </button>
                    <div class="modal hide fade" id="deleteAccModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Account</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure you want to delete your account?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <form action="{{ route('profile.delete', auth()->user()->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
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
                                    <div class="profile-content">
                                      <div class="row">
                                          <div class="col-xl-12">
                                              <div class="tab-content p-0">
                                                  <div class="tab-pane fade active show" id="profile-followers">
                                                      <div class="list-group">
                                                          <div class="list-group-item d-flex align-items-center">
                                                              @if ($followers->imageUrl === NULL)
                                                                  <img src="/css/images/avatar.jpeg" class="rounded-circle" width="50px" >
                                                              @else
                                                                  <img src="/css/images/{{ $followers->imageUrl }}" class="rounded-circle" width="70%" >
                                                              @endif
                                                              <div class="flex-fill pl-3 pr-3">
                                                                  <div><a href="#" class="text-dark font-weight-600">{{ $followers->username }}</a></div>
                                                                  <div class="text-muted fs-13px">North Raundspic</div>
                                                              </div>
                                                              <form action="{{ route('user.view', $followers->id) }}">
                                                                @csrf
                                                                <button type="submit" style="background: none; border:none" class="text-primary">
                                                                        <p class="btn btn-outline-primary">View profile</p>
                                                                </button>
                                                        </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
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
                                    <div class="profile-content">
                                      <div class="row">
                                          <div class="col-xl-12">
                                              <div class="tab-content p-0">
                                                  <div class="tab-pane fade active show" id="profile-followers">
                                                      <div class="list-group">
                                                          <div class="list-group-item d-flex align-items-center">
                                                              @if ($following->imageUrl === NULL)
                                                                  <img src="/css/images/avatar.jpeg" class="rounded-circle" width="50px" >
                                                              @else
                                                                  <img src="/css/images/{{ $following->imageUrl }}" class="rounded-circle" width="70%" >
                                                              @endif
                                                              <div class="flex-fill pl-3 pr-3">
                                                                  <div><a href="#" class="text-dark font-weight-600">{{ $following->username }}</a></div>
                                                                  <div class="text-muted fs-13px">North Raundspic</div>
                                                              </div>
                                                              <form action="{{ route('user.view', $following->id) }}">
                                                                @csrf
                                                                <button type="submit" style="background: none; border:none" class="text-primary">
                                                                        <p class="btn btn-outline-primary">View profile</p>
                                                                </button>
                                                        </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
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