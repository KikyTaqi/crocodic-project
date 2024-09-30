<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <style>
        body{
            max-height: 100vh;
            overflow: hidden;
        }
        body::-webkit-scrollbar{
            display: none;
        }
    </style>
</head>
<body style="background: #F5F5F5;">
    @include('header')
    <div class="col-md sidebar-candidate" style="">
        <div class="row top d-flex back-content my-auto" style="height: fit-content;">
            <a href="/candidates" class="text-decoration-none my-auto" style="width: fit-content;margin-top: 10px;"><img src="{{asset('assets/back.svg')}}" alt=""></a>
            <div class="d-flex" style="flex-flow: column;width: fit-content;align-self: center;">
                <h6>Candidates</h6>
                <p><span id="result">8</span> results</p>
            </div>
        </div>
        @foreach($candidates as $c)
        <div class="row d-flex my-4 data-candidates" style="">
            <div class="d-flex" style="width: fit-content;align-self: center; padding-left: 30px;">
                <img class="profile-foto" src="{{asset('assets/profile_img/'.$c->foto_profile)}}" alt="">
                <p class="profile-name">{{$c->nama}}</p>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>