@extends('layouts.app')


@section('content')
    <div class="container px-3 py-5" style="width: 1190px; height:100%">
        <div class="row bg-white border border-gray-400">
            <div class="col-5 border border-gray-400" style="height: 800px">
                <div class="row">
                    <div class="authUser d-flex  border-bottom border-gray-300 align-items-center justify-content-center">
                        <h1 class="mr-3">{{ auth()->user()->username }}</h1>
                        <p class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                            </svg>
                        </p>
                    </div>
                </div>
                @forelse ($convo_with_users as $user)
                <div class="row">
                    @if ($user->id != auth()->user()->id)
                    <div class="messagedUser d-flex px-3 py-3">
                            @if ($user->imageUrl === NULL)
                                <img src="/css/images/avatar.jpeg" class="rounded-circle" width="20%" style="margin-right: 20px">
                            @else
                                <img src="/css/images/{{ $user->imageUrl }}" alt="" class="rounded-circle" width="20%" style="margin-right: 20px">
                            @endif
                            <div class="d-flex flex-column">
                                <a href="{{ route('user.view', $user->id) }}" class="text-decoration-none text-dark" style="margin-bottom: 10px">{{ $user->username }}</a> <br>
                                <a href="{{ route('userChat', $user->id) }}" class="text-decoration-none text-dark">See convo</a>
                            </div>
                        </div>
                    @endif
                </div>
                @empty
                    Your inbox is empty
                @endforelse
            </div>
            <div class="col-7 text-center" style="margin: auto 0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                </svg>
                <div class="messages">
                    <h3>Messages</h3>
                    <p>Send your friends a message :)</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageModal">Send a message</button>
                    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
                                <p>New message</p>
                                <button class="btn btn-primary" onclick="sendTo('{{ auth()->user()->id }}')">Send</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p>To:</p>
                                    </div>
                                    <div class="col-6">
                                        <select name=""  id="reciever">
                                            @forelse ($followedUsers as $followedUser)        
                                                <option value="{{ $followedUser->id }}">{{ $followedUser->username }}</option>
                                            @empty
                                            You are not following anyone
                                             @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <p>Message:</p>
                                    </div>
                                    <div class="col-10">
                                        <form class="form-inline my-2 my-lg-0">
                                            <div class="row">
                                                <div class="col-8">
                                                    <input class="form-control" type="search" id="sendMessage" placeholder="Send..." aria-label="Search">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection