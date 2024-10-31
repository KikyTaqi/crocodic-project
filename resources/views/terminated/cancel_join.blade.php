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

                /* Misalnya, lebar Offcanvas menjadi 500px */
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


    <title>Cancel Join</title>
</head>
<body style="background: #f8f8f8">
    @include('header')

    <div class="mx-4 my-3">

        <div class="row mb-3 mt-4">
            <div class="col-md d-flex">
                <h5>Cancel Join</h5>
            </div>
        </div>

        <table class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
            <thead class="align-middle">
                <tr>
                    <?php $no = 1; ?>
                    <th class="text-center" style="height: 48px"></th>
                    <th style="min-width: 5rem;">Name</th>
                    <th style="max-width: .2rem;">Perner</th>
                    <th style="min-width: 10rem;">No JO</th>
                    <th style="min-width: 8rem;">Cancel Date</th>
                    <th style="min-width: 8rem;">Created By</ths=>
                    <th>Approver</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th style="min-width: 1rem"></th>
                </tr>
                <tr id="search-col">
                    <th></th>
                    <th>
                        <div class="search-box">
                            <input style="height: 50px;" type="text" id="searchBox1" onkeyup="scrFilter1()" class="form-control search-input input-sm">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                    </th>
                    <th>
                        <div class="search-box">
                            <input style="height: 50px;" type="text" id="searchBox2" onkeyup="scrFilter2()" class="form-control search-input input-sm">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                    </th>
                    <th>
                        <div class="search-box">
                            <input style="height: 50px;" type="text" id="searchBox2" onkeyup="scrFilter2()" class="form-control search-input input-sm">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                    </th>
                    <th>
                        
                    </th>
                    <th></th>
                    <th>
                        <div class="search-box">
                            <input style="height: 50px;" type="text" id="searchBox5" onkeyup="scrFilter5()" class="form-control search-input input-sm">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                    </th>
                    <th>
                        <div class="search-box">
                            <input style="height: 50px;" type="text" id="searchBox6" onkeyup="scrFilter6()" class="form-control search-input input-sm">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                    </th>
                    <th>
                        <div class="search-box">
                            <input style="height: 50px;" type="text" id="searchBox7" onkeyup="scrFilter7()" class="form-control search-input input-sm">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="align-middle">

                <tr class="text-center">
                    <td style="width: 48px; height: 48px">{{$no++}}</td>
                    <td>FAHRUDDIN</td>
                    <td>23035</td>
                    <td>029941/ISH/01010107/2023</td>
                    <td>08-12-2023</td>
                    <td>Ayu Setya Wardhani</td>
                    <td>Mochammad Nur Zamzami Hirwendi Saprori</td>
                    <td><span class="p-on_process">on process</span></td>
                    <td>
                        Waiting for Cancel Join Execution process
                        Dear PM, Mohon dibantu cancel join perner 230035 an FAHRUDDIN karena ybs mengundurkan diri. Terimakasi
                    </td>
                    <td style="font-size: 1.4rem">
                        <button style="padding: .2rem; height: 2.2rem; width: 2.2rem;" class="btn btn-green mx-2 my-2" data-bs-toggle="offcanvas" data-bs-target="#vdetail" aria-controls="offcanvasRight"><i style="font-size: 1.2rem" class="bi bi-eye-fill"></i></button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td style="width: 48px; height: 48px">{{$no++}}</td>
                    <td>FAHRUDDIN</td>
                    <td>23035</td>
                    <td>029941/ISH/01010107/2023</td>
                    <td>08-12-2023</td>
                    <td>Ayu Setya Wardhani</td>
                    <td>Mochammad Nur Zamzami Hirwendi Saprori</td>
                    <td><span class="p-on_process">on process</span></td>
                    <td>
                        Waiting for Cancel Join Execution process
                        Dear PM, Mohon dibantu cancel join perner 230035 an FAHRUDDIN karena ybs mengundurkan diri. Terimakasi
                    </td>
                    <td style="font-size: 1.4rem">
                        <button style="padding: .2rem; height: 2.2rem; width: 2.2rem;" class="btn btn-green mx-2 my-2" data-bs-toggle="offcanvas" data-bs-target="#vdetail" aria-controls="offcanvasRight"><i style="font-size: 1.2rem" class="bi bi-eye-fill"></i></button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td style="width: 48px; height: 48px">{{$no++}}</td>
                    <td>FAHRUDDIN</td>
                    <td>23035</td>
                    <td>029941/ISH/01010107/2023</td>
                    <td>08-12-2023</td>
                    <td>Ayu Setya Wardhani</td>
                    <td>Mochammad Nur Zamzami Hirwendi Saprori</td>
                    <td><span class="p-on_process">on process</span></td>
                    <td>
                        Waiting for Cancel Join Execution process
                        Dear PM, Mohon dibantu cancel join perner 230035 an FAHRUDDIN karena ybs mengundurkan diri. Terimakasi
                    </td>
                    <td style="font-size: 1.4rem">
                        <button style="padding: .2rem; height: 2.2rem; width: 2.2rem;" class="btn btn-green mx-2 my-2" data-bs-toggle="offcanvas" data-bs-target="#vdetail" aria-controls="offcanvasRight"><i style="font-size: 1.2rem" class="bi bi-eye-fill"></i></button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td style="width: 48px; height: 48px">{{$no++}}</td>
                    <td>FAHRUDDIN</td>
                    <td>23035</td>
                    <td>029941/ISH/01010107/2023</td>
                    <td>08-12-2023</td>
                    <td>Ayu Setya Wardhani</td>
                    <td>Mochammad Nur Zamzami Hirwendi Saprori</td>
                    <td><span class="p-on_process">on process</span></td>
                    <td>
                        Waiting for Cancel Join Execution process
                        Dear PM, Mohon dibantu cancel join perner 230035 an FAHRUDDIN karena ybs mengundurkan diri. Terimakasi
                    </td>
                    <td style="font-size: 1.4rem">
                        <button style="padding: .2rem; height: 2.2rem; width: 2.2rem;" class="btn btn-green mx-2 my-2" data-bs-toggle="offcanvas" data-bs-target="#vdetail" aria-controls="offcanvasRight"><i style="font-size: 1.2rem" class="bi bi-eye-fill"></i></button>
                    </td>
                </tr>
                <tr class="text-center">
                    <td style="width: 48px; height: 48px">{{$no++}}</td>
                    <td>FAHRUDDIN</td>
                    <td>23035</td>
                    <td>029941/ISH/01010107/2023</td>
                    <td>08-12-2023</td>
                    <td>Ayu Setya Wardhani</td>
                    <td>Mochammad Nur Zamzami Hirwendi Saprori</td>
                    <td><span class="p-on_process">on process</span></td>
                    <td>
                        Waiting for Cancel Join Execution process
                        Dear PM, Mohon dibantu cancel join perner 230035 an FAHRUDDIN karena ybs mengundurkan diri. Terimakasi
                    </td>
                    <td style="font-size: 1.4rem">
                        <button style="padding: .2rem; height: 2.2rem; width: 2.2rem;" class="btn btn-green mx-2 my-2" data-bs-toggle="offcanvas" data-bs-target="#vdetail" aria-controls="offcanvasRight"><i style="font-size: 1.2rem" class="bi bi-eye-fill"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
    

    <!-- offcanvas -->

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
</body>
</html>