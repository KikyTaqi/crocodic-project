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
        body::-webkit-scrollbar{
            display: none;
        }
    </style>
</head>
<body style="background: #F5F5F5;">
    <div class="col-md-auto sidebar-candidate" style="">
        <div class="row top d-flex back-content my-auto" style="height: fit-content;">
            <a href="/candidates" class="text-decoration-none my-auto" style="width: fit-content;margin-top: 10px;"><img src="{{asset('assets/back.svg')}}" alt=""></a>
            <div class="d-flex" style="flex-flow: column;width: fit-content;align-self: center;">
                <h6>Candidates</h6>
                <p><span id="result"></span> results</p>
            </div>
        </div>
        @php
            $id = null;
        @endphp
        @foreach($candidateDetail as $ca)
            @php
                $id = $ca->id_candidate;
            @endphp
        @endforeach
        @php
            $res = 0;
        @endphp
        @foreach($candidates as $c)
        @php
        ++$res;
        @endphp
        <div class="row d-flex my-4 data-candidates @if($id == $c->id_candidate) active @endif" style="" id="{{$c->id_candidate}}" onclick="detailCandidate({{$c->id_candidate}})">
            <div class="d-flex" style="width: fit-content;align-self: center; padding-left: 30px;">
                <img class="profile-foto" src="{{asset('assets/profile_img/'.$c->foto_profile)}}" alt="">
                <div class="d-flex" style="flex-flow: column;margin: 0;padding: 0;">
                    <p class="profile-name">{{$c->nama}}</p>
                    @if($c->process == 'interview_hr')
                    <span class="txt-{{$c->process}}">interview hr</span>
                    @elseif($c->process == 'interview_user')
                    <span class="txt-{{$c->process}}">interview user</span>
                    @else
                    <span class="txt-{{$c->process}}">{{$c->process}}</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        <span id="res" valueRes="{{$res}}"></span>
    </div>

    <script>
        var res = document.getElementById('res');
        var result = document.getElementById('result');
        var resValue = res.getAttribute('valueRes');
        var dataCandidate = document.getElementsByClassName('data-candidates');
        
        if(resValue != 0){
            result.innerHTML = resValue;
        }
        
        function detailCandidate(id){
            // console.log(dataCandidate);
            var candidatesNow = document.getElementById(id);
            Array.from(dataCandidate).forEach(c => {
                console.log(c);
                if(c.classList.contains('active')){
                    
                    c.classList.remove('active');
                }
            });
            // candidatesNow.classList.add('active');
            window.location.href = '/candidates/detail/'+id;
        }
    </script>
</body>
</html>




