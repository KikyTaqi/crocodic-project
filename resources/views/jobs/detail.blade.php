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
    <title>Detail</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            background: #F5F5F5;
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
    </style>
</head>
<body>
    @include('header')

    <div class="card card-hipipe px-4" style="max-width: 100%">
        <div class="row mt-4 mb-3 gx-1">
            <div class="col-md-custom" style="font-size: 20px; font-weight: 500; margin-right: 2%;">
                <table class="table table-borderless">
                    <tr>
                        <td style="width: 5%;">
                            <a href="/jobs"><i class="bi bi-chevron-left"></i></a>
                        </td>
                        <td>
                            <p style="margin-bottom: 1px">{{$job->nama_job}}</p>
                            <table class="table table-borderless" style="font-size: 12px; font-weight: 400; margin-bottom: 0;">
                                <tr>
                                    <td style="padding-right: 0;">
                                        <p>{{$job->nomor_job}}</p>
                                    </td>
                                    <td style="padding-left: 0; padding-right: 0;">
                                        <p><i class="bi bi-geo-alt-fill"></i> {{$job->lokasi}}</p>
                                    </td>
                                    <td style="padding-left: 0;">
                                        <p><i class="bi bi-person"></i> {{$job->total_butuh}} Applicants</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md mt-2">
                <div class="row mt-4 gx-2">
                    <div class="col-md-button-medium mb-2">
                        <a style="font-size: 16px; font-weight: 500; min-width: 100%" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-light"><i class="bi bi-plus"></i> Add Candidate</a>
                    </div>
                    <div class="col-md-button-medium mb-2" style="max-width: 140px">
                        <a style="font-size: 16px; font-weight: 500; min-width: 100%" href="/jobs/activity/{{$job->id_job}}" class="btn btn-light"><i class="bi bi-bar-chart-fill"></i> Activity</a>
                    </div>
                    <div class="col-md-button mb-2">
                        <a style="font-size: 16px; font-weight: 500; min-width: 100%" href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#sharemodal"><i class="bi bi-share-fill"></i> Share</a>
                    </div>
                    <div class="col-md-button mb-2">
                        <a style="font-size: 16px; font-weight: 500; min-width: 100%" href="/jobs/edit/{{$job->id_job}}" class="btn btn-light"><i class="bi bi-pencil"></i> Edit</a>
                    </div>
                    <div class="col-md-button mb-2">
                        <div class="dropdown">
                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 16px; font-weight: 500; min-width: 100%" class="btn btn-light"><i class="bi bi-funnel-fill"></i> Filter</button>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Tags</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Domisili</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Gender</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Pendidikan</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Layanan</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Jabatan</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Minat</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Apply Date</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Source</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p class="ms-3 filter-text">Rating</p>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" checked name="medical_check_up" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 mb-2">
                        <div class="dropdown btn-group">
                            <a onclick="btnPublish({{ $job->id_job }}); return false;" type="button" style="font-size: 14px; font-weight: 500; width: 100%; border-right: solid 1px #41806D !important; " href="#" class="btn btn-green"><i class="bi bi-check"></i> Publish</a>
                            <button type="button" style="border-left: solid 1px #41806D !important;" data-bs-toggle="dropdown" class="btn btn-green dropdown-toggle"></button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a onclick="btnDraft({{ $job->id_job }}); return false;" class="dropdown-item" href="#">Draft</a></li>
                                <li><a onclick="btnInternal({{ $job->id_job }}); return false;" class="dropdown-item" href="#">Internal</a></li>
                                <li><a onclick="btnExternal({{ $job->id_job }}); return false;" class="dropdown-item" href="#">External</a></li>
                            </ul>
                        </div>

                        <form id="publishForm" method="POST" action="/jobs/addStatus">
                            <!-- Pastikan untuk menambahkan token CSRF jika menggunakan Laravel atau framework lain -->
                            @csrf
                            <input type="hidden" name="id_job" id="publishJobId">
                            <input type="hidden" name="status" value="1" id="publishStatus">
                        </form>

                        <form id="draftForm" method="POST" action="/jobs/addStatus">
                            <!-- Pastikan untuk menambahkan token CSRF jika menggunakan Laravel atau framework lain -->
                            @csrf
                            <input type="hidden" name="id_job" id="draftJobId">
                            <input type="hidden" name="status" value="0" id="draftStatus">
                        </form>

                        <form id="internalForm" method="POST" action="/jobs/addStatus">
                            <!-- Pastikan untuk menambahkan token CSRF jika menggunakan Laravel atau framework lain -->
                            @csrf
                            <input type="hidden" name="id_job" id="internalJobId">
                            <input type="hidden" name="status" value="2" id="internalStatus">
                        </form>

                        <form id="externalForm" method="POST" action="/jobs/addStatus">
                            <!-- Pastikan untuk menambahkan token CSRF jika menggunakan Laravel atau framework lain -->
                            @csrf
                            <input type="hidden" name="id_job" id="externalJobId">
                            <input type="hidden" name="status" value="3" id="externalStatus">
                        </form>



                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- share modal -->

    <div class="modal fade" id="sharemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Share Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="linkJob" readonly value="http://127.0.0.1:8000/jobs/detail/{{$job->id_job}}">
                    <button class="btn btn-outline-secondary"onclick="copyInput()" type="button" id="button-addon2"><i class="bi bi-clipboard"></i></button>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Add Candidate -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">All Candidate</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="background: #F5F5F5;">
            <form action="{{ route('updateCandidateJobs') }}" method="post">
                @csrf
                <input type="hidden" name="id_job" value="{{$job->id_job}}">
                <div class="table-responsive">
                    <div class="position-absolute top-1 end-0 me-3">
                        <div class="input-group">
                            <span class="input-group-text btn-success" style="padding: 0;">
                                <span id="checkedCountBadge" class="badge bg-light text-dark" style="margin-left: 5px">0</span>
                            </span>
                            <input type="submit" class="btn btn-success" value="Add Candidate">
                        </div>
                    </div>
                    <table id="TableAdd" data-sortable class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px; margin-top: 50px">
                        <thead class="align-middle">
                            <tr>
                                <th class="text-center" style="height: 48px; padding-left: 10px">
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </div>
                                </th>
                                <th style="width: 100px">Nama</th>
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
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box" >
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="canditateTD" class="align-middle">
    
                            @foreach($candidate as $cdt)
    
                            <tr>
                                <td class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input {{$cdt->id_job == $job->id_job ? 'disabled' : '' }} type="checkbox" class="candidate-checkbox form-check-input" name="candidates[]" value="{{$cdt->id_candidate}}" id="">
                                    </div>
                                </td>
                                <td>{{$cdt->nama}}</td>
                                <td>
                                    @if($cdt->process == 'approval')
                                        <div  class="mx-auto text-center" style="width: 74px; height: 24px; border: 1px solid #9EB5A2; color: #41806D; font-size: 12px; line-height: 24px;">
                                            APPROVAL
                                        </div>
                                    @elseif($cdt->process == 'waiting')
                                        <div  class="mx-auto text-center" style="width: 66px; height: 24px; border: 1px solid #F7BD93; color: #FA6900; font-size: 12px; line-height: 24px;">
                                            WAITING
                                        </div>
                                    @elseif($cdt->process == 'fail')
                                        <div  class="mx-auto text-center" style="width: 40px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            FAIL
                                        </div>
                                    @elseif($cdt->process == 'cancel_join')
                                        <div  class="mx-auto text-center" style="width: 95px; height: 24px; border: 1px solid #C893BE; color: #85016B; font-size: 12px; line-height: 24px;">
                                            CANCEL JOIN
                                        </div>
                                    @elseif($cdt->process == 'resign')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #81B29A; color: #41806D; font-size: 12px; line-height: 24px;">
                                            RESIGN
                                        </div>
                                    @elseif($cdt->process == 'done')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F9DB93; color: #FFB800; font-size: 12px; line-height: 24px;">
                                            DONE
                                        </div>
                                    @elseif($cdt->process == 'on_process')
                                        <div  class="mx-auto text-center" style="width: 85px; height: 24px; border: 1px solid #89A7E0; color: #2E5AAC; font-size: 12px; line-height: 24px;">
                                            ON PROCESS
                                        </div>
                                    @elseif($cdt->process == 'reject')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            REJECT
                                        </div>
                                    @else
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                                            HIRING
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($cdt->tags == 0)
                                        <span class="dot-red"></span>
                                    @else
                                        <span class="dot-green"></span>
                                    @endif
                                </td>
                                <td>{{$cdt->domisili}}</td>
                                <td>
                                    @if($cdt->gender == 0)
                                        Perempuan
                                    @else
                                        Laki-laki
                                    @endif
                                </td>
                                <td>{{$cdt->usia}}</td>
                                <td>{{$cdt->pendidikan}}</td>
                                <td>{{$cdt->layanan}}</td>
                                <td>{{$cdt->jabatan}}</td>
                                <td>{{$cdt->minat}}</td>
                            </tr>
    
                            @endforeach
    
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="data-info">Menampilkan <span id="startRow">1</span>-<span id="endRow">5</span> dari {{ $candidate->count() }} item.</div>
                        <ul class="pagination float-end"></ul>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>


        




    <div class="px-4 py-4">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="font-size: 15px;">
        <li class="me-2 mb-2">
            <div class="form-group">
                <i class="bi bi-search mt-2 icon-1 position-absolute text-secondary ms-2" style="padding-left: 3px; padding-top: 3px"></i>
                <input type="text" id="searchBox" class="form-control" style="min-width: 330px; height: 45px; border-radius: 10px; padding-left:30px;font-size:12px" name="" placeholder="Search applicants" id="search-1" onkeyup="searchFunction('search-1')">
            </div>
        </li>
        <li class="nav-item me-2 mb-2" role="presentation">
            <button class="pil nav-link active toggle-task-custom" id="pills-screening-tab" data-bs-toggle="pill" data-bs-target="#pills-screening" type="button" role="tab" aria-controls="pills-screening" aria-selected="true">Screening <span class="badge bg-light text-dark">{{$count_screening}}</span></button>
        </li>
        <li class="nav-item me-2 mb-2" role="presentation">
            <button class="pil nav-link toggle-task-custom" id="pills-psikotest-tab" data-bs-toggle="pill" data-bs-target="#pills-psikotest" type="button" role="tab" aria-controls="pills-psikotest" aria-selected="false">Psikotest <span class="badge bg-light text-dark">{{$count_psikotest}}</span></button>
        </li>
        <li class="nav-item me-2 mb-2" role="presentation">
            <button class="pil nav-link toggle-task-custom" id="pills-interview-hr-tab" data-bs-toggle="pill" data-bs-target="#pills-interview-hr" type="button" role="tab" aria-controls="pills-interview-hr" aria-selected="false">Interview HR <span class="badge bg-light text-dark">{{$count_inter_hr}}</span></button>
        </li>
        <li class="nav-item me-2 mb-2" role="presentation">
            <button class="pil nav-link toggle-task-custom" id="pills-interview-user-tab" data-bs-toggle="pill" data-bs-target="#pills-interview-user" type="button" role="tab" aria-controls="pills-interview-user" aria-selected="false">Interview User <span class="badge bg-light text-dark">{{$count_inter_user}}</span></button>
        </li>
        <li class="nav-item me-2 mb-2" role="presentation">
            <button class="pil nav-link toggle-task-custom" id="pills-peralihan-tab" data-bs-toggle="pill" data-bs-target="#pills-peralihan" type="button" role="tab" aria-controls="pills-peralihan" aria-selected="false">Peralihan <span class="badge bg-light text-dark">{{$count_peralihan}}</span></button>
        </li>
        <li class="nav-item me-2 mb-2" role="presentation">
            <button class="pil nav-link toggle-task-custom" id="pills-reject-tab" data-bs-toggle="pill" data-bs-target="#pills-reject" type="button" role="tab" aria-controls="pills-reject" aria-selected="false">Reject <span class="badge bg-light text-dark">{{$count_reject}}</span></button>
        </li>
        <li class="nav-item me-2 mb-2" role="presentation">
            <button class="pil nav-link toggle-task-custom" id="pills-hiring-tab" data-bs-toggle="pill" data-bs-target="#pills-hiring" type="button" role="tab" aria-controls="pills-hiring" aria-selected="false">Hiring <span class="badge bg-light text-dark">{{$count_hiring}}</span></button>
        </li>
    </ul>

        <div class="my-2">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-screening" role="tabpanel" aria-labelledby="pills-screening-tab">
                <div class="table-responsive">
                    <table id="TableScreening" data-sortable class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
                        <thead class="align-middle">
                            <tr>
                                <th class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </th>
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
                                <th></th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox1" onkeyup="scrFilter1()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox2" onkeyup="scrFilter2()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox3" onkeyup="scrFilter3()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox4" onkeyup="scrFilter4()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox5" onkeyup="scrFilter5()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox6" onkeyup="scrFilter6()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox7" onkeyup="scrFilter7()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox8" onkeyup="scrFilter8()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox9" onkeyup="scrFilter9()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                                <th>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox10" onkeyup="scrFilter10()" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="screeningTD" class="align-middle">
    
                            @foreach($screening as $scr)
    
                            <tr>
                                <td class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td>{{$scr->nama}}</td>
                                <td>
                                    @if($scr->process == 'approval')
                                        <div  class="mx-auto text-center" style="width: 74px; height: 24px; border: 1px solid #9EB5A2; color: #41806D; font-size: 12px; line-height: 24px;">
                                            APPROVAL
                                        </div>
                                    @elseif($scr->process == 'waiting')
                                        <div  class="mx-auto text-center" style="width: 66px; height: 24px; border: 1px solid #F7BD93; color: #FA6900; font-size: 12px; line-height: 24px;">
                                            WAITING
                                        </div>
                                    @elseif($scr->process == 'fail')
                                        <div  class="mx-auto text-center" style="width: 40px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            FAIL
                                        </div>
                                    @elseif($scr->process == 'cancel_join')
                                        <div  class="mx-auto text-center" style="width: 95px; height: 24px; border: 1px solid #C893BE; color: #85016B; font-size: 12px; line-height: 24px;">
                                            CANCEL JOIN
                                        </div>
                                    @elseif($scr->process == 'resign')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #81B29A; color: #41806D; font-size: 12px; line-height: 24px;">
                                            RESIGN
                                        </div>
                                    @elseif($scr->process == 'done')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F9DB93; color: #FFB800; font-size: 12px; line-height: 24px;">
                                            DONE
                                        </div>
                                    @elseif($scr->process == 'on_process')
                                        <div  class="mx-auto text-center" style="width: 85px; height: 24px; border: 1px solid #89A7E0; color: #2E5AAC; font-size: 12px; line-height: 24px;">
                                            ON PROCESS
                                        </div>
                                    @elseif($scr->process == 'reject')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            REJECT
                                        </div>
                                    @else
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                                            HIRING
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center" valueTags="{{$scr->tags}}">
                                    <span class="{{$scr->tags == '0' ? 'dot-red' : 'dot-green'}} dot-tags"  id="tags"></span>
                                </td>
                                <td>{{$scr->domisili}}</td>
                                <td>
                                    @if($scr->gender == 0)
                                        Perempuan
                                    @else
                                        Laki-laki
                                    @endif
                                </td>
                                <td>{{$scr->usia}}</td>
                                <td>{{$scr->pendidikan}}</td>
                                <td>{{$scr->layanan}}</td>
                                <td>{{$scr->jabatan}}</td>
                                <td>{{$scr->minat}}</td>
                            </tr>
    
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-psikotest" role="tabpanel" aria-labelledby="pills-psikotest-tab">
                <div class="table-responsive">
                    <table id="TablePsikotest" data-sortable class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
                        <thead class="align-middle">
                            <tr>
                                <th class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </th>
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
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="psikotestTD" class="align-middle">
    
                            @foreach($psikotest as $psi)
    
                            <tr>
                                <td class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td>{{$psi->nama}}</td>
                                <td>
                                    @if($psi->process == 'approval')
                                        <div  class="mx-auto text-center" style="width: 74px; height: 24px; border: 1px solid #9EB5A2; color: #41806D; font-size: 12px; line-height: 24px;">
                                            APPROVAL
                                        </div>
                                    @elseif($psi->process == 'waiting')
                                        <div  class="mx-auto text-center" style="width: 66px; height: 24px; border: 1px solid #F7BD93; color: #FA6900; font-size: 12px; line-height: 24px;">
                                            WAITING
                                        </div>
                                    @elseif($psi->process == 'fail')
                                        <div  class="mx-auto text-center" style="width: 40px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            FAIL
                                        </div>
                                    @elseif($psi->process == 'cancel_join')
                                        <div  class="mx-auto text-center" style="width: 95px; height: 24px; border: 1px solid #C893BE; color: #85016B; font-size: 12px; line-height: 24px;">
                                            CANCEL JOIN
                                        </div>
                                    @elseif($psi->process == 'resign')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #81B29A; color: #41806D; font-size: 12px; line-height: 24px;">
                                            RESIGN
                                        </div>
                                    @elseif($psi->process == 'done')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F9DB93; color: #FFB800; font-size: 12px; line-height: 24px;">
                                            DONE
                                        </div>
                                    @elseif($psi->process == 'on_process')
                                        <div  class="mx-auto text-center" style="width: 85px; height: 24px; border: 1px solid #89A7E0; color: #2E5AAC; font-size: 12px; line-height: 24px;">
                                            ON PROCESS
                                        </div>
                                    @elseif($psi->process == 'reject')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            REJECT
                                        </div>
                                    @else
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                                            HIRING
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($psi->tags == 0)
                                        <span class="dot-red"></span>
                                    @else
                                        <span class="dot-green"></span>
                                    @endif
                                </td>
                                <td>{{$psi->domisili}}</td>
                                <td>
                                    @if($psi->gender == 0)
                                        Perempuan
                                    @else
                                        Laki-laki
                                    @endif
                                </td>
                                <td>{{$psi->usia}}</td>
                                <td>{{$psi->pendidikan}}</td>
                                <td>{{$psi->layanan}}</td>
                                <td>{{$psi->jabatan}}</td>
                                <td>{{$psi->minat}}</td>
                            </tr>
    
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-interview-hr" role="tabpanel" aria-labelledby="pills-interview-hr-tab">
                <div class="table-responsive">
                    <table id="TableInterHR" data-sortable class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
                        <thead class="align-middle">
                            <tr>
                                <th class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </th>
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
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="interhrTD" class="align-middle">
    
                            @foreach($inter_hr as $ihr)
    
                            <tr>
                                <td class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td>{{$ihr->nama}}</td>
                                <td>
                                    @if($ihr->process == 'approval')
                                        <div  class="mx-auto text-center" style="width: 74px; height: 24px; border: 1px solid #9EB5A2; color: #41806D; font-size: 12px; line-height: 24px;">
                                            APPROVAL
                                        </div>
                                    @elseif($ihr->process == 'waiting')
                                        <div  class="mx-auto text-center" style="width: 66px; height: 24px; border: 1px solid #F7BD93; color: #FA6900; font-size: 12px; line-height: 24px;">
                                            WAITING
                                        </div>
                                    @elseif($ihr->process == 'fail')
                                        <div  class="mx-auto text-center" style="width: 40px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            FAIL
                                        </div>
                                    @elseif($ihr->process == 'cancel_join')
                                        <div  class="mx-auto text-center" style="width: 95px; height: 24px; border: 1px solid #C893BE; color: #85016B; font-size: 12px; line-height: 24px;">
                                            CANCEL JOIN
                                        </div>
                                    @elseif($ihr->process == 'resign')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #81B29A; color: #41806D; font-size: 12px; line-height: 24px;">
                                            RESIGN
                                        </div>
                                    @elseif($ihr->process == 'done')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F9DB93; color: #FFB800; font-size: 12px; line-height: 24px;">
                                            DONE
                                        </div>
                                    @elseif($scr->process == 'on_process')
                                        <div  class="mx-auto text-center" style="width: 85px; height: 24px; border: 1px solid #89A7E0; color: #2E5AAC; font-size: 12px; line-height: 24px;">
                                            ON PROCESS
                                        </div>
                                    @elseif($scr->process == 'reject')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            REJECT
                                        </div>
                                    @else
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                                            HIRING
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($ihr->tags == 0)
                                        <span class="dot-red"></span>
                                    @else
                                        <span class="dot-green"></span>
                                    @endif
                                </td>
                                <td>{{$ihr->domisili}}</td>
                                <td>
                                    @if($ihr->gender == 0)
                                        Perempuan
                                    @else
                                        Laki-laki
                                    @endif
                                </td>
                                <td>{{$ihr->usia}}</td>
                                <td>{{$ihr->pendidikan}}</td>
                                <td>{{$ihr->layanan}}</td>
                                <td>{{$ihr->jabatan}}</td>
                                <td>{{$ihr->minat}}</td>
                            </tr>
    
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-interview-user" role="tabpanel" aria-labelledby="pills-interview-user-tab">
                <div class="table-responsive">
                    <table id="TableInterUser" data-sortable class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
                        <thead class="align-middle">
                            <tr>
                                <th class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </th>
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
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="interuserTD" class="align-middle">
    
                            @foreach($inter_user as $iur)
    
                            <tr>
                                <td class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td>{{$iur->nama}}</td>
                                <td>
                                    @if($iur->process == 'approval')
                                        <div  class="mx-auto text-center" style="width: 74px; height: 24px; border: 1px solid #9EB5A2; color: #41806D; font-size: 12px; line-height: 24px;">
                                            APPROVAL
                                        </div>
                                    @elseif($iur->process == 'waiting')
                                        <div  class="mx-auto text-center" style="width: 66px; height: 24px; border: 1px solid #F7BD93; color: #FA6900; font-size: 12px; line-height: 24px;">
                                            WAITING
                                        </div>
                                    @elseif($iur->process == 'fail')
                                        <div  class="mx-auto text-center" style="width: 40px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            FAIL
                                        </div>
                                    @elseif($iur->process == 'cancel_join')
                                        <div  class="mx-auto text-center" style="width: 95px; height: 24px; border: 1px solid #C893BE; color: #85016B; font-size: 12px; line-height: 24px;">
                                            CANCEL JOIN
                                        </div>
                                    @elseif($iur->process == 'resign')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #81B29A; color: #41806D; font-size: 12px; line-height: 24px;">
                                            RESIGN
                                        </div>
                                    @elseif($iur->process == 'done')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F9DB93; color: #FFB800; font-size: 12px; line-height: 24px;">
                                            DONE
                                        </div>
                                    @elseif($iur->process == 'on_process')
                                        <div  class="mx-auto text-center" style="width: 85px; height: 24px; border: 1px solid #89A7E0; color: #2E5AAC; font-size: 12px; line-height: 24px;">
                                            ON PROCESS
                                        </div>
                                    @elseif($iur->process == 'reject')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            REJECT
                                        </div>
                                    @else
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                                            HIRING
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($iur->tags == 0)
                                        <span class="dot-red"></span>
                                    @else
                                        <span class="dot-green"></span>
                                    @endif
                                </td>
                                <td>{{$iur->domisili}}</td>
                                <td>
                                    @if($iur->gender == 0)
                                        Perempuan
                                    @else
                                        Laki-laki
                                    @endif
                                </td>
                                <td>{{$iur->usia}}</td>
                                <td>{{$iur->pendidikan}}</td>
                                <td>{{$iur->layanan}}</td>
                                <td>{{$iur->jabatan}}</td>
                                <td>{{$iur->minat}}</td>
                            </tr>
    
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-peralihan" role="tabpanel" aria-labelledby="pills-peralihan-tab">
                <div class="table-responsive">
                    <table id="TablePeralihan" data-sortable class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
                        <thead class="align-middle">
                            <tr>
                                <th class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </th>
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
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="peralihanTD" class="align-middle">
    
                            @foreach($peralihan as $phn)
    
                            <tr>
                                <td class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td>{{$phn->nama}}</td>
                                <td>
                                    @if($phn->process == 'approval')
                                        <div  class="mx-auto text-center" style="width: 74px; height: 24px; border: 1px solid #9EB5A2; color: #41806D; font-size: 12px; line-height: 24px;">
                                            APPROVAL
                                        </div>
                                    @elseif($phn->process == 'waiting')
                                        <div  class="mx-auto text-center" style="width: 66px; height: 24px; border: 1px solid #F7BD93; color: #FA6900; font-size: 12px; line-height: 24px;">
                                            WAITING
                                        </div>
                                    @elseif($phn->process == 'fail')
                                        <div  class="mx-auto text-center" style="width: 40px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            FAIL
                                        </div>
                                    @elseif($phn->process == 'cancel_join')
                                        <div  class="mx-auto text-center" style="width: 95px; height: 24px; border: 1px solid #C893BE; color: #85016B; font-size: 12px; line-height: 24px;">
                                            CANCEL JOIN
                                        </div>
                                    @elseif($phn->process == 'resign')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #81B29A; color: #41806D; font-size: 12px; line-height: 24px;">
                                            RESIGN
                                        </div>
                                    @elseif($phn->process == 'done')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F9DB93; color: #FFB800; font-size: 12px; line-height: 24px;">
                                            DONE
                                        </div>
                                    @elseif($phn->process == 'on_process')
                                        <div  class="mx-auto text-center" style="width: 85px; height: 24px; border: 1px solid #89A7E0; color: #2E5AAC; font-size: 12px; line-height: 24px;">
                                            ON PROCESS
                                        </div>
                                    @elseif($phn->process == 'reject')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            REJECT
                                        </div>
                                    @else
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                                            HIRING
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($phn->tags == 0)
                                        <span class="dot-red"></span>
                                    @else
                                        <span class="dot-green"></span>
                                    @endif
                                </td>
                                <td>{{$phn->domisili}}</td>
                                <td>
                                    @if($phn->gender == 0)
                                        Perempuan
                                    @else
                                        Laki-laki
                                    @endif
                                </td>
                                <td>{{$phn->usia}}</td>
                                <td>{{$phn->pendidikan}}</td>
                                <td>{{$phn->layanan}}</td>
                                <td>{{$phn->jabatan}}</td>
                                <td>{{$phn->minat}}</td>
                            </tr>
    
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-reject" role="tabpanel" aria-labelledby="pills-reject-tab">
                <div class="table-responsive">
                    <table id="TableReject" data-sortable class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
                        <thead class="align-middle">
                            <tr>
                                <th class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </th>
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
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="rejectTD" class="align-middle">
    
                            @foreach($reject as $rjc)
    
                            <tr>
                                <td class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td>{{$rjc->nama}}</td>
                                <td>
                                    @if($rjc->process == 'approval')
                                        <div  class="mx-auto text-center" style="width: 74px; height: 24px; border: 1px solid #9EB5A2; color: #41806D; font-size: 12px; line-height: 24px;">
                                            APPROVAL
                                        </div>
                                    @elseif($rjc->process == 'waiting')
                                        <div  class="mx-auto text-center" style="width: 66px; height: 24px; border: 1px solid #F7BD93; color: #FA6900; font-size: 12px; line-height: 24px;">
                                            WAITING
                                        </div>
                                    @elseif($rjc->process == 'fail')
                                        <div  class="mx-auto text-center" style="width: 40px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            FAIL
                                        </div>
                                    @elseif($rjc->process == 'cancel_join')
                                        <div  class="mx-auto text-center" style="width: 95px; height: 24px; border: 1px solid #C893BE; color: #85016B; font-size: 12px; line-height: 24px;">
                                            CANCEL JOIN
                                        </div>
                                    @elseif($rjc->process == 'resign')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #81B29A; color: #41806D; font-size: 12px; line-height: 24px;">
                                            RESIGN
                                        </div>
                                    @elseif($rjc->process == 'done')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F9DB93; color: #FFB800; font-size: 12px; line-height: 24px;">
                                            DONE
                                        </div>
                                    @elseif($rjc->process == 'on_process')
                                        <div  class="mx-auto text-center" style="width: 85px; height: 24px; border: 1px solid #89A7E0; color: #2E5AAC; font-size: 12px; line-height: 24px;">
                                            ON PROCESS
                                        </div>
                                    @elseif($rjc->process == 'reject')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            REJECT
                                        </div>
                                    @else
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                                            HIRING
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($rjc->tags == 0)
                                        <span class="dot-red"></span>
                                    @else
                                        <span class="dot-green"></span>
                                    @endif
                                </td>
                                <td>{{$rjc->domisili}}</td>
                                <td>
                                    @if($rjc->gender == 0)
                                        Perempuan
                                    @else
                                        Laki-laki
                                    @endif
                                </td>
                                <td>{{$rjc->usia}}</td>
                                <td>{{$rjc->pendidikan}}</td>
                                <td>{{$rjc->layanan}}</td>
                                <td>{{$rjc->jabatan}}</td>
                                <td>{{$rjc->minat}}</td>
                            </tr>
    
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-hiring" role="tabpanel" aria-labelledby="pills-hiring-tab">
                <div class="table-responsive">
                    <table id="TableHiring" data-sortable class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
                        <thead class="align-middle">
                            <tr>
                                <th class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </th>
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
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="search-box">
                                        <input style="height: 50px;" type="text" id="searchBox" class="form-control search-input input-sm" placeholder="Search..">
                                        <i class="bi bi-search search-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="hiringTD" class="align-middle">
    
                            @foreach($hiring as $hrg)
    
                            <tr>
                                <td class="text-center" style="width: 48px; height: 48px">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td>{{$hrg->nama}}</td>
                                <td>
                                    @if($hrg->process == 'approval')
                                        <div  class="mx-auto text-center" style="width: 74px; height: 24px; border: 1px solid #9EB5A2; color: #41806D; font-size: 12px; line-height: 24px;">
                                            APPROVAL
                                        </div>
                                    @elseif($hrg->process == 'waiting')
                                        <div  class="mx-auto text-center" style="width: 66px; height: 24px; border: 1px solid #F7BD93; color: #FA6900; font-size: 12px; line-height: 24px;">
                                            WAITING
                                        </div>
                                    @elseif($hrg->process == 'fail')
                                        <div  class="mx-auto text-center" style="width: 40px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            FAIL
                                        </div>
                                    @elseif($hrg->process == 'cancel_join')
                                        <div  class="mx-auto text-center" style="width: 95px; height: 24px; border: 1px solid #C893BE; color: #85016B; font-size: 12px; line-height: 24px;">
                                            CANCEL JOIN
                                        </div>
                                    @elseif($hrg->process == 'resign')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #81B29A; color: #41806D; font-size: 12px; line-height: 24px;">
                                            RESIGN
                                        </div>
                                    @elseif($hrg->process == 'done')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F9DB93; color: #FFB800; font-size: 12px; line-height: 24px;">
                                            DONE
                                        </div>
                                    @elseif($hrg->process == 'on_process')
                                        <div  class="mx-auto text-center" style="width: 85px; height: 24px; border: 1px solid #89A7E0; color: #2E5AAC; font-size: 12px; line-height: 24px;">
                                            ON PROCESS
                                        </div>
                                    @elseif($hrg->process == 'reject')
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #F7BFC0; color: #F94144; font-size: 12px; line-height: 24px;">
                                            REJECT
                                        </div>
                                    @else
                                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                                            HIRING
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($hrg->tags == 0)
                                        <span id="tag" class="dot-red" value="stop"></span>
                                    @else
                                        <span id="tag" class="dot-green" value="lanjut"></span>
                                    @endif
                                </td>
                                <td>{{$hrg->domisili}}</td>
                                <td>
                                    @if($hrg->gender == 0)
                                        Perempuan
                                    @else
                                        Laki-laki
                                    @endif
                                </td>
                                <td>{{$hrg->usia}}</td>
                                <td>{{$hrg->pendidikan}}</td>
                                <td>{{$hrg->layanan}}</td>
                                <td>{{$hrg->jabatan}}</td>
                                <td>{{$hrg->minat}}</td>
                            </tr>
    
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>

    function btnPublish(idJob) {
        // Set ID pekerjaan di formulir tersembunyi untuk duplikasi
        document.getElementById('publishJobId').value = idJob;
        // Kirim formulir
        document.getElementById('publishForm').submit();
    }

    function btnDraft(idJob) {
        // Set ID pekerjaan di formulir tersembunyi untuk duplikasi
        document.getElementById('draftJobId').value = idJob;
        // Kirim formulir
        document.getElementById('draftForm').submit();
    }
    function btnInternal(idJob) {
        // Set ID pekerjaan di formulir tersembunyi untuk duplikasi
        document.getElementById('internalJobId').value = idJob;
        // Kirim formulir
        document.getElementById('internalForm').submit();
    }
    function btnExternal(idJob) {
        // Set ID pekerjaan di formulir tersembunyi untuk duplikasi
        document.getElementById('externalJobId').value = idJob;
        // Kirim formulir
        document.getElementById('externalForm').submit();
    }



    // Sorting function
    function setupSorting(table) {
        const headers = table.querySelectorAll('th[data-sort]');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.rows);

        headers.forEach(header => {
            header.addEventListener('click', () => {
                const index = Array.from(header.parentNode.children).indexOf(header);
                const isAscending = header.classList.contains('sort-asc');

                headers.forEach(h => h.classList.remove('sort-asc', 'sort-desc'));
                header.classList.toggle('sort-asc', !isAscending);
                header.classList.toggle('sort-desc', isAscending);

                rows.sort((a, b) => {
                    if (a.id === 'search-col' || b.id === 'search-col') {
                        return 0; // No sorting for search column row
                    }

                    const cellA = a.cells[index].innerText.trim().toLowerCase();
                    const cellB = b.cells[index].innerText.trim().toLowerCase();

                    if (cellA < cellB) return isAscending ? 1 : -1;
                    if (cellA > cellB) return isAscending ? -1 : 1;
                    return 0;
                });

                tbody.innerHTML = '';

                rows.forEach(row => {
                    tbody.appendChild(row);
                });

                applyFilters(); // Re-apply filters after sorting
            });
        });
    }

    // Setup sorting for each table
    document.addEventListener('DOMContentLoaded', () => {
        const tables = document.querySelectorAll('table[data-sortable]');
        tables.forEach(table => {
            setupSorting(table);
        });
    });


    


    // $("#searchBox").keyup(function () {
    //     var value = this.value.toLowerCase().trim();

    //         $("#screeningTD tr").each(function (index) {
    //             $(this).find("td").each(function () {
    //                 var id = $(this).text().toLowerCase().trim();
    //                 var not_found = (id.indexOf(value) == -1);
    //                 $(this).closest('tr').toggle(!not_found);
    //                 return not_found;
    //             });
    //         });
            
    //         $("#psikotestTD tr").each(function (index) {
    //             $(this).find("td").each(function () {
    //                 var id = $(this).text().toLowerCase().trim();
    //                 var not_found = (id.indexOf(value) == -1);
    //                 $(this).closest('tr').toggle(!not_found);
    //                 return not_found;
    //             });
    //         });

    //         $("#interhrTD tr").each(function (index) {
    //             $(this).find("td").each(function () {
    //                 var id = $(this).text().toLowerCase().trim();
    //                 var not_found = (id.indexOf(value) == -1);
    //                 $(this).closest('tr').toggle(!not_found);
    //                 return not_found;
    //             });
    //         });

    //         $("#interuserTD tr").each(function (index) {
    //             $(this).find("td").each(function () {
    //                 var id = $(this).text().toLowerCase().trim();
    //                 var not_found = (id.indexOf(value) == -1);
    //                 $(this).closest('tr').toggle(!not_found);
    //                 return not_found;
    //             });
    //         });

    //         $("#peralihanTD tr").each(function (index) {
    //             $(this).find("td").each(function () {
    //                 var id = $(this).text().toLowerCase().trim();
    //                 var not_found = (id.indexOf(value) == -1);
    //                 $(this).closest('tr').toggle(!not_found);
    //                 return not_found;
    //             });
    //         });

    //         $("#rejectTD tr").each(function (index) {
    //             $(this).find("td").each(function () {
    //                 var id = $(this).text().toLowerCase().trim();
    //                 var not_found = (id.indexOf(value) == -1);
    //                 $(this).closest('tr').toggle(!not_found);
    //                 return not_found;
    //             });
    //         });

    //         $("#hiringTD tr").each(function (index) {
    //             $(this).find("td").each(function () {
    //                 var id = $(this).text().toLowerCase().trim();
    //                 var not_found = (id.indexOf(value) == -1);
    //                 $(this).closest('tr').toggle(!not_found);
    //                 return not_found;
    //             });
    //         });
    // });


    function scrFilter1() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox1");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
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

    function scrFilter2() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox2");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
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

    function scrFilter5() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox5");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
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

    function scrFilter4() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox4");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
            console.log(td.value);
            txtValue = td.textContent || td.innerText || td.value;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
    }

    function scrFilter3() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox3");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
            txtValue = td.getAttribute('valueTags');
            console.log(txtValue);
            console.log(td.getAttribute('valueTags'));
            console.log("hehey nit bad");
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
    }

    function scrFilter6() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox6");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[6];
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

    function scrFilter7() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox7");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[7];
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

    function scrFilter8() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox8");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[8];
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

    function scrFilter9() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox9");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[9];
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

    function scrFilter10() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox10");
        filter = input.value.toUpperCase();
        table = document.getElementById("TableScreening");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[10];
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


    




    // pagination

    function paginate(filteredRows) {
            var rowsShown = 5;
            var rowsTotal = filteredRows.length;
            var numPages = Math.ceil(rowsTotal / rowsShown);
            var $pagination = $('.pagination');
            $pagination.empty();
            $pagination.append('<li id="prevPage" class="disabled"><i class="bi bi-chevron-left me-2"></i> Previous</li>');

            for (var i = 1; i <= numPages; i++) {
                $pagination.append('<li>' + i + '</li>');
            }

            $pagination.append('<li id="nextPage">Next <i class="bi bi-chevron-right ms-2"></i></li>');

            function showPage(pageNum) {
                var startItem = (pageNum - 1) * rowsShown;
                var endItem = startItem + rowsShown;
                filteredRows.hide().slice(startItem, endItem).show();
                updateDataInfo(startItem, Math.min(endItem, rowsTotal), rowsTotal);

                $pagination.find('li').not('#prevPage, #nextPage').hide();
                for (var i = Math.max(1, pageNum - 1); i <= Math.min(numPages, pageNum + 1); i++) {
                    $pagination.find('li').eq(i).show();
                }

                $('#prevPage').toggleClass('disabled', pageNum === 1);
                $('#nextPage').toggleClass('disabled', pageNum === numPages);
            }

            $pagination.find('li:not(#prevPage, #nextPage)').on('click', function() {
                var currPage = parseInt($(this).text());
                $pagination.find('li').removeClass('active');
                $(this).addClass('active');
                showPage(currPage);
            });

            $('#prevPage').on('click', function() {
                var currPage = parseInt($pagination.find('li.active').text());
                if (currPage > 1) {
                    showPage(currPage - 1);
                    $pagination.find('li').removeClass('active');
                    $pagination.find('li').eq(currPage - 1).addClass('active');
                }
            });

            $('#nextPage').on('click', function() {
                var currPage = parseInt($pagination.find('li.active').text());
                if (currPage < numPages) {
                    showPage(currPage + 1);
                    $pagination.find('li').removeClass('active');
                    $pagination.find('li').eq(currPage + 1).addClass('active');
                }
            });

            showPage(1); // Initialize to show first page
            $pagination.find('li').eq(1).addClass('active');
        }

        function updateDataInfo(start, end, total) {
            $('.data-info').text('Menampilkan ' + (start + 1) + '-' + end + ' dari ' + total + ' item.');
        }

        // Initial pagination setup
        paginate($("#canditateTD tr"));

        document.addEventListener('DOMContentLoaded', (event) => {
        // Function to update badge count
        function updateCheckedCount() {
            // Select all checkboxes inside the table
            const checkboxes = document.querySelectorAll('#TableAdd tbody input[type="checkbox"]');
            
            // Count checked checkboxes
            const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;

            // Update badge text
            const badge = document.getElementById('checkedCountBadge');
            if (badge) {
                badge.textContent = checkedCount;
            }
        }

        // Attach event listeners to checkboxes
        document.querySelectorAll('#TableAdd tbody input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', updateCheckedCount);
        });

        // Initial call to set the badge count on page load
        updateCheckedCount();
    });



    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.candidate-checkbox');
        const selectAllCheckbox = document.getElementById('selectAll');
        const checkedCountBadge = document.getElementById('checkedCountBadge');

        selectAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(checkbox => {
                if (!checkbox.disabled) {
                    checkbox.checked = selectAllCheckbox.checked;
                }
            });
            updateCheckedCount();
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateCheckedCount);
        });

        function updateCheckedCount() {
            let count = 0;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    count++;
                }
            });
            checkedCountBadge.textContent = count;
        }
    });

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

