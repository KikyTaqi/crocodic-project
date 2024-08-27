<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <title>Settings</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #F5F5F5;
        }

        .back{
            text-decoration: none;
            color: black;
        }

        .back:hover{
            color: grey;
        }

        .toggle-task-custom {
            background-color: transparent !important;
            color: #333333 !important;
            border-radius: 10px !important;
        }

        .toggle-task-custom.active {
            background-color: #81B29A !important;
            color: #FFFFFF !important;
            border-radius: 10px !important;
        }
    </style>
</head>
<body>
    @include('header')

    <div class="card" style="background: transparent; border: 0;">
        <div class="card-header" style="height: 100px; background: #F5F5F5;">
            <br>
            <a class="back" href="/jobs/detail/{{$id}}"><i class="bi bi-chevron-left"></i> Jobs/Setting</a>
        </div>
        <div class="row mt-4 mx-3">
            <div class="col-md-2">
                <p>Setting</p>
                <ul class="nav nav-pills" id="pills-tab" role="tablist" style="font-size: 15px;">
                    <li class="nav-item me-2 mb-2" role="presentation">
                        <button style="width: 200px; text-align: left;" class="pil nav-link mb-2 active toggle-task-custom" id="pills-job-access-tab" data-bs-toggle="pill" data-bs-target="#pills-job-access" type="button" role="tab" aria-controls="pills-job-access" aria-selected="true">Job Access</button>
                        <button style="width: 200px; text-align: left;" class="pil nav-link mb-2 toggle-task-custom" id="pills-notification-tab" data-bs-toggle="pill" data-bs-target="#pills-notification" type="button" role="tab" aria-controls="pills-notification" aria-selected="false">Notification</button>
                        <button style="width: 200px; text-align: left;" class="pil nav-link mb-2 toggle-task-custom" id="pills-process-tab" data-bs-toggle="pill" data-bs-target="#pills-process" type="button" role="tab" aria-controls="pills-process" aria-selected="false">Process</button>
                    </li>
                </ul>
            </div>
            <div class="col-md">
                <div class="card" style="border: 0;">


                    <div class="tab-content" id="pills-tabContent">
                        

                        <div class="tab-pane fade show active" id="pills-job-access" role="tabpanel" aria-labelledby="pills-job-access-tab">
                            <div class="card-body px-4">
                                <div class="table-responsive">
                                    <div class="mb-4">
                                        <h4>Manage Job Access</h4>
                                        <br>
                                        <button class="btn btn-success float-end mb-2" data-bs-toggle="modal" data-bs-target="#addpic">Create Access</button>
                                        <table class="table">
                                            <thead tyle="font-size: 14px; font-weight: 500;">
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Email</th>
                                                    <th>Office</th>
                                                    <th>Category</th>
                                                </tr>
                                            </thead>
                                            <tbody class="align-middle" style="font-size: 14px;">
                                                <tr style="height: 64px">
                                                    <td></td>
                                                    <td>Nisa</td>
                                                    <td>MGR Source</td>
                                                    <td>nisa@ish.com</td>
                                                    <td>ISH Palembang</td>
                                                    <td><span class="badge bg-success">Job Creator</span></td>
                                                </tr>
                                                <tr style="height: 64px">
                                                    <td></td>
                                                    <td>Edo</td>
                                                    <td>MGR Source</td>
                                                    <td>Edo@ish.com</td>
                                                    <td>ISH Jakarta</td>
                                                    <td><span class="badge bg-primary">Job Approval</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
    
    
                                    <!-- modal -->
                                     <div class="modal fade" id="addpic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <p style="font-size: 16px; font-weight: 500; line-height: 0; margin-top: 10px">Manage Job Access</p>
                                                    <p style="font-size: 12px; font-weight: 400; max-width: 90%;">Agensi yang ditugaskan dan perekrut individu akan dapat mengirimkan kandidat untuk pekerjaan ini melalui portal agensi internal. Setiap kandidat yang mereka ajukan akan ditandai dengan jelas sebagai ditambahkan secara internal.</p>
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <input style="width: 90%; height: 44px;" type="text" name="" id="" class="form-control">
                                                        </div>
                                                        <div class="col-md">
                                                            <button class="btn btn-success float-end" data-bs-target="#createpic" data-bs-toggle="modal" data-bs-dismiss="modal">Create PIC</button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                <form action="" method="post">
                                                    
                                                    <table class="table">
                                                        <thead tyle="font-size: 14px; font-weight: 500;">
                                                            <tr>
                                                                <th></th>
                                                                <th>Name</th>
                                                                <th>Role</th>
                                                                <th>Email</th>
                                                                <th>Office</th>
                                                                <th>Category</th>
                                                            </tr>
                                                        </thead>
                                                    @if($pic->count() != 0)
                                                    @foreach($pic as $p)
                                                        <tbody class="align-middle" style="font-size: 14px;">
                                                            <tr style="height: 64px">
                                                                <td class="align-center"><input type="checkbox" name="" id=""></td>
                                                                <td>{{$p->nama}}</td>
                                                                <td>{{$p->role}}</td>
                                                                <td>{{$p->email}}</td>
                                                                <td>{{$p->office}}</td>
                                                                <td><span class="badge bg-success">Job Creator</span></td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                    @endif
                                                    </table>
                                                    <div class="float-end">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <input {{$pic->count() != 0 ? '' : 'disabled'}} type="submit" value="update" class="btn btn-success">
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="modal fade" id="createpic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Create PIC</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mx-3 my-3">
                                                        <form action="/jobs/setting" method="post">
                                                            @csrf
                                                            <div class="form-group mb-3">
                                                                <label for="nama">Name</label>
                                                                <input type="text" name="nama" id="nama" class="form-control">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="role">Role</label>
                                                                <input type="text" name="role" id="role" class="form-control">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" id="email" class="form-control">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="office">Office</label>
                                                                <input type="text" name="office" id="office" class="form-control">
                                                            </div>
                                                            <input style="width: 109px; height: 41px;" type="submit" value="Create" class="btn btn-success">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
    
    
                                    </div><br><br>
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <p style="font-size: 16px; font-weight: 500; line-height: 0;">Internal Access</p>
                                                <p style="font-size: 12px;">Pengguna Internal dan reviewer yang ditugaskan</p>
                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn-success float-end mb-2">Add PIC</button>
                                            </div>
                                        </div>
                                        <br>
                                        <table class="table">
                                            <thead tyle="font-size: 14px; font-weight: 500;">
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Email</th>
                                                    <th>Office</th>
                                                    <th>Category</th>
                                                </tr>
                                            </thead>
                                            <tbody class="align-middle" style="font-size: 14px;">
                                                <tr style="height: 64px">
                                                    <td></td>
                                                    <td>Tidak ada user yang ditugaskan</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                            </tbody>
                                        </table>
                                    </div><br><br>
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <p style="font-size: 16px; font-weight: 500; line-height: 0;">External Access</p>
                                                <p style="font-size: 12px;">Tampilan & proses akses internal yang ditetapkan</p>
                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn-success float-end mb-2">Add PIC</button>
                                            </div>
                                        </div>
                                        <table class="table">
                                            <thead tyle="font-size: 14px; font-weight: 500;">
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Email</th>
                                                    <th>Office</th>
                                                    <th>Category</th>
                                                </tr>
                                            </thead>
                                            <tbody class="align-middle" style="font-size: 14px;">
                                                <tr style="height: 64px">
                                                    <td></td>
                                                    <td>Tidak ada user yang ditugaskan</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
                            <div class="card-header px-3" style="background: #fff;">
                                <h4 class="mt-3">Confirmation email</h4>
                                <p style="font-size: 12px; line-height: 1;">Setiap pemohon menerima pemberitahuan konfirmasi default untuk mengkonfirmasi aplikasi mereka</p>
                            </div>
                            <div class="card-body px-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Use custom auto response</label>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p>Subject</p>
                                    </div>
                                    <div class="col-md">
                                        <input name="subject" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <p>Body</p>
                                    </div>
                                    <div class="col-md">
                                        <textarea name="body" id="" class="form-control" style="min-height: 240px; max-height: 240px"></textarea>
                                        <button type="button" class="btn btn-success mt-4" style="width: 96px">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-process" role="tabpanel" aria-labelledby="pills-process-tab">
                            <div class="card-header px-3" style="background: #fff">
                                <h4 class="mt-3">Process</h4>
                            </div>
                            <div class="card-body px-4">
                                <form action="/update-status" method="post">
                                    @csrf
                                    <table class="table table-borderless">
                                        <tr>
                                            <td style="width: 300px">Screening</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" {{$job_setting->screening == 1 ? 'checked' : ''}} name="screening" type="checkbox" id="flexSwitchCheckDefault" data-job-id="{{ $id }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Psikotest</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" {{$job_setting->psikotest == 1 ? 'checked' : ''}} name="psikotest" type="checkbox" id="flexSwitchCheckDefault" data-job-id="{{ $id }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Interview HR</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" {{$job_setting->interview_hr == 1 ? 'checked' : ''}} name="interview_hr" type="checkbox" id="flexSwitchCheckDefault" data-job-id="{{ $id }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Interview User</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" {{$job_setting->interview_user == 1 ? 'checked' : ''}} name="interview_user" type="checkbox" id="flexSwitchCheckDefault" data-job-id="{{ $id }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hiring</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" {{$job_setting->hiring == 1 ? 'checked' : ''}} name="hiring" type="checkbox" id="flexSwitchCheckDefault" data-job-id="{{ $id }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Peralihan</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" {{$job_setting->psikotest == 1 ? 'checked' : ''}} name="peralihan" type="checkbox" id="flexSwitchCheckDefault" data-job-id="{{ $id }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Medical Check Up</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" {{$job_setting->medical_check_up == 1 ? 'checked' : ''}} name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault" data-job-id="{{ $id }}">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                </form>
                                
                            </div>
                        </div>

                    </div>

                    

                    

                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
        document.querySelectorAll('.form-check-input').forEach(function (checkbox) {
            checkbox.addEventListener('change', function (check) {
                var jobId = checkbox.dataset.jobId; // Assuming you set this data attribute
                var field = checkbox.name;
                var status = checkbox.checked ? 1 : 0;

                fetch('/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({id_job: jobId, field: field, status: status})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Status updated successfully');
                    } else {
                        console.error('Failed to update status');
                    }
                });
            });
        });

</script>