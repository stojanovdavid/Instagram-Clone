@extends('layouts.app')


@section('content')
    <div class="container" style="width: 50%;">
        <div class="row mb-2" style="background: rgb(255 255 255 / 54%);padding: 12px;border-radius: 5px;">
            <p>Add new post</p>
            <form action="{{ route('post.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="postImageUrl" id="postImage"> <br>
                <label for="">Caption:</label>
                <input type="text" name="caption" id="caption"> <br>
                <input type="submit" name="submit" value="Create post">
            </form>
        </div>
        
    </div>    
@endsection