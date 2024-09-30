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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
            <a href="/cancel-join/create" class="btn bg-green text-light px-4">Create</a>
        </div>

        <table class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
            <thead class="align-middle">
                <tr>
                    <?php $no = 1; ?>
                    <th class="text-center" style="height: 48px">#</th>
                    <th style="min-width: 5rem;">Name</th>
                    <th style="max-width: .2rem;">Perner</th>
                    <th style="min-width: 10rem;">No JO</th>
                    <th style="min-width: 8rem;">Cancel Date</th>
                    <th>Created By</ths=>
                    <th>Approver</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th style="min-width: 1rem"></th>
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
                            <input style="height: 50px;" type="text" id="searchBox2" onkeyup="scrFilter2()" class="form-control search-input input-sm" placeholder="Search..">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                    </th>
                    <th>
                        
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
                    <th></th>
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
                        <i class="bi bi-three-dots-vertical"></i>
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
                        <i class="bi bi-three-dots-vertical"></i>
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
                        <i class="bi bi-three-dots-vertical"></i>
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
                        <i class="bi bi-three-dots-vertical"></i>
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
                        <i class="bi bi-three-dots-vertical"></i>
                    </td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
    
</body>
</html>


