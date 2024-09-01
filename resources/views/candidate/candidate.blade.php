<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-icons/font/bootstrap-icons.min.css') }}">  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            body {
                font-family: 'Poppins', sans-serif;
                background: #F5F5F5;
            }

            .srt {
    display: inline-block; /* Agar ikon dapat ditata secara inline */
    width: 24px; /* Sesuaikan lebar ikon */
    height: 24px; /* Sesuaikan tinggi ikon */
    vertical-align: middle; /* Menyelaraskan ikon dengan teks di tengah */
    margin-right: 3px; /* Spasi antara ikon dan teks */
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}


            .srt-data{
                background-image: url('/assets/edit.svg');
            }

            .gj-green{
                background: #41806D;
                color: #ffffff;
            }

            .gj-green:hover{
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
        </style>
</head>
<body>
    @include('header')

    <div class="mx-4 my-3">
        <div class="row my-3">
            <div class="col-md text-end" style="font-size: 15px">
                <button class="ms-2 btn btn-light" style="border: solid 1px"> Filter</button>
                <button class="ms-2 btn gj-green"><span class="badge bg-light text-dark">4</span> Move</button>
                <button class="ms-2 btn btn-danger"><span class="badge bg-light text-dark">4</span> Delete</button>
                <button class="ms-2 btn btn-secondary"> <i class="srt srt-data"></i> View</button>
            </div>
        </div>

        <div class="table-responsive">
        <table id="TableScreening" data-sortable class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
            <thead class="align-middle">
                <tr>
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
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="width:160px;padding-left:30px;font-size:12px" name="" id="nameFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="processFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="tagsFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="locationFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="genderFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="ageFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="educationFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="serviceFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="positionFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <i class="bi bi-search mt-1 icon-1 position-absolute text-secondary ms-2"></i>
                            <input type="text" class="form-control " onkeyup="applyFilters()" style="padding-left:30px;font-size:12px" name="" id="interestFilter" onkeyup="searchFunction('search-1')">
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody id="screeningTD" class="align-middle">

                
                <tr>
                    <td class="text-center" style="width: 48px; height: 48px"><input type="checkbox" name="" id=""></td>
                    <td></td>
                    <td>
                        <div  class="mx-auto text-center" style="width: 62px; height: 24px; border: 1px solid #C893BE; color: #C893BE; font-size: 12px; line-height: 24px;">
                            HIRING
                        </div>
                    </td>
                    <td class="text-center">
                        <span class="dot-green"></span>
                    </td>
                    <td></td>
                    <td>
                        Laki-laki
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                

            </tbody>
        </table>
    </div>
    </div>

    
</body>
</html>