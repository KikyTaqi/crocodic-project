<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <style>
            @font-face {
                font-family: 'Poppins';
                src: 
                    url("{{asset('assets/font/Poppins/Poppins-Regular.ttf')}}") format('truetype'),
                    url("{{asset('assets/font/Poppins/Poppins-Medium.ttf')}}") format('truetype'),
                    url("{{asset('assets/font/Poppins/Poppins-SemiBold.ttf')}}") format('truetype'),
                    url("{{asset('assets/font/Poppins/Poppins-Bold.ttf')}}") format('truetype'),
                    url("{{asset('assets/font/Poppins/Poppins-ExtraBold.ttf')}}") format('truetype');
                font-weight: 400;
            }
            body {
                font-family: 'Poppins', sans-serif;
                font-weight: 500 !important;
                background: #F5F5F5;
            }

            body::-webkit-scrollbar{
                display: none;
            }

            .gi {
                display: inline-block; /* Agar ikon dapat ditata secara inline */
                width: 24px; /* Sesuaikan lebar ikon */
                height: 24px; /* Sesuaikan tinggi ikon */
                vertical-align: middle; /* Menyelaraskan ikon dengan teks di tengah */
                margin-right: 3px; /* Spasi antara ikon dan teks */
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
            }


            .gi-pencil{
                background-image: url('/assets/edit.svg');
            }

            .gj-color-green{
                background: #41806D;
                color: #ffffff;
            }

            .gj-color-green:hover{
                background: #41806D;
                color: #ffffff;
            }

            .pil{
                min-width: 80px;
                height: 45px;
            }

            .toggle-task-custom {
                background-color: #FFFFFF !important;
                color: #333333 !important;
                border: 1px solid #D5D5D5 !important;
                border-radius: 6px !important;
            }

            .toggle-task-custom.active#pills-screening-tab {
                background-color: #89A7E040 !important;
                color: #333333 !important;
                border: 1px solid #2E5AAC !important;
            }

            
            .toggle-task-custom.active#pills-psikotest-tab {
                background-color: #FFF0CD !important;
                color: #333333 !important;
                border: 1px solid #FFB800 !important;
            }

            
            .toggle-task-custom.active#pills-interview-hr-tab {
                background-color: #E2F5D3 !important;
                color: #333333 !important;
                border: 1px solid #8BBB67 !important;
            }

            
            .toggle-task-custom.active#pills-interview-user-tab {
                background-color: #FFD8D9 !important;
                color: #333333 !important;
                border: 1px solid #F94144 !important;
            }

            
            .toggle-task-custom.active#pills-peralihan-tab {
                background-color: #FFD8BC !important;
                color: #333333 !important;
                border: 1px solid #FA6900 !important;
            }

            
            .toggle-task-custom.active#pills-reject-tab {
                background-color: #DCDCDC !important;
                color: #333333 !important;
                border: 1px solid #DCDCDC !important;
            }

            
            .toggle-task-custom.active#pills-hiring-tab {
                background-color: #E1AED799 !important;
                color: #333333 !important;
                border: 1px solid #85016B !important;
            }

            .btn-green {
                background-color: #DCF7E1 !important;
                color: #41806D !important;
            }

            

            .toggle-task-custom:hover {
                background-color: #f0eded !important;
            }


            .custom-table th {
                padding: 10px;
            }

            .custom-table th.sort-asc::after {
                content: '▲';
                margin-left: 10%;
                opacity: 0.4;
            }

            .custom-table th.sort-desc::after {
                content: '▼';
                margin-left: 10%;
                opacity: 0.4;
            }


            .pagination {
                display: flex;
                margin-top: 20px;
            }

            .pagination li {
                cursor: pointer;
                padding: 8px 16px;
                border: 1px solid #ddd;
                margin: 0 4px;
                height: 40px;
                min-width: 40px;
                font-size: 12px;
                padding-top: 10px;
                border-radius: 5px;
                display: flex;
                justify-content: center;
                align-items: center;
                user-select: none;
                background-color: #FFFFFF;
            }

            .pagination li:hover {
                color: #41806D;
                border: 1px solid #41806D;
            }

            .pagination li.active {
                background-color: #41806D;
                color: white;
                border: 1px solid #007bff;
            }

            .pagination li.disabled {
                pointer-events: none;
                opacity: 0.5;
            }

            .btn-check:focus + .btn-success, .btn-success:focus {
                color: #fff;
                box-shadow: 0 0 0 0rem rgba(60, 153, 110, 0);
            }

            .col-md-custom {
                flex: 0 0 auto;
                width: 33%;
            }

            .col-md-button{
                flex: 0 0 auto;
                width: 13%;
            }

            .col-md-button-medium{
                flex: 0 0 auto;
                width: 21%;
            }

            .filter-text{
                font-size: 12px;
            }

            .dot-red {
                height: 20px;
                width: 20px;
                background-color: #B74254;
                border-radius: 50%;
                display: inline-block;
            }

            .dot-green {
                height: 20px;
                width: 20px;
                background-color: #38B758;
                border-radius: 50%;
                display: inline-block;
            }
            .table-candidates thead tr *{
                color: #333333;
            }
            .p-approval{
                width: fit-content;
                height: 24px;
                border: 1px solid #9EB5A2;
                color: #41806D;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 600;
            }
            .p-waiting{
                width: fit-content;
                height: 24px;
                border: 1px solid #F7BD93;
                color: #FA6900;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 600;
            }
            .p-fail{
                width: fit-content;
                height: 24px;
                border: 1px solid #F7BFC0;
                color: #F94144;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 600;
            }
            .p-cancel_join{
                width: fit-content;
                height: 24px;
                border: 1px solid #C893BE;
                color: #85016B;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 600;
            }
            .p-resign{
                width: fit-content;
                height: 24px;
                border: 1px solid #81B29A;
                color: #41806D;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 600;
            }
            .p-done{
                width: fit-content;
                height: 24px;
                border: 1px solid #F9DB93;
                color: #FFB800;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 600;
            }
            .p-on_process{
                width: fit-content;
                height: 24px;
                border: 1px solid #89A7E0;
                color: #2E5AAC;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 600;
            }
            .p-reject{
                width: fit-content;
                height: 24px;
                border: 1px solid #F7BFC0;
                color: #F94144;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 600;
            }
            .p-on_process_hire{
                color: white;
                width: fit-content;
                height: 24px;
                background-color: #3469CA;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 500;
            }
            .p-done_hire{
                color: white;
                width: fit-content;
                height: 24px;
                background-color: #41806D;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 500;
            }
            .p-waiting_schedule_hire{
                color: white;
                width: fit-content;
                height: 24px;
                background-color: #00C2FF;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 500;
            }
            .p-reject_hire{
                color: white;
                width: fit-content;
                height: 24px;
                background-color: #B74254;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 500;
            }
            .p-waiting_approval_hire{
                color: white;
                width: fit-content;
                height: 24px;
                background-color: #FFA800;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 500;
            }
            .p-pass_hire{
                color: white;
                width: fit-content;
                height: 24px;
                background-color: #41806D;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 500;
            }
            .p-failed_hire{
                color: white;
                width: fit-content;
                height: 24px;
                background-color: #B74254;
                font-size: 8px;
                padding: 5px 10px 5px 10px;
                text-transform: uppercase;
                border-radius: 2px;
                font-weight: 500;
            }
            .tag-0{
                border-radius: 50%;
                width: 18px;
                height: 18px;
                background-color: #B74254;
            }
            .tag-1{
                border-radius: 50%;
                width: 18px;
                height: 18px;
                background-color: #38B758;
            }
            .tag-2{
                border-radius: 50%;
                width: 18px;
                height: 18px;
                background-color: #B1B1B1;
            }
            .tag-3{
                border-radius: 50%;
                width: 18px;
                height: 18px;
                background-color: #c4a600;
            }
            .pagination{
                justify-content: flex-end;
            }
            .pagination .page-item{
                width: 25px !important;
                height: 25px !important;
                padding: 0 !important;
                margin: 0 !important;
                text-align: center;
                border: none !important;
                vertical-align: middle;
                background-color: transparent !important;
            }
            .pagination .page-item.active span{
                background-color: #41806D !important;
                border: 1px solid #41806D !important;
            }
            .pagination .page-item *{
                width: 27px !important;
                height: 27px !important;
                color: #333333;
                border-radius: 3px !important;
                margin: 0;
                padding: 5px 0 0 0;
            }
            .pagination .page-item:first-child,
            .pagination .page-item:last-child{
                width: fit-content !important;
            }
            .pagination .page-item:first-child span,
            .pagination .page-item:first-child a{
                width: 83px !important;
            }
            .pagination .page-item:first-child span::after,
            .pagination .page-item:first-child a::after{
                width: fit-content !important;
                content: '  Previous';
            }

            .pagination .page-item:last-child span,
            .pagination .page-item:last-child a{
                width: 63px !important;
            }
            .pagination .page-item:last-child span::before,
            .pagination .page-item:last-child a::before{
                width: fit-content !important;
                content: 'Next  ';
            }

            .pagination .page-item:first-child:not(.disabled) a,
            .pagination .page-item:last-child:not(.disabled) a{
                background-color: #41806D !important;
                border: 1px solid #41806D !important;
                color: white;
            }
            .sidebar-move{
                width: 634px;
                height: 860px;
            }
            .title-move{
                font-size: 16px;
                font-weight: 600;
            }
            .title-grey{
                color: #646464;
                font-size: 16px;
                font-weight: 500;
            }
            .sidebar-move .offcanvas-header{
                height: 80px;
                padding-left: 35px;
            }
            .input-move{
                height: 45px;
                font-size: 14px;
                padding-left: 20px;
            }
            .input-move:focus{
                outline: none;
                border: 1.5px solid #5E9982;
            }
            .row-data{
                margin-top: 10px;
                border-radius: 4px;
                padding: 10px;
                box-shadow: 1px 4px 24px 3px rgba(26, 26, 26,0.15);
                -webkit-box-shadow: 1px 4px 24px 3px rgba(26, 26, 26,0.15);
                -moz-box-shadow: 1px 4px 24px 3px rgba(26, 26, 26,0.15);
            }
            .row-data .data{
                padding: 8px 10px 8px 10px;
            }
            .row-data .data:hover{
                background-color: #DCF7E1;
                border-radius: 5px;
            }
            .data-loc{
                font-size: 12px;
                color: #646464;
                margin-bottom: 0;
            }
            .s-draft{
                width: 80px;
                height: 26px;
                text-align: center;
                background-color: #E4E4E4;
                border-radius: 2px;
                font-size: 12px;
                font-weight: 500;
                color: #A7A7A7;
                padding-top: 4px;
            }
            .s-published{
                width: 95px;
                height: 26px;
                text-align: center;
                background-color: #41806D;
                border-radius: 2px;
                font-size: 12px;
                font-weight: 500;
                color: #fff;
                padding-top: 4px;
            }
            .s-internal{
                width: 82px;
                height: 26px;
                text-align: center;
                background-color: #F2CC8F;
                border-radius: 2px;
                font-size: 12px;
                font-weight: 500;
                color: #fff;
                padding-top: 4px;
            }
            .data-name{
                margin: 0;
                font-size: 14px;
                font-weight: 600;
                color: #333333;
            }
        </style>
</head>
<body>
    @include('header')
    <div class="offcanvas offcanvas-end sidebar-move" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="border-bottom: 1px solid #E7E7ED;">
            <h5 class="title-move my-auto">Pindahkan pelamar ke pekerjaan lain</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="padding: 30px;">
            <p class="title-grey">Pilih Job</p>
            <input type="text" class="form-control input-move" id="searchInput-11" onkeyup="searchFunctionJobs()" placeholder="Cari Pekerjaan">

            <div class="row-data" id="tableJobs">
                @foreach($jobs as $j)
                <div class="data">
                    <table class="data-table">
                        <tr>
                            <td><p class="data-name">{{$j->nama_job}}</p></td>
                            <td class="my-auto text-end w-100" rowspan="2">
                                @if($j->status == 0)
                                    <!-- Draft -->
                                    <div class="s-draft ms-auto">Drafted</div>
                                @elseif($j->status == 1)
                                    <!-- Published -->
                                    <div class="s-published ms-auto">Published</div>
                                @elseif($j->status == 2)
                                    <!-- Internal -->
                                    <div class="s-internal ms-auto">Internal</div>
                                @elseif($j->status == 3)
                                    <!-- External -->
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><p class="data-loc" style="width: max-content;">{{$j->lokasi}} - {{$j->nomor_job}}</p></td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="mx-4 my-3">
        <div class="row my-3">
            <div class="col-md text-end" style="font-size: 15px">
                <button class="ms-2 btn btn-light" style="border: solid 1px #E7E7ED;font-weight: 600 !important;color: #646464;"><img src="{{asset('assets/3-dots.svg')}}" alt=""> Filter</button>
                <button class="ms-2 btn gj-color-green" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span class="badge bg-light text-dark">4</span> Move</button>
                <button class="ms-2 btn btn-danger"><span class="badge bg-light text-dark">4</span> Delete</button>
                <button class="ms-2 btn btn-secondary"> View</button>
            </div>
        </div>

        <div class="table-responsive">
        <table id="tableCandidates" data-sortable class="table table-bordered custom-table table-candidates" style="background: #fff; font-weight: 500; font-size: 14px">
            <thead class="align-middle">
                <tr >
                    <th class="text-center" style="width: 48px; height: 48px"><input type="checkbox" name="" id=""></th>
                    <th style="width: 170px">Nama</th>
                    <th style="width: 120px">Process</th>
                    <th>Tags</th>
                    <th data-sort class="sort-asc">Domisili</th>
                    <th data-sort class="sort-asc">Gender</th>
                    <th>Usia</th>
                    <th>Pendidikan</th>
                    <th>Layanan</th>
                    <th>Jabatan</th>
                    <th>Minat</th>
                </tr>
                <tr id="search-col">
                    <td></td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="width:160px;padding-left:30px;font-size:12px" name="" id="searchInput-1" onkeyup="searchFunction('1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-2" onkeyup="searchFunction('2')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-3" onkeyup="searchFunction('3')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-4" onkeyup="searchFunction('4')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-5" onkeyup="searchFunction('5')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-6" onkeyup="searchFunction('6')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-7" onkeyup="searchFunction('7')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-8" onkeyup="searchFunction('8')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-9" onkeyup="searchFunction('9')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-10" onkeyup="searchFunction('10')">
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody id="screeningTD" class="align-middle">
                @foreach($candidates as $c)
                <tr>
                    <td class="text-center" style="width: 48px; height: 48px"><input type="checkbox" name="" id=""></td>
                    <td style="font-weight: 500;">
                        {{$c->nama}}
                    </td>
                    <td class="">
                        <div  class="mx-auto text-center" style="">
                            <!-- Non Hire -->
                            @if($c->process == 'approval')
                            <span class="p-{{$c->process}}">approval</span>
                            @elseif($c->process == 'waiting')
                            <span class="p-{{$c->process}}">waiting</span>
                            @elseif($c->process == 'fail')
                            <span class="p-{{$c->process}}">fail</span>
                            @elseif($c->process == 'cancel_join')
                            <span class="p-{{$c->process}}">cancel join</span>
                            @elseif($c->process == 'resign')
                            <span class="p-{{$c->process}}">resign</span>
                            @elseif($c->process == 'done')
                            <span class="p-{{$c->process}}">done</span>
                            @elseif($c->process == 'on_process')
                            <span class="p-{{$c->process}}">on process</span>
                            @elseif($c->process == 'reject')
                            <span class="p-{{$c->process}}">reject</span>

                            <!-- Hire -->
                            @elseif($c->process == 'on_process_hire')
                            <span class="p-{{$c->process}}">on process</span>
                            @elseif($c->process == 'waiting_schedule_hire')
                            <span class="p-{{$c->process}}">waiting schedule</span>
                            @elseif($c->process == 'reject_hire')
                            <span class="p-{{$c->process}}">reject</span>
                            @elseif($c->process == 'done_hire')
                            <span class="p-{{$c->process}}">done</span>
                            @elseif($c->process == 'pass_hire')
                            <span class="p-{{$c->process}}">pass</span>
                            @elseif($c->process == 'failed_hire')
                            <span class="p-{{$c->process}}">failed</span>
                            @elseif($c->process == 'waiting_approval_hire')
                            <span class="p-{{$c->process}}">waiting approval</span>
                            @endif
                        </div>
                    </td>
                    <td class="text-center align-middle" searchValue="@if($c->tags == 1) lanjut @elseif($c->tags == 2) blacklist @elseif($c->tags == 0) stop @endif">
                        @if($c->tags == 0)
                        <div class="tag-{{$c->tags}} mx-auto"></div>
                        @elseif($c->tags == 1)
                        <div class="tag-{{$c->tags}} mx-auto"></div>
                        @elseif($c->tags == 2)
                        <div class="tag-{{$c->tags}} mx-auto"></div>
                        @else
                        <div class="tag-3 mx-auto" search="??"></div>
                        @endif
                    </td>
                    <td>{{$c->domisili}}</td>
                    <td>
                        @if($c->gender == 1)
                        Laki-laki
                        @else
                        Perempuan
                        @endif
                    </td>
                    <td>{{$c->usia}}</td>
                    <td>{{$c->pendidikan}}</td>
                    <td>{{$c->layanan}}</td>
                    <td>{{$c->jabatan}}</td>
                    <td>{{$c->minat}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $candidates->links() }}
    </div>
    </div>

    <script>
        function searchFunction(col) {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput-"+col);
            filter = input.value.toUpperCase();
            table = document.getElementById("tableCandidates");
            tr = table.getElementsByTagName("tr");
            for (i = 2; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[col];
                if (td) {
                txtValue = td.getAttribute('searchValue') || td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
        }
        function searchFunctionJobs() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput-11");
            filter = input.value.toUpperCase();
            table = document.getElementById("tableJobs");
            tr = table.getElementsByClassName("data");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
        }
    </script>
    
</body>
</html>