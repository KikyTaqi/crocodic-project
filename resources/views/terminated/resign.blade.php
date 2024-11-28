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

        .custom-offcanvas {
        width: 500px;
        }

        /* Atau, lebar responsif berdasarkan viewport */
        @media (min-width: 768px) {
        .custom-offcanvas {
            width: 600px;
        }
        }

        @media (min-width: 1200px) {
        .custom-offcanvas {
            width: 800px;
        }
        }

        .offcanvas-header{
            border-bottom: #ebebeb solid 2px;
        }
    </style>

    <title>Resign</title>
</head>
<body style="background: #f8f8f8">
    @include('header')

    <div class="mx-4 my-3">

        <div class="row mt-4 mb-2">
            <div class="col-md">
                <h5>Resign</h5>
            </div>
            <div class="col-md">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <div class="dropdown">
                        <button class="btn bg-green text-light px-3" style="width: 100%;" data-bs-toggle="dropdown" aria-expanded="false" type="button"><i class="gi gi-export"></i> <small>Export</small></button>
                      
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li><a class="dropdown-item" style="font-size: .9rem; color: #41806D;" href="#"><i class="gi gi-export-green"></i> CSV</a></li>
                          <li><a class="dropdown-item" style="font-size: .9rem; color: #41806D;" href="#"><i class="gi gi-export-green"></i> Excel 95+</a></li>
                          <li><a class="dropdown-item" style="font-size: .9rem; color: #41806D;" href="#"><i class="gi gi-export-green"></i> Excel 2007+</a></li>
                        </ul>
                    </div>
                    <a id="btn-cancel-join" class="btn btn-green-outline px-4 py-2" style="font-size: smaller; font-weight: 600;" type="button" >Create</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="tblResign" class="table bg-white table-bordered border" style="font-size: 14px;">
                <thead class="align-middle" style="height: 3rem">
                    <tr>
                        <th>
                            
                        </th>
                        <th>Perner</th>
                        <th>Name</th>
                        <th>Resign</th>
                        <th>Alasan Resign</th>
                        <th class="text-center">Tags</th>
                        <th>Creator</th>
                        <th>Approver</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $perner = 3000;
                    ?>

                    @for($i = 1; $i < 10; $i++)

                    <tr class="align-middle" style="height: 3rem">
                        <td class="text-center px-3">
                            {{$i}}
                        </td>
                        <td>{{$perner++}}</td>
                        <td>Agus Hermawan</td>
                        <td>29-09-23</td>
                        <td style="max-width: 1vh;">Layanan Tutup / Pengurangan</td>
                        <td class="text-center py-2">
                            <div class="tag-0 mx-auto" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Blacklist"></div>
                        </td>
                        <td>MEZA NURAISYA</td>
                        <td>Fiky Rahadian</td>
                        <td></td>
                        <td style="max-width: 40vh;">
                            <b>Data pekerja sudah tidak ada di SAP atau sudah di resign kan</b><br>
                            Layanan Selesai
                        </td>
                        <td>
                            <div class="dropdown mx-2 my-3">
                                <a style="color: #686868; font-size: 1.5rem;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu drp-down">
                                    <li><a style="color: #41806D; font-size: .9rem;" class="dropdown-item" href="" data-bs-toggle="offcanvas" data-bs-target="#vdetail" aria-controls="offcanvasRight"><i class="bi bi-eye-fill me-2"></i> View Detail</a></li>
                                    <li><a style="color: #41806D; font-size: .9rem;" href="#" class="dropdown-item"><i class="bi bi-pencil-fill me-2"></i> Update</a></li>
                                    <li><a style="color: #41806D; font-size: .9rem;" href="#" class="dropdown-item"><i class="bi bi-trash-fill me-2"></i> Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    @endfor

                </tbody>
            </table>
        </div>

        <div class="offcanvas offcanvas-end custom-offcanvas" tabindex="-1" id="vdetail" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">View Change Cancel Join</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <table class="table table-bordered table-striped" style="font-size: .9rem;">
                    <tr>
                        <td>Perner</td>
                        <td>23035</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>FAHRUDDIN</td>
                    </tr>
                    <tr>
                        <td>No JO</td>
                        <td>029941/ISH/01010107/2023</td>
                    </tr>
                    <tr>
                        <td>Personal Area</td>
                        <td>HAIER INDONESIA ISH</td>
                    </tr>
                    <tr>
                        <td>Area</td>
                        <td>SEMARANG</td>
                    </tr>
                    <tr>
                        <td>Skill Layanan</td>
                        <td>BPO</td>
                    </tr>
                    <tr>
                        <td>Payroll Area</td>
                        <td>HAIER - SMG</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>PROMOTERS</td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>NONE</td>
                    </tr>
                    <tr>
                        <td>Reason</td>
                        <td>Pekerja Mundur</td>
                    </tr>
                    <tr>
                        <td>Cancel Date</td>
                        <td>2023-12-15 14:17:39</td>
                    </tr>
                    <tr>
                        <td>Approval</td>
                        <td>Rahmadita Fitria</td>
                    </tr>
                    <tr>
                        <td>Time Approve</td>
                        <td>2023-12-15 14:17:39</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><span class="p-on_process">on process</span></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td>Waiting for Cancel Join Execution process</td>
                    </tr>
                    <tr>
                        <td>User Remarks</td>
                        <td>baru masuk udh banyak2 izin</td>
                    </tr>
                    <tr>
                        <td>Created By</td>
                        <td>Ayu Setya Wardhani</td>
                    </tr>
                    <tr>
                        <td>Create Time</td>
                        <td>2023-12-15 11:29:45</td>
                    </tr>
                    <tr>
                        <td>Updated Time</td>
                        <td>2023-12-15 11:29:45</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Document</td>
                        <td><a style="font-size: .9rem;" href="" class="btn btn-white-outline"><i class="gi gi-download"></i> Download</a></td>
                    </tr>
                </table>
            </div>
        </div>
        
    </div>
    
</body>
</html>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })

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
