<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                position: relative;
            }

            .custom-table th.sort-asc-1::after,
            .custom-table th.sort-asc-2::after {
                content: '▲';
                position: absolute;
                left: 70%;
                top: 17%;
                opacity: 0.4;
            }
            .custom-table th.sort-asc-1::before,
            .custom-table th.sort-asc-2::before {
                content: '▼';
                position: absolute;
                left: 70%;
                bottom: 17%;
                opacity: 0.2;
            }
            
            .custom-table th.sort-desc-1::after,
            .custom-table th.sort-desc-2::after {
                content: '▲';
                position: absolute;
                left: 70%;
                top: 17%;
                opacity: 0.2;
            }
            .custom-table th.sort-desc-1::before,
            .custom-table th.sort-desc-2::before {
                content: '▼';
                position: absolute;
                left: 70%;
                bottom: 17%;
                opacity: 0.4;
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
            .drp-down{
                padding: 5px 15px 5px 15px;
                width: 100%;
            }
            .drp-down li{
                width: 100%;
            }
            .drp-down .text{
                margin-bottom: 0;
                font-size: 12px;
                padding: 0;
                color: #414141;
            }
            .drp-down li .input{
                margin: auto 0 auto auto;
                padding: 0;
            }
            .drp-down .drp-row{
                margin: 10px 0 10px 0;
            }
            .btn-view{
                padding: auto;
                width: 95px;
                background-color: #DCF7E1;
                border: 1px solid #41806D;
                color: #41806D;
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
            <div class="col-md text-end d-flex justify-content-end" style="font-size: 15px">
                <div class="dropdown ">
                    <button class="ms-2 btn btn-light" style="border: solid 1px #E7E7ED;font-weight: 600 !important;color: #646464;" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('assets/3-dots.svg')}}" alt=""> Filter</button>
                    <ul class="dropdown-menu drp-down" style="width: 10px !important;">
                        <li class="d-flex drp-row"> 
                            <p class="drp-down text my-auto">Tags</p>
                            <div class="form-check form-switch align-self-end drp-down input" style="display: flex;">
                                <input class="form-check-input input" checked onchange="filterTable('1')" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </li>
                        <li class="d-flex drp-row"> 
                            <p class="drp-down text my-auto">Domisili</p>
                            <div class="form-check form-switch align-self-end drp-down input" style="display: flex;">
                                <input class="form-check-input input" checked onchange="filterTable('2')" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </li>
                        <li class="d-flex drp-row"> 
                            <p class="drp-down text my-auto">Gender</p>
                            <div class="form-check form-switch align-self-end drp-down input" style="display: flex;">
                                <input class="form-check-input input" checked onchange="filterTable('3')" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </li>
                        <li class="d-flex drp-row"> 
                            <p class="drp-down text my-auto">Pendidikan</p>
                            <div class="form-check form-switch align-self-end drp-down input" style="display: flex;">
                                <input class="form-check-input input" checked onchange="filterTable('4')" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </li>
                        <li class="d-flex drp-row"> 
                            <p class="drp-down text my-auto">Layanan</p>
                            <div class="form-check form-switch align-self-end drp-down input" style="display: flex;">
                                <input class="form-check-input input" checked onchange="filterTable('5')" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </li>
                        <li class="d-flex drp-row"> 
                            <p class="drp-down text my-auto">Jabatan</p>
                            <div class="form-check form-switch align-self-end drp-down input" style="display: flex;">
                                <input class="form-check-input input" checked onchange="filterTable('6')" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </li>
                        <li class="d-flex drp-row"> 
                            <p class="drp-down text my-auto">Minat</p>
                            <div class="form-check form-switch align-self-end drp-down input" style="display: flex;">
                                <input class="form-check-input input" checked onchange="filterTable('7')" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </li>
                    </ul>
                </div>
                <button class="ms-2 btn gj-color-green" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span class="badge bg-light text-dark" id="spanMove">0</span> Move</button>
                <button class="ms-2 btn btn-danger" onclick="deleteFunction()"><span class="badge bg-light text-dark" id="spanDelete">0</span> Delete</button>
                <a href="/candidates/detail" class="ms-2 btn btn-view"> View</a>
            </div>
        </div>

        <div class="table-responsive">
        <table id="tableCandidates" data-sortable class="table table-bordered custom-table table-candidates" style="background: #fff; font-weight: 500; font-size: 14px;margin-bottom: 2px;">
            <thead class="align-middle">
                <tr>
                    <th class="text-center" style="width: 48px; height: 48px">
                        <input type="checkbox" name="" id="selectAll" class="form-check-input">
                    </th>
                    <th style="width: 170px;">Nama</th>
                    <th style="width: 120px">Process</th>
                    <th id="thFilter-1">Tags</th>
                    <th id="thFilter-2" data-sort class="sort-asc-1" onclick="sortTable('1')">Domisili</th>
                    <th id="thFilter-3" data-sort class="sort-asc-2" onclick="sortTable('2')">Gender</th>
                    <th>Usia</th>
                    <th id="thFilter-4">Pendidikan</th>
                    <th id="thFilter-5">Layanan</th>
                    <th id="thFilter-6">Jabatan</th>
                    <th id="thFilter-7">Minat</th>
                </tr>
                <tr id="search-col">
                    <td></td>
                    <td style="">
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="width:160px;padding-left:30px;font-size:12px" name="" id="searchInput-1" onkeyup="searchFunction('1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="width: 150px;padding-left:30px;font-size:12px" name="" id="searchInput-2" onkeyup="searchFunction('2')">
                        </div>
                    </td>
                    <td id="inputFilter-1">
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-3" onkeyup="searchFunction('3')">
                        </div>
                    </td>
                    <td id="inputFilter-2">
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-4" onkeyup="searchFunction('4')">
                        </div>
                    </td>
                    <td id="inputFilter-3">
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-5" onkeyup="searchFunction('5')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px;width: 50px;" name="" id="searchInput-6" onkeyup="searchFunction('6')">
                        </div>
                    </td>
                    <td id="inputFilter-4">
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-7" onkeyup="searchFunction('7')">
                        </div>
                    </td>
                    <td id="inputFilter-5">
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-8" onkeyup="searchFunction('8')">
                        </div>
                    </td>
                    <td id="inputFilter-6">
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-9" onkeyup="searchFunction('9')">
                        </div>
                    </td>
                    <td id="inputFilter-7">
                        <div class="form-group position-relative">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2" style="top: 2px;"></i>
                            <input type="text" class="form-control " style="padding-left:30px;font-size:12px" name="" id="searchInput-10" onkeyup="searchFunction('10')">
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody id="screeningTD" class="align-middle" style="border-width: 0px !important;">
                @foreach($candidates as $c)
                <tr>
                    <td class="text-center" style="width: 48px; height: 48px;"><input type="checkbox" class="rowCheckbox form-check-input" name="" id="" data-id="{{$c->id_candidate}}"></td>
                    <td style="font-weight: 500;cursor: pointer;" onclick="detailCandidate({{$c->id_candidate}})">
                        {{$c->nama}}
                    </td>
                    <td class="">
                        <div  class="mx-auto text-center" style="">
                            @if($c->process == 'interview_hr')
                            <span class="process-{{$c->process}}">interview hr</span>
                            @elseif($c->process == 'interview_user')
                            <span class="process-{{$c->process}}">interview user</span>
                            @else
                            <span class="process-{{$c->process}}">{{$c->process}}</span>
                            @endif
                        </div>
                    </td>
                    <td id="" class="text-center align-middle dataFilter-1" searchValue="@if($c->tags == 1) lanjut @elseif($c->tags == 2) blacklist @elseif($c->tags == 0) stop @endif">
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
                    <td class="dataFilter-2">{{$c->domisili}}</td>
                    <td class="dataFilter-3">
                        @if($c->gender == 1)
                        Laki-laki
                        @else
                        Perempuan
                        @endif
                    </td>
                    <td>{{$c->usia}}</td>
                    <td class="dataFilter-4">{{$c->pendidikan}}</td>
                    <td class="dataFilter-5">{{$c->layanan}}</td>
                    <td class="dataFilter-6">{{$c->jabatan}}</td>
                    <td class="dataFilter-7">{{$c->minat}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $candidates->links() }}
    </div>
    </div>

    <script>
        function detailCandidate(id){
            window.location.href = '/candidates/detail/'+id;
        }
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
        function filterTable(col){
            tables = document.getElementById('tableCandidates');
            thTb = document.getElementById('thFilter-'+col);
            inputTb = document.getElementById('inputFilter-'+col);
            dataTb = document.getElementsByClassName('dataFilter-'+col);

            thTb.classList.toggle('d-none');
            inputTb.classList.toggle('d-none');
            if(dataTb != null){
                for(i = 0; i <= dataTb.length; i++){
                    dataTb[i].classList.toggle('d-none');
                }
            }
        }
        function updateCount() {
            const checkboxes = document.querySelectorAll('.rowCheckbox');
            const spanMove = document.getElementById('spanMove');
            const spanDelete = document.getElementById('spanDelete');
            let count = 0;

            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    count++;
                }
            });

            spanMove.textContent = `${count}`;
            spanDelete.textContent = `${count}`;
        }

        // Fungsi untuk mencentang atau menghilangkan centang semua checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.rowCheckbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateCount();
        });

        // Event listener untuk setiap checkbox di baris tabel
        const rowCheckboxes = document.querySelectorAll('.rowCheckbox');
        rowCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateCount);
        });

        function sortTable(i) {
            var a = 2;
            if(i == 2){
                a = 3;
            }
            const table = document.getElementById('tableCandidates');
            const header = document.getElementById('thFilter-'+a);
            const rows = Array.from(table.querySelector('tbody').rows);

            if(i == 1){
                const index = Array.from(header.parentNode.children).indexOf(header);
                const isAscending = header.classList.contains('sort-asc-1');

                header.classList.remove('sort-asc-1', 'sort-desc-1');
                header.classList.toggle('sort-asc-1', !isAscending);
                header.classList.toggle('sort-desc-1', isAscending);

                rows.sort((a, b) => {
                    const cellA = a.cells[index].innerText.trim().toLowerCase();
                    const cellB = b.cells[index].innerText.trim().toLowerCase();

                    if (cellA < cellB) return isAscending ? 1 : -1;
                    if (cellA > cellB) return isAscending ? -1 : 1;
                    return 0;
                });

                table.querySelector('tbody').append(...rows);
            }else{
                const index = Array.from(header.parentNode.children).indexOf(header);
                const isAscending = header.classList.contains('sort-asc-2');

                header.classList.remove('sort-asc-2', 'sort-desc-2');
                header.classList.toggle('sort-asc-2', !isAscending);
                header.classList.toggle('sort-desc-2', isAscending);

                rows.sort((a, b) => {
                    const cellA = a.cells[index].innerText.trim().toLowerCase();
                    const cellB = b.cells[index].innerText.trim().toLowerCase();

                    if (cellA < cellB) return isAscending ? 1 : -1;
                    if (cellA > cellB) return isAscending ? -1 : 1;
                    return 0;
                });

                table.querySelector('tbody').append(...rows);
            }
        }

        function deleteFunction(){
            const selectedIds = [];
            const checkboxes = document.querySelectorAll('.rowCheckbox:checked');

            checkboxes.forEach(checkbox => {
                selectedIds.push(checkbox.dataset.id);
            });

            if (selectedIds.length > 0) {
                if (confirm('Apa kamu yakin ingin menghapus '+selectedIds.length+' data ini?')) {
                    fetch('/candidates/delete', {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ ids: selectedIds })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            checkboxes.forEach(checkbox => {
                                checkbox.closest('tr').remove();
                            });
                            updateCount();
                            alert(selectedIds.length+' data berhasil dihapus!');
                        } else {
                            alert('Gagal menghapus data');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error!');
                    });
                }
            } else {
                alert('Pilih setidaknya 1 data untuk dihapus!');
            }
        }
    </script>
    
</body>
</html>