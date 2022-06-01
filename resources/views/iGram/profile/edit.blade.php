<!DOCTYPE html>
<html lang="en">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
    @include('navbar')
    <div class="container" style="width: 50%;"> 
        <div class="bg-white mt-5 border border-secondary" style="margin: 0 auto">
            <div class="userinfo p-4">
                <form action="{{ route('profile.edit', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-2">
                            <img src="/css/images/{{ $user->imageUrl }}" class="rounded-circle" width="70%" >
                        </div>
                        <div class="col-10">
                            <p>{{ $user->username }}</p>
                            <label for="">Profile photo</label> <br>
                            <input type="file" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="" class="" style="margin-right: 10px; margin-bottom:30px">Username</label>
                        </div>
                        <div class="col-10">
                            <input type="text" name="username" placeholder="{{ $user->username }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="" class="" style="margin-right: 10px; margin-bottom:30px">Bio</label>
                        </div>
                        <div class="col-10">
                            <input type="text" name="bio" placeholder="{{ $user->bio }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="" class="" style="margin-right: 10px; margin-bottom:30px">Email</label>
                        </div>
                        <div class="col-10">
                            <input type="text" name="email" placeholder="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <input type="submit" name="email" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script src="{{ url('js/index.js') }}"></script>
</body>
</html>