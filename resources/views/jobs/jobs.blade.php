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

        .data-info {
            font-size: 14px;
            margin-top: 10px;
            color: #6c757d;
        }

        .btn-clear {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            padding: 0;
            margin-left: 10px;
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
    </style>
</head>
<body>
    
    @include('header')

    <div class="card px-5 mt-3" style="background: transparent; border:0">
        <div class="row mb-3">
            <div class="col-md-3 mb-2">
            <div class="search-box">
                <input style="height: 50px; width: 48vh" type="text" id="searchBox" class="form-control white-theme search-input" placeholder="Search..">
                <i class="bi bi-search search-icon-lg"></i>
            </div>
            </div>
            <div class="col-md-1 mb-2" style="width: 160px">
                <button class="btn-clear pt-3" style="color: #333333" onclick="clearFilters()">Hapus Filter</button>
            </div>
            <div class="col-md-2 mb-2">
                <select style="height: 50px;" id="jobNameFilter" class="form-select white-theme">
                    <option value="">Job Creator</option>
                    <?php
                    
                    $jobsArray = $jobs->toArray();
                    
                    $uniqueJobs = array_unique(array_column($jobsArray, 'nama_job'));
                    ?>
                    @foreach($uniqueJobs as $job)
                        <option value="{{$job}}">{{$job}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mb-2" style="width: 150px;">
                <select style="height: 50px;" id="locationFilter" class="form-select white-theme">
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
                <select style="height: 50px;" id="statusFilter" class="form-select white-theme">
                    <option value="">Status</option>
                    <option value="0">Pending</option>
                    <option value="1">Approved</option>
                </select>
            </div>
            <div class="col-md-2 mb-2">
                <a href="/jobs/add" style="width: 200px; height: 48px; padding-top: 10px; background-color: #81B29A; color: #FFFFFF; border-radius: 10px" type="button" class="btn"><i class="bi bi-plus"> </i> Create New Job</a>
            </div>
        </div>

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
                    @foreach($jobs as $j)
                        <tr>
                            <td><a class="name-job" href="jobs/detail/{{$j->id_job}}">{{$j->nama_job}}</a></td>
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
                                @if($j->status === 0)
                                <div class="dropdown">
                                    <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('assets/plus.svg') }}" alt="">
                                    </a>
                                    <ul class="dropdown-menu drp-down">
                                        <li><a class="dropdown-item" href="/jobs/edit/{{$j->id_job}}"><i class="bi bi-pencil-fill me-2"></i> Edit</a></li>
                                        <li><a href="#" onclick="submitDuplicateForm({{ $j->id_job }}); return false;" class="dropdown-item"><i class="bi bi-copy me-2"></i> Duplicate</a></li>
                                        <li><a onclick="submitDeleteForm({{ $j->id_job }}); return false;" class="dropdown-item" href="#"><i class="bi bi-trash me-2"></i> Delete</a></li>
                                    </ul>
                                </div>

                                @else
                                <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('assets/approve.svg') }}" alt="">
                                    </a>
                                    <ul class="dropdown-menu drp-down">
                                        <li><a class="dropdown-item" href="/jobs/edit/{{$j->id_job}}"><i class="bi bi-pencil-fill me-2"></i> Edit</a></li>
                                        <li><a href="#" onclick="submitDuplicateForm({{ $j->id_job }}); return false;" class="dropdown-item"><i class="bi bi-copy me-2"></i> Duplicate</a></li>
                                        <li><a onclick="submitDeleteForm({{ $j->id_job }}); return false;" class="dropdown-item" href="#"><i class="bi bi-trash me-2"></i> Delete</a></li>
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="data-info">Menampilkan <span id="startRow">1</span>-<span id="endRow">5</span> dari {{ $jobs->count() }} item.</div>
                    <ul class="pagination float-end"></ul>
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

        $('#searchBox').on('input', function() {
            var searchText = $(this).val().trim();
            
            if (searchText === '') {
                $('#noDataRow').remove();
            }
        });

        $(document).ready(function() {
            $('#locationFilter, #jobNameFilter, #statusFilter').change(function() {
                if ($('#locationFilter').val() === '' || $('#jobNameFilter').val() === '' || $('#statusFilter').val() === '') {
                    $('#noDataRow').remove();
                }
            });
        });

        function paginate(filteredRows) {
            var rowsShown = 5;
            var rowsTotal = filteredRows.length;
            var numPages = Math.ceil(rowsTotal / rowsShown);
            var $pagination = $('.pagination');
            $pagination.empty();
            $pagination.append('<li id="prevPage" class="disabled"><i class="bi bi-chevron-left me-2"></i> Previous</li>');

            for (var i = 1; i <= numPages; i++) {
                $pagination.append('<li>' + i + '</li>');
            }

            $pagination.append('<li id="nextPage">Next <i class="bi bi-chevron-right ms-2"></i></li>');

            function showPage(pageNum) {
                var startItem = (pageNum - 1) * rowsShown;
                var endItem = startItem + rowsShown;
                filteredRows.hide().slice(startItem, endItem).show();
                updateDataInfo(startItem, Math.min(endItem, rowsTotal), rowsTotal);

                $pagination.find('li').not('#prevPage, #nextPage').hide();
                for (var i = Math.max(1, pageNum - 1); i <= Math.min(numPages, pageNum + 1); i++) {
                    $pagination.find('li').eq(i).show();
                }

                $('#prevPage').toggleClass('disabled', pageNum === 1);
                $('#nextPage').toggleClass('disabled', pageNum === numPages);
            }

            $pagination.find('li:not(#prevPage, #nextPage)').on('click', function() {
                var currPage = parseInt($(this).text());
                $pagination.find('li').removeClass('active');
                $(this).addClass('active');
                showPage(currPage);
            });

            $('#prevPage').on('click', function() {
                var currPage = parseInt($pagination.find('li.active').text());
                if (currPage > 1) {
                    showPage(currPage - 1);
                    $pagination.find('li').removeClass('active');
                    $pagination.find('li').eq(currPage - 1).addClass('active');
                }
            });

            $('#nextPage').on('click', function() {
                var currPage = parseInt($pagination.find('li.active').text());
                if (currPage < numPages) {
                    showPage(currPage + 1);
                    $pagination.find('li').removeClass('active');
                    $pagination.find('li').eq(currPage + 1).addClass('active');
                }
            });

            showPage(1); // Initialize to show first page
            $pagination.find('li').eq(1).addClass('active');
        }

        function updateDataInfo(start, end, total) {
            $('.data-info').text('Menampilkan ' + (start + 1) + '-' + end + ' dari ' + total + ' item.');
        }

        function applyFilters() {
            var searchValue = $("#searchBox").val().toLowerCase();
            var jobNameValue = $("#jobNameFilter").val().toLowerCase();
            var locationValue = $("#locationFilter").val().toLowerCase();
            var statusValue = $("#statusFilter").val().toLowerCase();

            console.log("Applying filters with values: ", {
                searchValue,
                jobNameValue,
                locationValue,
                statusValue
            });

            var filteredRows = $("#myTable tr").filter(function() {
                var text = $(this).text().toLowerCase();
                var jobName = $(this).find('td:eq(0)').text().toLowerCase();
                var location = $(this).find('td:eq(2)').text().toLowerCase();
                var status = $(this).find('td:last img').attr('src').includes('approve') ? '1' : '0';
                return (text.indexOf(searchValue) > -1) && 
                    (jobName.indexOf(jobNameValue) > -1 || jobNameValue === "") && 
                    (location.indexOf(locationValue) > -1 || locationValue === "") && 
                    (status.indexOf(statusValue) > -1 || statusValue === "");
            });

            console.log("Filtered rows count: ", filteredRows.length);

            $('#myTable tr').hide(); // Hide all rows first

            $('#noDataRow').remove(); // Ensure any existing "No data found" row is removed

            if (filteredRows.length === 0) {
                var noDataRow = $('<tr id="noDataRow"><td colspan="12" class="text-center">Tidak ada data yang cocok dengan pencarian.</td></tr>');
                $('#myTable').append(noDataRow);
            } else {
                $('#noDataRow').remove(); // Ensure the "No data found" row is removed if there are results
                paginate(filteredRows); // Paginate filtered rows
            }
        }

        function clearFilters() {
            $("#searchBox").val('');
            $("#jobNameFilter").val('');
            $("#locationFilter").val('');
            $("#statusFilter").val('');
            $('#noDataRow').remove(); // Remove "No data found" row
            applyFilters();
        }

        $("#searchBox, #jobNameFilter, #locationFilter, #statusFilter").on("keyup change", function() {
            applyFilters();
        });

        $("#clearFiltersBtn").on("click", function() {
            clearFilters();
        });

        // Initial pagination setup
        paginate($("#myTable tr"));

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
