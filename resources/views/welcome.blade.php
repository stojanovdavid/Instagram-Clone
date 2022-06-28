<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
</head>



<body>
    <div class="d-flex mx-auto justify-content-between bg-gray-200" style="width: 900px; height: 700px" >
        <div class="img">
            <img style="width: 550px; height: 705px" src="css/images/ig-removebg-preview.png" alt="">
        </div>
        <div class=" m-3" style="width: 400px; height: 705px">
            <div class="login bg-white mb-3 p-4 border border-secondary py-4" style="height: 480px">
                <div class="login-content text-center mx-auto" style="">
                    <img class="mb-5" src="/css/images/instagram.png" alt="" style="">
                    <form action="{{ route('login') }}" method="post" style="width: 300px" class="mx-auto">
                        @csrf
                        <input type="text" name="username" placeholder="Username" style="width: 100%" class="mb-2 px-2 py-1"> <br>
                        <input type="password" name="password" placeholder="Password" style="width: 100%" class="mb-3 px-2 py-1"> <br>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label> <br>
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
                <p>Dont have an account? <a href="{{ route('signup') }}" class="text-decoration-none">Sign up</a></p>
            </div>
        </div>
    </div>
</body>
</html>