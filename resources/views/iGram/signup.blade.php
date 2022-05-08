<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
    <div class="mx-auto bg-white border border-secondary p-5 mt-5" style="width: 432.5px; height: 700px" >
        <div class="content text-center">
            <img src="/css/images/instagram.png" alt="">
            <div>
                <h3>Sign up to see photos and videos from your friends.</h3>
            </div>
            <div>
                <form action="{{ route('iGram.signup') }}" method="POST">
                    @csrf
                    <div class="mx-auto" style="width: 260px">
                        <div>
                            <input type="text" name="email" placeholder=" Enter email" class="mb-2 px-2 py-1">  <br>
                            <div class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <input type="text" name="fullName" placeholder="Full Name" class="mb-2 px-2 py-1"> <br>
                            <div class="text-danger">
                                @error('fullName')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <input type="text" name="username" placeholder="Username" class="mb-2 px-2 py-1"> <br>
                            <div class="text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <input type="text" name="password" placeholder="Password" class="mb-2 px-2 py-1"> <br>
                            <div class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <input type="text" name="password_confirmation" placeholder="Confirm Password" class="mb-2 px-2 py-1"> <br>
                        </div>
                        <button type="submit" value="Sign Up" class="btn btn-primary" style="width: 100%">
                            Sign Up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>