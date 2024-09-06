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
                    url("{{asset('assets/font/Poppins/Poppins-Light.ttf')}}") format('truetype'),
                    url("{{asset('assets/font/Poppins/Poppins-Medium.ttf')}}") format('truetype'),
                    url("{{asset('assets/font/Poppins/Poppins-SemiBold.ttf')}}") format('truetype'),
                    url("{{asset('assets/font/Poppins/Poppins-Bold.ttf')}}") format('truetype'),
                    url("{{asset('assets/font/Poppins/Poppins-ExtraBold.ttf')}}") format('truetype');
                font-weight: 400;
            }
            body {
                font-family: 'Poppins', sans-serif;
                font-weight: 400;
                background: #F5F5F5;
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
        </style>
</head>
<body>
    @include('header')

    <div class="mx-4 my-3">
        <div class="row my-3">
            <div class="col-md text-end" style="font-size: 15px">
                <button class="ms-2 btn btn-light" style="border: solid 1px #E7E7ED;font-weight: 600 !important;color: #646464;"><img src="{{asset('assets/3-dots.svg')}}" alt=""> Filter</button>
                <button class="ms-2 btn gj-color-green"><span class="badge bg-light text-dark">4</span> Move</button>
                <button class="ms-2 btn btn-danger"><span class="badge bg-light text-dark">4</span> Delete</button>
                <button class="ms-2 btn btn-secondary"> View</button>
            </div>
        </div>

        <div class="table-responsive">
        <table id="TableScreening" data-sortable class="table table-bordered custom-table table-candidates" style="background: #fff; font-weight: 500; font-size: 14px">
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
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="width:160px;padding-left:30px;font-size:12px" name="" id="nameFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="processFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="tagsFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="locationFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="genderFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="ageFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="educationFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="serviceFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="positionFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="interestFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody id="screeningTD" class="align-middle">
                @foreach($candidates as $c)
                <tr>
                    <td class="text-center" style="width: 48px; height: 48px"><input type="checkbox" name="" id=""></td>
                    <td>
                        {{$c->nama}}
                    </td>
                    <td>
                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                            HIRING
                        </div>
                    </td>
                    <td class="text-center">
                        <span class="dot-green"></span>
                    </td>
                    <td>{{$c->domisili}}</td>
                    <td>
                        {{$c->gender}}
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
    </div>
    </div>

    
</body>
</html>