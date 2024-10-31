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

    <title>Resign</title>
</head>
<body style="background: #f8f8f8">
    @include('header')

    <div class="mx-4 my-3">

        <div class="row mb-3 mt-4">
            <h5>Resign</h5>
        </div>

        <div class="row mb-2">
            <div class="col-md">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <div class="dropdown">
                        <button class="btn bg-green text-light" style="width: 100%;" data-bs-toggle="dropdown" aria-expanded="false" type="button"><i class="gi gi-export"></i> Export</button>
                      
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li><a class="dropdown-item" style="font-size: .9rem; color: #41806D;" href="#"><i class="gi gi-export-green"></i> CSV</a></li>
                          <li><a class="dropdown-item" style="font-size: .9rem; color: #41806D;" href="#"><i class="gi gi-export-green"></i> Excel 95+</a></li>
                          <li><a class="dropdown-item" style="font-size: .9rem; color: #41806D;" href="#"><i class="gi gi-export-green"></i> Excel 2007+</a></li>
                        </ul>
                    </div>
                    <a id="btn-cancel-join" class="btn btn-green-outline px-4 py-2" style="font-size: smaller; font-weight: 600;" type="button" >Create</a>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
  Tooltip on top
</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="tblHiring" class="table bg-white table-bordered border" style="font-size: 14px;">
                <thead class="align-middle" style="height: 3rem">
                    <tr>
                        <th>
                            
                        </th>
                        <th>Perner</th>
                        <th>Name</th>
                        <th>Resign</th>
                        <th>Alasan Resign</th>
                        <th>Tags</th>
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
                        <td class="text-center px-2">
                            {{$i}}
                        </td>
                        <td>{{$perner++}}</td>
                        <td>Agus Hermawan</td>
                        <td>29-09-23</td>
                        <td>Layanan Tutup/Pengurangan</td>
                        <td>BULUKUMBA</td>
                        <td class="text-center py-2">
                            <div class="tag-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></div>
                        </td>
                    </tr>

                    @endfor

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
