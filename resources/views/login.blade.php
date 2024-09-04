<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/script.js')}}"></script>
    <title>Login GoJobs</title>
</head>
<body style="margin:0" class="container-login">
    <div class="hitam-login">
    </div>
    <div class="title-login">
        <h5>gojobs HR Recruiter Log In</h5>
        <div class="white-accent"></div>
        <p class="">Manage all applicant candidates</p>
    </div>
    <div class="card float-end bg-light card-login pt-5">
        <h5 class="txt-green mt-5">Hi Recruiter</h5>
        <p class="txt-small">Silahkan masukkan NIK ISH dan kata sandi</p>

        <form action="/login" method="post" class="mt-5 form-input-login">
            @csrf
            <input type="text" name="nik_ish" id="" class="input-login mb-4" placeholder="NIK">
            <div class="input-password">
                <input type="password" name="password" id="input-pw" class="input-login" placeholder="Kata sandi">
                <i class="bi bi-eye-slash-fill" id="password-eye"></i>
            </div>
            <div class="remember-me">
                <input type="checkbox" name="remember_me" id="">
                <p class="txt-small"><small>Ingat saya</small></p>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
    <script>
        var passwordEye = document.getElementById('password-eye');
        var inputPassword = document.getElementById('input-pw');
        passwordEye.addEventListener('click',function(){
            if(passwordEye.classList.contains("bi-eye-slash-fill")){
                passwordEye.classList.remove("bi-eye-slash-fill");
                passwordEye.classList.add("bi-eye-fill");
                inputPassword.type = "text";
            }else{
                inputPassword.type = "password";
                passwordEye.classList.add("bi-eye-slash-fill");
                passwordEye.classList.remove("bi-eye-fill");
            }
        });
    </script>
</body>
</html>