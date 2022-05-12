@extends('layouts.app')



@section('content')
    <div class="d-flex mx-auto justify-content-between bg-gray-200" style="width: 900px; height: 700px" >
        <div class="img">
            <img style="width: 450px; height: 705px" src="css/images/igpng.webp" alt="">
        </div>
        <div class=" m-3" style="width: 400px; height: 705px">
            <div class="login bg-white mb-3 p-4 border border-secondary py-4" style="height: 480px">
                <div class="login-content text-center mx-auto" style="">
                    <img class="mb-5" src="/css/images/instagram.png" alt="" style="">
                    <form action="{{ route('iGram.login') }}" method="post" style="width: 300px" class="mx-auto">
                        @csrf
                        <input type="text" name="username" placeholder="Username" style="width: 100%" class="mb-2 px-2 py-1"> <br>
                        <input type="text" name="password" placeholder="Password" style="width: 100%" class="mb-3 px-2 py-1"> <br>
                        <button type="submit" class="btn btn-primary">
                            Log In
                        </button>
                    </form>
                    @if (session('message'))
                        {{ session('message') }}
                    @endif
                </div>
            </div>
            <div class="signup bg-white p-4 text-center border border-secondary" style="height: 85px">
                <p>Dont have an account? <a href="{{ route('iGram.signup') }}">Sign up</a></p>
            </div>
        </div>
    </div>
@endsection