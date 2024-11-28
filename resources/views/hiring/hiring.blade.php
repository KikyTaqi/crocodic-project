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

    <style>
        .border tr {
            border-right: transparent 0 solid !important;
        }

        .border th:last-child,
        .border td:last-child {
            border-right: 1px solid #dee2e6; /* Atur warna dan ketebalan sesuai kebutuhan */
        }

        .link-normal{
            text-decoration: none;
            color: black;
        }

    </style>

    <title>Hiring</title>
</head>
<body style="background: #f8f8f8">
    @include('header')

    <div class="mx-4 my-3">

        <div class="row mb-3 mt-4">
            <h5>Ready to Hiring</h5>
        </div>

        <div class="row mb-2">
            <div class="col-md mb-2">
                <div class="search-box">
                    <input onkeyup="scrFilter()" style="height: 50px; width: 450px;" type="text" id="searchBox" class="form-control white-theme search-input" placeholder="Search..">
                    <i class="bi bi-search search-icon-lg"></i>
                </div>
            </div>
            <div class="col-md">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/hiring/report" class="btn btn-white-outline" type="button"><i class="bi bi-bar-chart-fill"></i> Report Hiring</a>
                    <a id="btn-cancel-join" class="btn btn-green-outline" type="button"><span class="badge bg-green me-1">0</span> Cancel Join</a>
                    <a id="btn-request-hiring" class="btn bg-green text-light" type="button"><span class="badge bg-light text-dark me-1">0</span> Request Hiring</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="tblHiring" class="table bg-white table-bordered border" style="font-size: 14px;">
                <thead class="align-middle" style="height: 3rem">
                    <tr>
                        <th>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="checkbox" id="headerCheckbox" onchange="toggleCheckboxes(this)">
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Profile</th>
                        <th>No Job</th>
                        <th>Posisi</th>
                        <th>Lokasi</th>
                        <th>Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle" style="height: 3rem">
                        <td>
                            <div class="form-check ms-2">
                                <input class="form-check-input rowCheckbox" type="checkbox" onchange="updateHeaderCheckbox()">
                            </div>
                        </td>
                        <td>Ainul Mumbait</td>
                        <td><span class="percent">100%</span></td>
                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#no-jo" class="link-normal">029861/ISH/01010107/2023</a></td>
                        <td>HUNTER NOO</td>
                        <td>BULUKUMBA</td>
                        <td>JOYDAY HUNTER GT ISH</td>
                    </tr>
                    <tr class="align-middle" style="height: 3rem">
                        <td>
                            <div class="form-check ms-2">
                                <input class="form-check-input rowCheckbox" type="checkbox" onchange="updateHeaderCheckbox()">
                            </div>
                        </td>
                        <td>ACHMAD MAULANA ONKY PRADANA</td>
                        <td><span class="percent">100%</span></td>
                        <td>029861/ISH/01010107/2023</td>
                        <td>CONSUMER ACCOUNT MANAGER</td>
                        <td>PASURUAN</td>
                        <td>CAM TELKOMSEL A3 BALNUS</td>
                    </tr>
                    <tr class="align-middle" style="height: 3rem">
                        <td>
                            <div class="form-check ms-2">
                                <input class="form-check-input rowCheckbox" type="checkbox" onchange="updateHeaderCheckbox()">
                            </div>
                        </td>
                        <td>M Ikhwan Arif</td>
                        <td><span class="percent">90%</span></td>
                        <td>029168/ISH/01010107/2023</td>
                        <td>HUNTER NOO</td>
                        <td>PASURUAN</td>
                        <td>JOYDAY HUNTER GT ISH</td>
                    </tr>
                    <tr class="align-middle" style="height: 3rem">
                        <td>
                            <div class="form-check ms-2">
                                <input class="form-check-input rowCheckbox" type="checkbox" onchange="updateHeaderCheckbox()">
                            </div>
                        </td>
                        <td>Nighara Asmarantaka Sulya</td>
                        <td><span class="percent">80%</span></td>
                        <td>029758/ISH/01010107/2023</td>
                        <td>CONSUMER ACCOUNT MANAGER</td>
                        <td>SURAKARTA</td>
                        <td>CAM TELKOMSEL A3 JATENG</td>
                    </tr>
                </tbody>
            </table>
        </div>

        
        <div class="modal fade" id="no-jo" tabindex="-1" aria-labelledby="no-jo" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Recruitment Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>ID</td>
                                    <td>2757</td>
                                </tr>
                                <tr>
                                    <td>No Job Order</td>
                                    <td>029399/ISH/01010107/2023</td>
                                </tr>
                                <tr>
                                    <td>Job Function</td>
                                    <td>PROMOTERS</td>
                                </tr>
                                <tr>
                                    <td>Type JO</td>
                                    <td>Replacement</td>
                                </tr>
                                <tr>
                                    <td>Project</td>
                                    <td>Electrolux ISH</td>
                                </tr>
                                <tr>
                                    <td>Lama Project</td>
                                    <td>1 Bulan</td>
                                </tr>
                                <tr>
                                    <td>Perner Replaced</td>
                                    <td>228499</td>
                                </tr>
                                <tr>
                                    <td>Due Date JO</td>
                                    <td>2024-01-04</td>
                                </tr>
                                <tr>
                                    <td>Approved JO</td>
                                    <td>2023-12-29 17:48:48</td>
                                </tr>
                                <tr>
                                    <td>Over Due JO</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>Surabaya</td>
                                </tr>
                                <tr>
                                    <td>Kontrak</td>
                                    <td>Kemitraan</td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Kebutuhan</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><span class="p-on_process">ON PROGRESS</span></td>
                                </tr>
                                <tr>
                                    <td>Personal Area (SAP)</td>
                                    <td>SURABAYA-I104</td>
                                </tr>
                                <tr>
                                    <td>Area (SAP)</td>
                                    <td>BPO_Kemitraan-KQ</td>
                                </tr>
                                <tr>
                                    <td>Skill Layanan (SAP)</td>
                                    <td>ELECTROLUX ISH-SBY-DT</td>
                                </tr>
                                <tr>
                                    <td>Payroll Area (SAP)</td>
                                    <td>PROMOTERS-23001001</td>
                                </tr>
                                <tr>
                                    <td>Jabatan (SAP)</td>
                                    <td>LEVEL 2-14</td>
                                </tr>
                                <tr>
                                    <td>Level (SAP)</td>
                                    <td>LEVEL 2-14</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td colspan="2">Detail Schema</td>
                                </tr>
                                <tr>
                                    <td>Komponen</td>
                                    <td>Value</td>
                                </tr>
                                <tr>
                                    <td>Gaji Pokok</td>
                                    <td>3,800,536</td>
                                </tr>
                                <tr>
                                    <td>Tunjangan Tetap</td>
                                    <td>1,266,845</td>
                                </tr>
                                <tr>
                                    <td>Tunjangan Performance</td>
                                    <td>152,021</td>
                                </tr>
                                <tr>
                                    <td>MFEE FIXED COST</td>
                                    <td>8</td>
                                </tr>
                                <tr>
                                    <td>Uang Kompensasi</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>THR</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>BPJS TK Perusahaan</td>
                                    <td>316,205</td>
                                </tr>
                                <tr>
                                    <td>BPJS TK Karyawan</td>
                                    <td>152,021</td>
                                </tr>
                                <tr>
                                    <td>BPJS Kesehatan Perusahaan</td>
                                    <td>253,393</td>
                                </tr>
                                <tr>
                                    <td>BPJS Kesehatan Karyawan</td>
                                    <td>0</td>
                                </tr>
                            </table>
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
    function toggleCheckboxes(headerCheckbox) {
        const rowCheckboxes = document.querySelectorAll('.rowCheckbox');
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = headerCheckbox.checked;
        });
        updateBadgeCounts(); // Update badge counts whenever checkboxes are toggled
    }

    function updateHeaderCheckbox() {
        const headerCheckbox = document.getElementById('headerCheckbox');
        const rowCheckboxes = document.querySelectorAll('.rowCheckbox');
        const allChecked = Array.from(rowCheckboxes).every(checkbox => checkbox.checked);
        const anyChecked = Array.from(rowCheckboxes).some(checkbox => checkbox.checked);

        headerCheckbox.checked = allChecked;
        headerCheckbox.indeterminate = !allChecked && anyChecked;

        updateBadgeCounts(); // Update badge counts whenever header checkbox changes
    }

    function scrFilter() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchBox");
        filter = input.value.toUpperCase();
        table = document.getElementById("tblHiring");
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

        updateBadgeCounts(); // Update badge counts after filtering
    }

    function updateBadgeCounts() {
        const rowCheckboxes = document.querySelectorAll('.rowCheckbox');
        let checkedCount = 0;

        rowCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                checkedCount++;
            }
        });

        document.querySelector('#btn-cancel-join .badge').textContent = checkedCount;
        document.querySelector('#btn-request-hiring .badge').textContent = checkedCount;
    }
</script>
