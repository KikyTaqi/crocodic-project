<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/popper.min.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    

    <!-- <title>Jobs</title> -->
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap'); */

        
        .table {
            --bs-table-bg: #EBFCEC;
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: #ffff;
            width: 100%;
        }


        #jobsTable tr {
            height: 64px;
        }

        .no-job {
            max-width: 120px !important;
            width: 120px !important;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .data-info {
            font-size: 14px;
            margin-top: 10px;
            color: #6c757d;
        }

        .btn-clear {
            background: none;
            border: solid #0056b3 1px;
            color: #007bff;
            cursor: pointer;
            padding: 0;
            margin-left: 10px;
            text-decoration: none;
            height: 100%;
        }

        .btn-clear:hover {
            color: #0056b3;
        }

        .name-job{
            color: #333333;
            text-decoration: none;
        }
        .dropdown-menu.drp-down {
            position: relative; /* Ensure positioning context */
        }

        .dropdown-menu.drp-down::after {
            content: '';
            position: absolute;
            top: -20px; /* Sesuaikan sesuai kebutuhan */
            right: 4px; /* Sesuaikan sesuai kebutuhan */
            border-width: 10px; /* Ukuran segitiga */
            border-style: solid;
            border-color: transparent transparent white transparent; /* Sesuaikan warna sesuai kebutuhan */
        }

        .pagination-container {
            display: flex;
            justify-content: space-between; /* Membuat jarak antara kedua elemen */
            align-items: center; /* Menjaga kedua elemen tetap sejajar secara vertikal */
            margin-top: 20px; /* Tambahkan margin jika perlu */
        }

        input[type="search"]::-webkit-search-decoration,
        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-results-button,
        input[type="search"]::-webkit-search-results-decoration { display: none; }

    </style>
</head>
<body>
    
    @include('header')

    <div class="card px-5 mt-3" style="background: transparent; border:0">
        <form action="/jobs/cari" method="get">
            <div class="row mb-3">
                <div class="col-md-3 mb-2">
                    <div class="search-box" style="width: 100%">
                        <input style="height: 50px; width: 100%; padding-right: 5rem;" name="cari" type="search" id="searchBox" class="form-control white-theme search-input" placeholder="Search..">
                        <i class="bi bi-search search-icon-lg"></i>
                        <input type="submit" class="search-submit-lg px-3" value="Cari">
                    </div>
                </div>
                <div class="col-md-1 mb-2" style="width: 160px">
                    <a href="/jobs" style="height: 48px; padding-top: 10px; background-color: transparent; color: black; border-radius: 10px" type="button" class="btn">Hapus Filter</a>
                </div>
                <div class="col-md-2 mb-2">
                    <select style="height: 50px;" id="jobNameFilter" name="jo_creator" class="form-select white-theme">
                        <option value="">Job Creator</option>
                        <?php
                        
                        $jobsArray = $job_list->toArray();
                        
                        $uniqueJobs = array_unique(array_column($jobsArray, 'nama_job'));
                        ?>
                        @foreach($uniqueJobs as $job)
                            <option value="{{$job}}">{{$job}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-2" style="width: 150px;">
                    <select style="height: 50px;" id="locationFilter" name="location" class="form-select white-theme">
                        <option value="">Location</option>
                        <?php
                            $uniqueLocations = array_unique(array_column($jobsArray, 'lokasi'));
                        ?>
                        @foreach($uniqueLocations as $location)
                            <option value="{{$location}}">{{$location}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 mb-2" style="width: 150px">
                    <select style="height: 50px;" id="statusFilter" name="status" class="form-select white-theme">
                        <option value="">Status</option>
                        <option value="0">Pending</option>
                        <option value="1">Approved</option>
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <a href="/jobs/add" style="width: 200px; height: 48px; padding-top: 10px; background-color: #81B29A; color: #FFFFFF; border-radius: 10px" type="button" class="btn"><i class="bi bi-plus"> </i> Create New Job</a>
                </div>
            </div>
        </form>

        <div class="card mb-3" style="max-width: 100%; background: transparent; border: 0">
            <div class="table-responsive mx-1 my-1">
                <table id="jobsTable" class="table custom-table table-bordered table-striped">
                    <thead>
                        <tr style="font-size: 14px;" class="align-middle">
                            <th data-sort="posisi" class="sort-asc-1" style="width: 150px; background: white !important;">Posisi</th>
                            <th class="no-job" style="background: white !important; min-width: 100px;">No JOB</th>
                            <th data-sort="lokasi" class="sort-asc-2" style="width: 160px; background: white !important;">Lokasi</th>
                            <th style="width: 110px; background: white !important;" class="text-center">Total Kebutuhan</th>
                            <th class="text-center" style="color: #18554F; background: #DCF7E1 !important;">Screening</th>
                            <th class="text-center" style="color: #18554F; background: #C1E7CD !important;">Psikotest</th>
                            <th class="text-center" style="color: #18554F; background: #A5D0B7 !important;">Interview HR</th>
                            <th class="text-center" style="color: #18554F; background: #81B29A !important;">Interview User</th>
                            <th class="text-center" style="color: #FFFFFF; background: #5E9982 !important;">Peralihan</th>
                            <th class="text-center" style="color: #FFFFFF; background: #41806D !important;">Reject</th>
                            <th class="text-center" style="color: #FFFFFF; background: #29675B !important;">Hiring</th>
                            <th style="background: white !important; width: 48px"></th>
                        </tr>
                    </thead>
                    <tbody id="myTable" class="align-middle">
                    @if($jobs->isEmpty())
                        <tr id="noDataRow">
                            <td colspan="12" class="text-center">Data tidak ada.</td>   
                        </tr>
                    @else
                        @foreach($jobs as $j)
                            <tr>
                                <td style="cursor: pointer;" onclick="detailJob({{$j->id_job}})"><a class="name-job">{{$j->nama_job}}</a></td>
                                <td>{{$j->nomor_job}}</td>
                                <td>{{$j->lokasi}}</td>
                                <td class="text-center">{{$j->total_butuh}}</td>
                                <td class="text-center">{{ $j->candidates()->where('status', 0)->count() }}</td>
                                <td class="text-center">{{ $j->candidates()->where('status', 1)->count() }}</td>
                                <td class="text-center">{{ $j->candidates()->where('status', 2)->count() }}</td>
                                <td class="text-center">{{ $j->candidates()->where('status', 3)->count() }}</td>
                                <td class="text-center">{{ $j->candidates()->where('status', 4)->count() }}</td>
                                <td class="text-center">{{ $j->candidates()->where('status', 5)->count() }}</td>
                                <td class="text-center">{{ $j->candidates()->where('status', 6)->count() }}</td>
                                <td class="text-center">
                                    @if($j->status !== 1)
                                        <div class="dropdown">
                                            <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('assets/plus.svg') }}" alt="">
                                            </a>
                                            <ul class="dropdown-menu drp-down text-green">
                                                <li><a class="dropdown-item" href="/jobs/edit/{{$j->id_job}}"><i class="bi bi-pencil-fill me-2"></i> Edit</a></li>
                                                <li><a href="#" onclick="submitDuplicateForm({{ $j->id_job }}); return false;" class="dropdown-item"><i class="bi bi-copy me-2"></i> Duplicate</a></li>
                                                <li><a onclick="submitDeleteForm({{ $j->id_job }}); return false;" class="dropdown-item" href="#"><i class="bi bi-trash me-2"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    @else
                                        <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('assets/approve.svg') }}" alt="">
                                        </a>
                                        <ul class="dropdown-menu drp-down text-green">
                                            <li><a class="dropdown-item" href="/jobs/edit/{{$j->id_job}}"><i class="bi bi-pencil-fill me-2"></i> Edit</a></li>
                                            <li><a href="#" onclick="submitDuplicateForm({{ $j->id_job }}); return false;" class="dropdown-item"><i class="bi bi-copy me-2"></i> Duplicate</a></li>
                                            <li><a onclick="submitDeleteForm({{ $j->id_job }}); return false;" class="dropdown-item" href="#"><i class="bi bi-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>


                <div class="pagination-container">
                    <div class="data-info">
                        Menampilkan {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} dari {{ $jobs->total() }} data
                    </div>
    
                    <div class="pagination">
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
            

        </div>


    </div>

    <form id="duplicateForm" method="POST" action="/jobs/duplicate">
        <!-- Pastikan untuk menambahkan token CSRF jika menggunakan Laravel atau framework lain -->
        @csrf
        <input type="hidden" name="id_job" id="duplicateJobId">
    </form>

    <form id="deleteForm" method="POST" action="/jobs/delete">
        <!-- Token CSRF jika diperlukan -->
        @csrf
        <input type="hidden" name="id_job" id="deleteJobId">
    </form>

    <script>

        function submitDuplicateForm(idJob) {
            // Set ID pekerjaan di formulir tersembunyi untuk duplikasi
            document.getElementById('duplicateJobId').value = idJob;
            // Kirim formulir
            document.getElementById('duplicateForm').submit();
        }

        function submitDeleteForm(idJob) {
            // Set ID pekerjaan di formulir tersembunyi untuk penghapusan
            document.getElementById('deleteJobId').value = idJob;
            // Kirim formulir
            document.getElementById('deleteForm').submit();
        }

        function detailJob(id){
            window.location.href = '/jobs/detail/'+id;
        }


        // Sorting
        const table = document.getElementById('jobsTable');
        const headers = table.querySelectorAll('th[data-sort]');
        const rows = Array.from(table.querySelector('tbody').rows);

        headers.forEach(header => {
            header.addEventListener('click', () => {
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
                applyFilters(); // Re-apply filters after sorting
            });
        });
    </script>

</body>
</html>
