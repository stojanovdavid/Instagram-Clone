<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index(){
        $messages =  DB::table('messages')
        ->distinct('sender_id', 'reciever_id')
        ->where('reciever_id','=',auth()->user()->id)
        ->orWhere('sender_id','=',auth()->user()->id)
        ->get(['sender_id', 'reciever_id']);
        $messagedUsersIds = [];
        foreach($messages as $key => $message){
            $messagedUsersIds[$key] = $message->reciever_id;
        }
        $messagedUsers = [];
        foreach($messagedUsersIds as $key => $messagedUser){
            $messagedUsers[] = User::where('id', $messagedUser)->first();
        }
        $followers = DB::table('user_profile')->where('following_id', auth()->user()->id)->orWhere('follower_id', auth()->user()->id)->get();
        $followedByUserIds = [];
        foreach($followers as $key => $follow){
            $followedByUserIds[$key] = $follow->follower_id;
        }
        $followedByUsers = [];
        foreach($followedByUserIds as $key => $followedUser){
            $followedByUsers[] = User::where('id', $followedUser)->first();
        } 

        $follows = DB::table('user_profile')->where('follower_id', auth()->user()->id)->get();
        $followedUserIds = [];
        foreach($follows as $key => $follow){
            $followedUserIds[$key] = $follow->following_id;
        }
        $followedUsers = [];
        foreach($followedUserIds as $key => $followedUser){
            $followedUsers[] = User::where('id', $followedUser)->first();
        }
        return view('iGram.messages.index', compact('messages', 'followedUsers', 'messagedUsers', 'followedByUsers'));
    }
    public function sendMessage($authId, $recieverId, $message){
        DB::table('messages')->insert([
            'sender_id' => $authId,
            'message_text' => $message,
            'reciever_id' => $recieverId
        ]);

        return json_encode(['message' => $message]);
    }

    public function seeChat($id){
        $messages = DB::table('messages')
        ->distinct('sender_id', 'reciever_id')
        ->where('reciever_id','=', auth()->user()->id)
        ->orWhere('sender_id','=',auth()->user()->id)
        ->get(['sender_id', 'reciever_id']);
        $messagedUsersIds = [];
        foreach($messages as $key => $message){
            $messagedUsersIds[$key] = $message->reciever_id;
        }
        $messagedUsers = [];
        foreach($messagedUsersIds as $key => $messagedUser){
            $messagedUsers[] = User::where('id', $messagedUser)->first();
        }
        $chatWithUser = User::where('id', $id)->first();

        $sentMessages = Message::where('sender_id', auth()->user()->id)->where('reciever_id', $id)->get();
        $recievedMessages = Message::where('sender_id', $id)->where('reciever_id', auth()->user()->id)->get();

        $messagesBetweenUsers = Message::where('sender_id', auth()->user()->id)->where('reciever_id', $id)
        ->orWhere('sender_id', $id)->where('reciever_id', auth()->user()->id)->get();


        return view('iGram.messages.chat', compact('messagedUsers', 'chatWithUser', 'messagesBetweenUsers'));
    }
}
