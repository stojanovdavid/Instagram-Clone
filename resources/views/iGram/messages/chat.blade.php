@extends('layouts.app')


@section('content')
    <div class="container px-3 py-5" style="width: 1190px; height:100%">
        <div class="row bg-white">
            <div class="col-5 border border-gray-400">
                    <div class="row" style="height: 131.38px">
                        <div class="authUser d-flex  align-items-center justify-content-center" style="padding: 40px 20px 38.5px 20px">
                            <h1 class="mr-3">{{ auth()->user()->username }}</h1>
                            <p class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                    <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                                </svg>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="border-top border-gray-400">
                            <div class="overflow-auto">
                                <div style="height: 800px"> 
                                    @foreach ($messagedUsers as $messagedUser)
                                    @if ($messagedUser->id != auth()->user()->id)
                                    <div class="messagedUser d-flex px-3 py-3">
                                            @if ($messagedUser->imageUrl === NULL)
                                                <img src="/css/images/avatar.jpeg" class="rounded-circle" width="20%" style="margin-right: 20px">
                                            @else
                                                <img src="/css/images/{{ $messagedUser->imageUrl }}" alt="" class="rounded-circle" width="20%" style="margin-right: 20px">
                                            @endif
                                            <div>
                                                <a href="{{ route('user.view', $messagedUser->id) }}" class="text-decoration-none text-dark" style="margin-bottom: 10px">{{ $messagedUser->username }}</a> <br>
                                                <a href="{{ route('userChat', $messagedUser->id) }}">See convo</a>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-7 text-center border border-gray-400" style="">
                    <div class="row">
                        <div class="authUser d-flex align-items-center justify-content-center" style="padding:32.7px">
                            <div class="d-flex align-items-center pt-2 pb-2">
                                <div>
                                    @if ($chatWithUser->imageUrl === NULL)
                                        <img src="/css/images/avatar.jpeg" class="rounded-circle" width="50px">
                                    @else
                                        <img src="/css/images/{{ $chatWithUser->imageUrl }}" alt="" class="rounded-circle" width="50px" style="margin-right: 20px">
                                    @endif
                                </div>
                                <div class="pl-3">
                                    <h6>
                                        <strong>{{ $chatWithUser->username }}</strong>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="border-top border-gray-400" style="padding: 10px">
                            <div class="overflow-auto" style="height: 741.8px;">
                                   <div class="container">
                                    @forelse ($messagesBetweenUsers as $messages)
                                    @if ($messages->sender_id == auth()->user()->id)
                                        <div class="d-flex align-items-center pt-2 pb-2 col-4">
                                            <div style="padding-right: 10px">
                                                @if (auth()->user()->imageUrl === NULL)
                                                    <img src="/css/images/avatar.jpeg" class="rounded-circle" width="50px">
                                                @else
                                                    <img src="/css/images/{{ auth()->user()->imageUrl }}" alt="" class="rounded-circle" width="50px" style="margin-right: 20px">
                                                @endif
                                            </div>
                                            <div class="pl-3">
                                                <div class="" id="sentByAuth">
                                                    <p class="rounded p-2" style="border: 1.5px solid #dad8d8">{{ $messages->message_text }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-baseline mb-4 text-end justify-content-end">
                                            <div class="pe-2">
                                                <div>
                                                    <div class="d-inline-block p-2 px-3 r-1 rounded" style="background-color: #efefef">{{$messages->message_text}}</div>
                                                </div>
                                            </div>
                                            <div class="position-relative avatar">
                                                @if ($chatWithUser->imageUrl === NULL)
                                                    <img src="/css/images/avatar.jpeg" class="rounded-circle" width="50px">
                                                @else
                                                    <img src="/css/images/{{ $chatWithUser->imageUrl }}" alt="" class="rounded-circle" width="50px" style="margin-right: 20px">
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    
                                @empty
                                    
                                @endforelse
                                   </div>
                            </div> 
                            <form class="form-inline my-2 my-lg-0" id="sendMessageForm" onsubmit="sendMessage({{ auth()->user()->id }}, {{ $chatWithUser->id }})">
                                <input class="form-control mr-sm-2 rounded" type="search" id="sentMessage" name="sentMessage" placeholder="Message..." aria-label="Search">
                            </form>
                        </div>  
                    </div>
            </div>
        </div>
    </div>
@endsection