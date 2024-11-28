<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <link href="{{ asset('assets/css/coreui.min.css') }} " rel="stylesheet">
    
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/coreui.bundle.min.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- <title>Dashboard</title> -->

    <style>

        body{
            font-family: 'Poppins';
        }
        
        .toggle-task{
            padding-top: 1px;
            width: 120px;
            height: 25px;
            font-size: 13px;
        }

        .toggle-task-custom {
            background-color: lightgrey !important;
            color: #A7A7A7 !important;
            border: none !important;
        }

        .toggle-task-custom.active {
            background-color: #FFFFFF !important;
            color: #333333 !important;
        }

        .toggle-task-custom:hover {
            background-color: #f0eded !important;
        }

        .check{
            width: 24px;
            height: 24px;
        }

        .form-check-input:checked {
            background-color: #41806D;
            border-color: #41806D;
        }

                    /* width */
                    ::-webkit-scrollbar {
            width: 11px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: lightgrey;
            border-radius: 10px;
            padding: 1px;
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: white; 
            border-radius: 10px;
            border: 3px solid lightgrey;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #8d8e8f; 
        }
        
        .notification-card {
            max-width: 916px;
            height: 154px;
            position: relative;
            background: #41806D;
            border-radius: 8px;

        }

        .greeting {
            max-width: 87px;
            height: 24px;
            margin-left: 33px;
            padding-top: 22px;

            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 150%;
            z-index: 2;
            color: #FFFFFF;


        }

        .message {
            max-width: 457px;
            height: 66px;
            margin-left: 33px;
            margin-top: 30px;
            z-index: 3;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-size: 24px;
            line-height: 138%;

            color: #FFFFFF;


        }

        @media (max-width: 536px){
            .message {
                font-size: 18px;
            }
        }

        .logo{
            font-weight: 600;
            font-size: 32px;
        }

        .hipipe{
            /* Hiring Pipeline */

            max-width: 150px;
            height: 24px;
            left: 20px;
            padding-top: 10px;

            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 150%;
            color: #41806D;
        }

        .card-hipipe{
            max-width: 916px;
            max-height: 500px;
            display: flex;
            background: #FFFFFF;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.06);
            border-radius: 8px;
            border: 0;
        }

        .select-hipipe{
            width: 110px;
            height: 30px;
            border: 0;
            background-color: #dcf7e1;
            font-size: 12px;
            font-weight: 500;
            color: #41806D;
        }
        
        @media (max-width: 768px) {
            .select-hipipe {
                margin-left: 25px;
                max-width: 110px;
                height: 30px;
            }
        }

        @media (max-width: 576px) {
            .select-hipipe {
                margin-left: 25px;
                max-width: 110px;
                height: 30px;
            }
        }
        
        .greeting, .message {
            position: relative; /* Agar teks tidak terpengaruh oleh posisi absolut gambar */
            z-index: 1; /* Pastikan teks berada di atas gambar */
        }

        .jtable {
            border-spacing: 5px; /* Menambahkan jarak antar cell */
            border-collapse: separate;
            width: 830px; /* Atur sesuai kebutuhan */
        }
        
        .jtable td{
            border-radius: 3px;
            font-size: 12px;
            min-width: 64px;
            min-height: 45px;
            max-width: 64px;
            max-height: 45px;
            line-height: 1;
        }
        
        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.05rem rgba(13, 110, 253, 0.25);
        }

        .my-task{
            font-weight: 600;
            font-size: 16px;
            color: #41806D;
        }

        .add-sche{
            width: 141px;
            height: 34px;
            border: 0;
            background: #41806D;
            border-radius: 4px;
            font-size: 12px;
            color: white;
        }

        .y-scroll{
            max-height: 560px;
            overflow-y: scroll;
        }

        .form-control{
            font-size: 12px;
        }

        .callout{
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    
    @include('header')

    <div class="row mx-2 my-2 mb-2">
        <!-- Sebelah kiri -->
        
        <!-- Bagian Halo! -->
        <div class="col-md-1" style="width: 918px;">
            <div class="notification-card mb-2">
                <div class="pattern">
                    <p class="greeting">Hello Nisa!</p>
                    <p class="message">Anda memiliki 2 pelamar baru hari ini<br>Yuk review sekarang!</p>
                    <img draggable="false" style="position: absolute; top: 0; right: 0; border-top-right-radius: 9px; z-index: 0;" src="{{asset('assets/pattern.svg')}}" alt="">
                </div>
            </div>
        

        <!-- Bagian Hiring Pipeline! -->
         
            <div class="card mb-2 card-hipipe">
                <div class="row">
                    <p class="mx-4 my-2 hipipe">Hiring Pipeline</p>
                    <div class="col-md-2 mt-3">
                        <select name="" id="" class="form-select select-hipipe">
                            <option value="">Terbaru</option>
                        </select>
                    </div>
                    <div class="col-md mt-4">
                        <a href="#" style="color: #41806D;" class="float-end me-4">View All Task</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div style="max-width:93%; height: 330px "  class="table-responsive ms-3 mb-3">
                        <table class="table jtable table-borderless mx-6">
                            <thead>
                                <tr style="font-size: 12px; font-weight: 500; color: #646464;">
                                    <td style="min-width: 120px" class="align-middle">Jobs</td>
                                    <td class="text-center align-middle" style="background: #dcf7e1; color: #18554F;">Screening</td>
                                    <td class="text-center align-middle" style="background: #C1E7CD; color: #18554F;">Psikotest</td>
                                    <td class="text-center align-middle" style="background: #A5D0B7; color: #18554F;">Interview HR</td>
                                    <td class="text-center align-middle" style="background: #81B29A; color: #FFFFFF;">Interview User</td>
                                    <td class="text-center align-middle" style="background: #5E9982; color: #FFFFFF;">Peralihan</td>
                                    <td class="text-center align-middle" style="background: #41806D; color: #FFFFFF;">Reject</td>
                                    <td class="text-center align-middle" style="background: #29675B; color: #FFFFFF;">Hiring</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="font-size: 12px; font-weight: 600; color: #646464;">
                                    <td style="height: 40px">
                                        <p class="align-middle" style="font-size: 12px; color: #333333 line-height: 1; margin: 0; margin-bottom: 5px;">Promotor Elektronik</p>
                                        <p class="align-middle" style="font-size: 10px; color: #646464 line-height: 1; margin: 0;">029788/ISH/01010107/2023</p>
                                    </td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">5</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">9</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">6</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">0</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">2</td>
                                </tr>
                                <tr style="font-size: 12px; font-weight: 600; color: #646464;">
                                    <td style="height: 40px">
                                        <p class="align-middle" style="font-size: 12px; color: #333333 line-height: 1; margin: 0; margin-bottom: 5px;">Sales</p>
                                        <p class="align-middle" style="font-size: 10px; color: #646464 line-height: 1; margin: 0;">029788/ISH/01010107/2023</p>
                                    </td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">5</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">9</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">6</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">0</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">2</td>
                                </tr>
                                <tr style="font-size: 12px; font-weight: 600; color: #646464;">
                                    <td style="height: 40px">
                                        <p class="align-middle" style="font-size: 12px; color: #333333 line-height: 1; margin: 0; margin-bottom: 5px;">Digital Marketing</p>
                                        <p class="align-middle" style="font-size: 10px; color: #646464 line-height: 1; margin: 0;">029788/ISH/01010107/2023</p>
                                    </td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">5</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">9</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">6</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">0</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">2</td>
                                </tr>
                                <tr style="font-size: 12px; font-weight: 600; color: #646464;">
                                    <td style="height: 40px">
                                        <p class="align-middle" style="font-size: 12px; color: #333333 line-height: 1; margin: 0; margin-bottom: 5px;">Digital Marketing</p>
                                        <p class="align-middle" style="font-size: 10px; color: #646464 line-height: 1; margin: 0;">029788/ISH/01010107/2023</p>
                                    </td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">5</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">9</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">6</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">0</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">2</td>
                                </tr>
                                <tr style="font-size: 12px; font-weight: 600; color: #646464;">
                                    <td style="height: 40px">
                                        <p class="align-middle" style="font-size: 12px; color: #333333; line-height: 1; margin: 0; margin-bottom: 5px;">Admin Warehouse</p>
                                        <p class="align-middle" style="font-size: 10px; color: #646464; line-height: 1; margin: 0;">029788/ISH/01010107/2023</p>
                                    </td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">5</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">9</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">6</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">0</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">3</td>
                                    <td class="text-center align-middle border" style="font-size: 16px;">2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <!-- Bagian My Task! -->


            <div class="card-hipipe card mt-6">
                <div class="row ms-4">
                    <div class="col-md-3">
                        <p class="me-4 my-4 my-task">My Task</p>
                    </div>

                    <div class="col-md-6 mt-4">
                        <div style="background: lightgrey; max-width: 256px; border-radius: 5px">
                            <ul class="nav nav-pills mb-3 px-1 py-1" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active toggle-task toggle-task-custom" id="pills-task-today-tab" data-bs-toggle="pill" data-bs-target="#pills-task-today" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Today</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link toggle-task toggle-task-custom ms-2" id="pills-task-complete-tab" data-bs-toggle="pill" data-bs-target="#pills-task-complete" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Complete</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md me-6 my-4">
                        <button class="add-sche" type="button" data-bs-toggle="modal" data-bs-target="#addschedule "><i class="bi bi-plus"></i> Add Schedule</button>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="addschedule">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <p class="modal-title">Add Task</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mx-2">
                        <form action="/addtask" method="post">
                            <div class="row mb-2">
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="text" name="ht" id="ht" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="time" name="" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-md-2 mt-1">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="time" name="" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md">
                                    <textarea name="task"  class="form-control" id="" style="min-height: 100px; resize: none;" placeholder="Deskripsi Task"></textarea>
                                </div>
                            </div>
                            <button type="button" style="width: 48%; color: #A7A7A7; background: #E4E4E4;" class="btn me-1" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" style="width: 48%; color: #FFFFFF; background: #41806D;" value="Create" class="btn">
                        </form>
                    </div>
                </div>

                </div>
            </div>
            </div>

        <!-- Bagian isi Task -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-task-today" role="tabpanel" aria-labelledby="pills-task-today" tabindex="0">
                <div class="y-scroll my-3">
                    <div class="me-2">
                        
                        @foreach($tasks as $t)

                        <div class="callout callout-warning" id="callout-{{$t->id_task}}" style="background: #FFFFFF;">
                            <div class="row">
                                <div class="col-md-3" style="padding-right: 0;">
                                    <i class="bi bi-clock ms-2"></i> 
                                    <small class="ms-2">
                                        {{ $t->formatted_jam_awal }} - {{ $t->formatted_jam_akhir }}
                                    </small>
                                    <img class="ms-4" height="20px" src="{{ asset('assets/pemisah.svg') }}" alt="">
                                </div>
                                <div class="col-md-8">
                                    <small>Kamu memiliki jadwal <strong style="color: #8BBB67;">{{$t->job}}</strong> untuk posisi <strong><i>{{$t->posisi}}</i></strong></small>
                                </div>
                                <div class="col-md">
                                    <input type="checkbox" name="" class="form-check-input check" id="">
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-task-complete" role="tabpanel" aria-labelledby="pills-task-complete" tabindex="0">
                <div class="y-scroll my-3 pe-2" id="list-task-complete">
                    <div class="card card-hipipe my-2" id="empty-task-message">
                        <div class="card-body">
                            Task Kosong
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            
        </div>


        <!-- Sebelah Kanan -->

        <!-- Bagian Total! -->

         <div class="col-md">
            <div class="card card-hipipe mb-2" style="max-width: 900px;">
                <div class="row">
                    <div class="col-md mt-2 mx-2">
                        <table style="max-width: 400px; height: 10px; border-spacing: 0px" class="table table-borderless mt-2 ms-2">
                            <tr>
                                <td style="width: 30px;">
                                    <img draggable="false" src="{{ asset('assets/workers.svg') }}" alt="">
                                </td>
                                <td style="width: 140px">
                                    <p style="font-size: 12px; color: #646464; font-weight: 400; line-height: 1; margin: 0; margin-bottom: 5px;">Total Pelamar</p>
                                    <p style="font-size: 25px; color: #41806D; font-weight: 600; line-height: 1; margin: 0;">300</p>
                                </td>
                                <td>
                                    <img draggable="false" height="50px" src="{{ asset('assets/pemisah_panjang.svg') }}" alt="">
                                </td>
                                <td style="width: 30px">
                                    <img draggable="false" src="{{ asset('assets/hiring.svg') }}" alt="">
                                </td>
                                <td style="width: 200px">
                                    <p style="font-size: 12px; color: #646464; font-weight: 400; line-height: 1; margin: 0; margin-bottom: 5px;">Total Process Hiring</p>
                                    <p style="font-size: 25px; color: #41806D; font-weight: 600; line-height: 1; margin: 0;">6</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        <!-- Bagian Job Summary -->

            <div class="card card-hipipe" style="max-width: 900px;">
                <div class="card-heading">
                    <div class="row">
                        <div class="col-md-6 me-4 mt-2">
                            <p class="mx-3 my-3 my-task">Job Summary</p>
                        </div>
                        <div class="col-md-4 mt-3">
                            <select name="" id="" class="form-select select-hipipe">
                                <option value="">Week</option>
                                <option value="">Week</option>
                                <option value="">Week</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body">
                    <div style="width: 300px; height: 300px;" class="ms-3">
                        <canvas id="jobsSummaryChart"></canvas>
                    </div>
                </div>
            </div>

        <!-- Bagian Recruitment Proccess -->

            <div class="card mt-3" style="border:0; border-radius: 8px; max-width: 900px">
                <div class="card-heading" style="background: #DCF7E1; border-radius: 8px 8px 0px 0px;">
                    <table class="table-borderless mx-4 align-middle my-3">
                        <tr>
                            <th style="width: 60px">#</th>
                            <th style="width: 6cm">Recruitment Process</th>
                            <th style="width: 2cm">Total</th>
                        </tr>
                    </table>
                </div>
                <div class="card-heading">
                    <table class="table-borderless mx-4 align-middle mt-3">
                        <tr>
                            <th style="width: 60px">1</th>
                            <th style="width: 6cm">Psikotest</th>
                            <th style="width: 2cm"><span style="height: 27px; width: 47px" class="badge bg-warning align-middle"><p class="mt-1">199</p></span></th>
                        </tr>
                    </table>
                    <hr>
                </div>
                <div class="card-heading">
                    <table class="table-bordeless align-middle">
                        <tr>
                            <td style="width: 2.1cm"></td>
                            <td style="width: 5.3cm">On Process</td>
                            <td class="text-center" style="width: 2cm"><p style="color: blue">1</p></td>
                        </tr>
                        <tr>
                            <td style="width: 2.1cm"></td>
                            <td style="width: 5.3cm">Pass</td>
                            <td class="text-center" style="width: 2cm"><p style="color: green">197</p></td>
                        </tr>
                        <tr>
                            <td style="width: 2.1cm"></td>
                            <td style="width: 5.3cm">Fail</td>
                            <td class="text-center" style="width: 2cm"><p style="color: red">1</p></td>
                        </tr>
                    </table>
                </div>

                <div class="card-heading">
                    <hr>
                    <table class="table-borderless mx-4 align-middle mt-3">
                        <tr>
                            <th style="width: 60px">2</th>
                            <th style="width: 6cm">Interview HR</th>
                            <th style="width: 2cm"><span style="height: 27px; width: 47px" class="badge bg-success align-middle"><p class="mt-1">197</p></span></th>
                        </tr>
                    </table>
                    <hr>
                </div>
                <div class="card-heading">
                    <table class="table-bordeless align-middle">
                        <tr>
                            <td style="width: 2.1cm"></td>
                            <td style="width: 5.3cm">On Process</td>
                            <td class="text-center" style="width: 2cm"><p style="color: blue">0</p></td>
                        </tr>
                        <tr>
                            <td style="width: 2.1cm"></td>
                            <td style="width: 5.3cm">Pass</td>
                            <td class="text-center" style="width: 2cm"><p style="color: green">197</p></td>
                        </tr>
                        <tr>
                            <td style="width: 2.1cm"></td>
                            <td style="width: 5.3cm">Fail</td>
                            <td class="text-center" style="width: 2cm"><p style="color: red">1</p></td>
                        </tr>
                    </table>
                </div>
                <div class="card-heading">
                    <hr>
                    <table class="table-borderless mx-4 align-middle mt-3">
                        <tr>
                            <th style="width: 60px">3</th>
                            <th style="width: 6cm">Interview User</th>
                            <th style="width: 2cm"><span style="height: 27px; width: 47px" class="badge bg-danger align-middle"><p class="mt-1">201</p></span></th>
                        </tr>
                    </table>
                    <hr>
                </div>
                <div class="card-heading">
                    <table class="table-bordeless align-middle">
                        <tr>
                            <td style="width: 2.1cm"></td>
                            <td style="width: 5.3cm">On Process</td>
                            <td class="text-center" style="width: 2cm"><p style="color: blue">10</p></td>
                        </tr>
                        <tr>
                            <td style="width: 2.1cm"></td>
                            <td style="width: 5.3cm">Pass</td>
                            <td class="text-center" style="width: 2cm"><p style="color: green">191</p></td>
                        </tr>
                        <tr>
                            <td style="width: 2.1cm"></td>
                            <td style="width: 5.3cm">Fail</td>
                            <td class="text-center" style="width: 2cm"><p style="color: red">1</p></td>
                        </tr>
                    </table>
                </div>
            </div>

            

         </div>
    </div>
    
</body>
</html>

<script>
    // Custom plugin to draw text in the center of the doughnut chart
    const centerTextPlugin = {
        id: 'centerText',
        beforeDraw: function(chart) {
            const width = chart.width,
                height = chart.height,
                ctx = chart.ctx;
            ctx.restore();

            // Draw the number
            ctx.font = "30px Poppins";
            ctx.fillStyle = "#41806D";
            ctx.textBaseline = "middle";
            const text1 = "39",
                textX1 = Math.round((width - ctx.measureText(text1).width) / 3.38),
                textY1 = height / 2 - 10;
            ctx.fillText(text1, textX1, textY1);

            // Draw the "Total Jobs" text
            ctx.font = "12px Poppins";
            ctx.fillStyle = "#646464";
            const text2 = "Total Jobs",
                textX2 = Math.round((width - ctx.measureText(text2).width) / 3.7),
                textY2 = height / 2 + 20;
            ctx.fillText(text2, textX2, textY2);

            ctx.save();
        }
    };

    Chart.register(centerTextPlugin);

    var ctx = document.getElementById('jobsSummaryChart').getContext('2d');
    var jobsSummaryChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Published', 'Internal', 'Closed', 'Drafted'],
            datasets: [{
                data: [17, 2, 14, 6],
                backgroundColor: ['#81B29A', '#f2e086', '#ea8e63', '#d3d3d3'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        generateLabels: function(chart) {
                            var data = chart.data;
                            return data.labels.map(function(label, i) {
                                return {
                                    text: `${label}: ${data.datasets[0].data[i]}`,
                                    fillStyle: data.datasets[0].backgroundColor[i],
                                    strokeStyle: data.datasets[0].backgroundColor[i],
                                    lineWidth: 1,
                                    pointStyle: 'rectRounded',
                                    hidden: isNaN(data.datasets[0].data[i]) || chart.getDatasetMeta(0).data[i].hidden,
                                    index: i
                                };
                            });
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed;
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });

    $(document).ready(function(){
        $('#ht').datepicker({
            todayHighlight: true,
            orientation: "bottom left",
            format: "dddd, dd mmmm yyyy",
            container: ".bdc"
        });
    });

    $(document).ready(function(){
            function toggleEmptyTaskMessage() {
                if ($('#list-task-complete .callout').length === 0) {
                    $('#empty-task-message').show();
                } else {
                    $('#empty-task-message').hide();
                }
            }

            $('body').on('change', '.check', function() {
                var calloutId = $(this).closest('.callout').attr('id');
                
                if ($(this).is(':checked')) {
                    var calloutClone = $(this).closest('.callout').clone();
                    calloutClone.find('.check').prop('checked', true);
                    calloutClone.attr('id', calloutId + '-complete');
                    $('#list-task-complete').append(calloutClone);
                } else {
                    $('#list-task-complete').find('#' + calloutId + '-complete').remove();
                }

                toggleEmptyTaskMessage();
            });

            $('body').on('change', '#list-task-complete .check', function() {
                var originalCalloutId = $(this).closest('.callout').attr('id').replace('-complete', '');
                $('#pills-task-today').find('#' + originalCalloutId + ' .check').prop('checked', false);
                $(this).closest('.callout').remove();

                toggleEmptyTaskMessage();
            });

            toggleEmptyTaskMessage(); // Initial check on page load
        });
</script>
