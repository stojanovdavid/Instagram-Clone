@extends('layouts.app')


@section('content')
    <div class="container px-3 py-5" style="width: 1190px; height:100%">
        <div class="row">
            <div class="col-5">
                <div class="container">
                    <div class="authUser d-flex p-4 border border-gray-300 align-items-center justify-content-center">
                        <h1 class="mr-3">{{ auth()->user()->username }}</h1>
                        <p class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                            </svg>
                        </p>
                    </div>
                    <div class="border border-secondary">
                        <div class="overflow-auto">
                            <div style="height: 800px"> 
                                @forelse ($messagedUsers as $messagedUser)
                                <div class="messagedUser d-flex px-3 py-3">
                                    @if ($messagedUser->id == auth()->user()->id)
                                    
                                    @else
                                        <img src="/css/images/{{ $messagedUser->imageUrl }}" alt="" class="rounded-circle" width="20%">
                                        <div>
                                            <p>{{ $messagedUser->username }}</p>
                                            <a href="{{ route('userChat', $messagedUser->id) }}">See convo</a>
                                        </div>
                                    @endif
                                </div>
                                @empty
                                    empty   
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7 text-center" style="">
                <div class="authUser d-flex border border-gray-300 align-items-center justify-content-center" style="padding:32.7px">
                    <div class="d-flex">
                        <img src="/css/images/{{ $chatWithUser->imageUrl }}" alt="" class="rounded-circle" width="8.2%">
                        <div>
                            <h4>{{ $chatWithUser->username }}</h4>
                        </div>
                    </div>
                    <div class="icons d-flex justify-content-between">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
                            </svg>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="border border-secondary" style="padding: 10px">
                    <div class="overflow-hidden" style="height: 741.8px">
                            @forelse ($messagesBetweenUsers as $messages)
                                @if ($messages->sender_id == auth()->user()->id)
                                    <div class="row no-gutters" style="padding: 0 10px">
                                        <div class="col-4">
                                            <div class="chat-bubble" style="">
                                                <div class="" id="sentByAuth">
                                                    <p class="bg-warning rounded" style="">{{ $messages->message_text }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row" style="padding: 0 10px">
                                        <div class="col-4 offset-8">
                                            <p class="bg-danger rounded">{{$messages->message_text}}</p>
                                        </div>
                                    </div>
                                @endif
                                    
                                @empty
                                    
                                @endforelse
                    </div> 
                    <form class="form-inline my-2 my-lg-0" id="sendMessageForm" onsubmit="sendMessage({{ auth()->user()->id }}, {{ $chatWithUser->id }})">
                        <input class="form-control mr-sm-2 rounded" type="search" id="sentMessage" name="sentMessage" placeholder="Message..." aria-label="Search">
                    </form>
                </div>   
            </div>
        </div>
    </div>
@endsection