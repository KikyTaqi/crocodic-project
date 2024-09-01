<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukses</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-icons/font/bootstrap-icons.min.css') }}">   
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js')}}"></script>
</head>
<body>
     @include('header')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #F5F5F5;
        }

        .process-bar{
            width: 99%;
        }

        .lbl{font-size: 14px;}

        .form-control, .form-select{
            height: 40px;
        }

        
    </style>

    <div class="mx-4 my-3">
        <div class="card" style="border: 0; background: transparent;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md mb-3">
                        @if(session('success_edit'))
                            <a style="color: #333333; text-decoration: none;" href="/jobs"><i class="bi bi-chevron-left"></i>{{ session('jd')['job_name'] }}</a>
                        @else
                            <a style="color: #333333; text-decoration: none;" href="/jobs"><i class="bi bi-chevron-left"></i>Tambah pekerjaan baru</a>
                        @endif   
                    </div>
                    <div class="col-md-4" style="width: 450px">

                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="border: 0;">
            <div class="card-body">
                <div class="mt-1" id="div5">
                    <div class="kotak">
                        <img draggable="false" class="process-bar" src="{{asset('assets/Job-process-5.svg')}}" alt="">
                    </div>
                    <hr class="my-3">
                    <div class="mx-auto text-center mb-4" style="margin-top: 2cm;">
                        @if(session('success_tambah'))
                            <h4 style="color: green;">Lowongan Pekerjaan Berhasil Dibuat!</h4>
                        @elseif(session('success_edit'))
                            <h4 style="color: green;">Lowongan Pekerjaan Berhasil Diubah!</h4>
                        @else
                            <script>window.location='/jobs';</script>
                        @endif
                        <br>
                        @if (session('jd'))
                        <p style="line-height: 0;">{{ session('jd')['job_name'] }} Berhasil, Anda dapat melihatnya di website</p>
                        <p>gojobs dan jangan lupa membagikannya!</p>

                    <div class="card mx-auto" style="width: 18rem;">
                        <img style="height='100px'; width: '150px';" src="{{ asset('logo/' . session('jd')['foto_name'])}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <table class="table table-borderless">
                                <tr>
                                    <td>
                                        <h5 class="card-title float-start" style="font-size: 16px; line-height: 0;">{{ session('jd')['job_name'] }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="float-start align-left" style="font-size: 14px; line-height: 0;">{{ session('jd')['ads'] }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <small class="float-start" style="font-size: 12px; line-height: 0;">{{ session('jd')['lokasi'] }}</small>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                    <div class="mt-3" style="margin-bottom: 100px">
                        <a href="/jobs" style="max-width: 157px" class="btn btn-outline-success">Lihat di Gojobs</a>
                        <a href="#" style="max-width: 97px;" class="ms-2 btn btn-success" data-bs-toggle="modal" data-bs-target="#sharemodal">Share</a>


                        <div class="modal fade" id="sharemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Share Job</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="linkJob" readonly value="http://127.0.0.1:8000/jobs/detail/{{session('jd')['id_job']}}">
                                        <button class="btn btn-outline-secondary"onclick="copyInput()" type="button" id="button-addon2"><i class="bi bi-clipboard"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>

<script>
    function copyInput() {
        // Get the text field
        var copyText = document.getElementById("linkJob");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);
        
        // Alert the copied text
        alert("Copied the text: " + copyText.value);
    }
</script>




















                    

