@extends('layouts.app')


@section('content')
    <div class="container px-3 py-5" style="width: 1190px; height:100%">
        <div class="row">
            <div class="col-5">
                <div class="authUser d-flex p-4 border border-gray-300 align-items-center justify-content-center">
                    <h1 class="mr-3">{{ auth()->user()->username }}</h1>
                    <p class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                            <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                        </svg>
                    </p>
                </div>
                @forelse ($messagedUsers as $messagedUser)
                <div class="messagedUser d-flex px-3 py-3">
                    @if ($messagedUser->id == auth()->user()->id)
                       k
                    @else
                        <img src="/css/images/{{ $messagedUser->imageUrl }}" alt="" class="rounded-circle" width="20%">
                        <div>
                            <p>{{ $messagedUser->username }}</p>
                            <a href="{{ route('userChat', $messagedUser->id) }}">See convo</a>
                        </div>
                    @endif
                </div>
                @empty
                    Your inbox is empty
                @endforelse
            </div>
            <div class="col-7 text-center" style="margin: auto 0">
                <div class="border border-danger py-4 px-2">
                    <img src="" alt="" id="recieverImage">
                    <p id="recieverUsername"></p>
                </div>
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
                                    <div class="col-2">
                                        <p>To:</p>
                                    </div>
                                    <div class="col-10">
                                        <section>
                                            @forelse ($followedUsers as $followedUser)
                                                <div class="row">
                                                    <div class="col-8">
                                                        <img src="/images/{{ $followedUser->imageUrl }}" alt="">
                                                        <p>{{ $followedUser->username }}</p>
                                                    </div>
                                                    <div class="col-4 align-items-center pt-4" >
                                                        <input type="radio" id="sendTo" value="{{ $followedUser->id }}" style="margin: 0 auto" onclick="getVal()">
                                                    </div>
                                                </div>
                                            @empty
                                                
                                            @endforelse
                                        </section>
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
                                                    <input class="form-control" type="search" id="sendMessage" placeholder="Search" aria-label="Search">
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Send</button>
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