<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/popper.min.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .border tr {
            border-right: transparent 0 solid !important;
            border-left: transparent 0 solid !important;
            border-top: transparent 0 solid !important;
            border-bottom: gray 1 solid !important;
        }
        
        

        .link-normal{
            text-decoration: none;
            color: black;
        }

        .lbl-s{
            font-size: .9rem !important;
        }

        .card-hipipe{
            max-width: 100% !important;
            max-height: 100% !important;
        }

        .form-select{
            font-size: .9rem !important;
            padding: .6rem;
        }

        .table-wrapper {
            border-radius: 15px;
            overflow: hidden; /* Penting agar sudut yang melengkung bekerja */
            border: 1px solid #dee2e6; /* Border pembungkus untuk tabel */
            background-color: white;
            padding: 0;
        }

        .table, .table-bordered {
            border-collapse: collapse;
            border-top: transparent 0 solid !important;
            margin: 0;
        }

    </style>

    <title>Report Hiring</title>
</head>
<body style="background: #f8f8f8">
    @include('header')

    <div class="mx-4 my-3">

        <div class="row mb-3 mt-4">
            <h5>Hiring Report</h5>
        </div>

        <div class="row mt-2">
            <div class="col-md-4 mb-3">
                <div class="card card-hipipe">
                    <div class="card-body px-4">
                        <div class="form-group">
                            <label for="" class="lbl-s mb-2">Periode Awal Kontrak</label>
                            <div class="d-flex align-middle">
                                <input type="date" style="width: 40%; height: 7vh; font-size: .9rem" name="pak-awal" id="" class="form-control me-4">
                                <span class="py-2">to</span>
                                <input type="date" style="width: 50%; height: 7vh; font-size: .9rem" name="pak-akhir" id="" class="form-control ms-4">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="" class="lbl-s mb-2">Periode Resign</label>
                            <div class="d-flex align-middle">
                                <input type="date" style="width: 40%; height: 7vh; font-size: .9rem" name="pr-awal" id="" class="form-control me-4">
                                <span class="py-2">to</span>
                                <input type="date" style="width: 50%; height: 7vh; font-size: .9rem" name="pr-akhir" id="" class="form-control ms-4">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="sap" class="lbl-s mb-2">SAP</label>
                            <select name="sap" id="" class="form-select">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="jabatan" class="lbl-s mb-2">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-select">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="job_family" class="lbl-s mb-2">Job Family</label>
                            <select name="job_family" id="job_family" class="form-select">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="sub_job_family" class="lbl-s mb-2">Sub Job Family</label>
                            <select name="sub_job_family" id="sub_job_family" class="form-select">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="persona_area" class="lbl-s mb-2">Persona Area</label>
                            <select name="persona_area" id="persona_area" class="form-select">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="area_ish" class="lbl-s mb-2">Area ISH</label>
                            <select name="area_ish" id="area_ish" class="form-select">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="region" class="lbl-s mb-2">Region</label>
                            <select name="region" id="region" class="form-select">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="kota" class="lbl-s mb-2">Kota</label>
                            <select name="kota" id="kota" class="form-select">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-block mx-4 mb-4 mt-2">
                        <button class="btn bg-green text-light me-3" style="width: 7rem; height: 2.5rem; font-size: .9rem;">Search</button>
                        <button class="btn btn-white-outline" style="width: 7rem; height: 2.5rem; font-size: .9rem;">Reset</button>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="row mb-3">
                            <div class="card bg-light-green card-hipipe pt-3 d-flex flex-column justify-content-center align-items-center" style="width: 100%; height: 100%;">
                                <i style="font-size: 2.7rem; color: #f8f8f8" class="gi gi-pelamar-green mb-1"></i>
                                <small>TOTAL HIRED</small>
                                <h4 style="font-size: 1.8rem;">0</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card bg-green text-light card-hipipe pt-3 d-flex flex-column justify-content-center align-items-center" style="width: 100%; height: 100%;">
                                <i style="font-size: 2.7rem;" class="gi gi-job-white mb-1"></i>
                                <small>HIRED BY PERSONAL AREA</small>
                                <h4 style="font-size: 1.8rem;">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card card-hipipe">
                            <div class="card-header bg-white">
                                <label for="" style="color: #828282; font-weight: 600; font-size: .8rem;">HIRED BY EDUCATION</label> <br>
                                <label for="" style="color: #0B1354; font-weight: 600; font-size: 1.7rem;">5.999,99</label>
                            </div>

                            <div class="card-body d-flex flex-column justify-content-center align-items-center" style="max-height: 100%; padding: 1rem;">
                                <canvas id="myDonutChart" style="width: 100%; max-width: 400px; height: 155px;"></canvas>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-4">
                    <div class="col-md-6">
                        <h4>Job Order Data</h4>
                    </div>
                    <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="dropdown col-md-4">
                            <button class="btn btn-white-outline" style="width: 100%;" data-bs-toggle="dropdown" aria-expanded="false" type="button">
                                <i class="bi bi-bar-chart-fill me-2"></i> Columns
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="form-check dropdown-item" style="padding-left: 40px;" onclick="toggleCheckbox(this)">
                                        <input class="form-check-input" type="checkbox" id="selectAll" onchange="toggleCheckboxes(this)">
                                        <label class="lbl-s" for="selectAll">Select All</label>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <div class="form-check dropdown-item" style="padding-left: 40px;" onclick="toggleCheckbox(this)">
                                        <input class="form-check-input" type="checkbox" id="tipeJO" onchange="updateHeaderCheckbox()">
                                        <label class="lbl-s" for="tipeJO">Tipe JO</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check dropdown-item" style="padding-left: 40px;" onclick="toggleCheckbox(this)">
                                        <input class="form-check-input" type="checkbox" id="createJO" onchange="updateHeaderCheckbox()">
                                        <label class="lbl-s" for="createJO">Create JO</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check dropdown-item" style="padding-left: 40px;" onclick="toggleCheckbox(this)">
                                        <input class="form-check-input" type="checkbox" id="layanan" onchange="updateHeaderCheckbox()">
                                        <label class="lbl-s" for="layanan">Layanan</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check dropdown-item" style="padding-left: 40px;" onclick="toggleCheckbox(this)">
                                        <input class="form-check-input" type="checkbox" id="lokasi" onchange="updateHeaderCheckbox()">
                                        <label class="lbl-s" for="lokasi">Lokasi</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check dropdown-item" style="padding-left: 40px;" onclick="toggleCheckbox(this)">
                                        <input class="form-check-input" type="checkbox" id="status" onchange="updateHeaderCheckbox()">
                                        <label class="lbl-s" for="status">Status</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check dropdown-item" style="padding-left: 40px;" onclick="toggleCheckbox(this)">
                                        <input class="form-check-input" type="checkbox" id="jobFamily" onchange="updateHeaderCheckbox()">
                                        <label class="lbl-s" for="jobFamily">Job Family</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check dropdown-item" style="padding-left: 40px;" onclick="toggleCheckbox(this)">
                                        <input class="form-check-input" type="checkbox" id="subJobFamily" onchange="updateHeaderCheckbox()">
                                        <label class="lbl-s" for="subJobFamily">Sub Job Family</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check dropdown-item" style="padding-left: 40px;" onclick="toggleCheckbox(this)">
                                        <input class="form-check-input" type="checkbox" id="hiring" onchange="updateHeaderCheckbox()">
                                        <label class="lbl-s" for="hiring">Hiring</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        

                        <div class="dropdown col-md-4">
                            <button class="btn bg-green text-light" style="width: 100%;" data-bs-toggle="dropdown" aria-expanded="false" type="button"><i class="gi gi-export"></i> Export</button>
                          
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" style="font-size: .9rem; color: #41806D;" href="#"><i class="gi gi-export-green"></i> CSV</a></li>
                              <li><a class="dropdown-item" style="font-size: .9rem; color: #41806D;" href="#"><i class="gi gi-export-green"></i> Excel 95+</a></li>
                              <li><a class="dropdown-item" style="font-size: .9rem; color: #41806D;" href="#"><i class="gi gi-export-green"></i> Excel 2007+</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
                <div class="row mt-3 px-2">
                    <div class="table-wrapper">
                        <table class="table bg-white table-bordered border mt-2 text-center" style="font-size: 14px;">
                            <thead class="align-middle" style="height: 3rem">
                                <tr>
                                    <th>
                                        
                                    </th>
                                    <th>Nama</th>
                                    <th>Jabatan (SAP)</th>
                                    <th>Job Family</th>
                                    <th>Sub Job Family</th>
                                    <th>Perner</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle" style="height: 5rem">
                                    <td>1</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td><span class="p-approval">approved</span></td>
                                </tr>
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
    
    function toggleCheckboxes(selectAllCheckbox) {
        // Ambil semua checkbox dengan class 'form-check-input'
        const checkboxes = document.querySelectorAll('.form-check-input:not(#selectAll)');
    
        // Atur semua checkbox sesuai dengan status checkbox "Select All"
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    }
    
    function updateHeaderCheckbox() {
        const checkboxes = document.querySelectorAll('.form-check-input:not(#selectAll)');
        const selectAllCheckbox = document.getElementById('selectAll');
        
        // Periksa apakah semua checkbox tercentang
        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
        selectAllCheckbox.checked = allChecked;
    }


    var ctx = document.getElementById('myDonutChart').getContext('2d');
    var myDonutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Elementary School', 
                'Junior High School', 
                'Senior High School', 
                'Associate Degree', 
                'Bachelor Degree', 
                'Master Degree', 
                'Doctoral Degree'
            ],
            datasets: [{
                data: [10, 15, 20, 10, 25, 10, 10],  // Sample data values
                backgroundColor: [
                    '#A51B00',  // Red for Elementary School
                    '#3B625A',  // Green for Junior High School
                    '#006DDA',  // Blue for Senior High School
                    '#F7E641',  // Yellow for Associate Degree
                    '#FF8E00',  // Orange for Bachelor Degree
                    '#BFBFBF',  // Gray for Master Degree
                    '#404040'   // Black for Doctoral Degree
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,  // Important for customizing the height and width
            plugins: {
                legend: {
                    position: 'right',  // Legend on the right
                    labels: {
                        boxWidth: 20,  // Adjust box size
                        padding: 8,   // Padding around the labels
                    }
                },
                tooltip: {
                    enabled: true
                }
            },
            layout: {
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                    right: 0
                }
            }
        }
    });
    </script>
    