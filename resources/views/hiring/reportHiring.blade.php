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


    <title>Hiring</title>
</head>
<body style="background: #f8f8f8">
    @include('header')

    <div class="mx-4 my-3">

        <div class="row mb-3 mt-4">
            <div class="col-md d-flex">
                <a class="me-3" href="/hiring"><i class="bi bi-chevron-left"></i></a>
                <h5>Report Hiring</h5>
            </div>
        </div>

        <table class="table bg-white table-bordered">
            <thead class="border">
                <tr style="height: 3rem; font-size: 1rem;" class="align-middle">
                    <th class="text-center"></th>
                    <th><small>Name</small> </th>
                    <th><small>Status</small> </th>
                    <th><small>Req Date</small> </th>
                    <th><small>App Date</small> </th>
                    <th><small>Perner</small> </th>
                    <th><small>PIC</small> </th>
                    <th><small>No Job</small> </th>
                    <th><small>Area SAP</small> </th>
                    <th><small>Jabatan</small> </th>
                    <th><small>Status SAP</small> </th>
                </tr>
            </thead>
            <tbody class="border">
                <?php $no = 1; ?>
                <tr style="height: 4rem; font-size: .9rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td class="text-center"><span class="p-waiting">Waiting</span></td>
                    <td>20/11/2023 20:05</td>
                    <td>20/11/2023 20:05</td>
                    <td>230154</td>
                    <td>Rian</td>
                    <td>029788/ISH/01010107/2023</td>
                    <td>PROBOLINGGO</td>
                    <td>SMD</td>
                    <td>Success</td>
                </tr>
                <tr style="height: 4rem; font-size: .9rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td class="text-center"><span class="p-on_process">ON PROCESS</span></td>
                    <td>20/11/2023 20:05</td>
                    <td>20/11/2023 20:05</td>
                    <td>230154</td>
                    <td>Rian</td>
                    <td>029788/ISH/01010107/2023</td>
                    <td>PROBOLINGGO</td>
                    <td>SMD</td>
                    <td>Success</td>
                </tr>
                <tr style="height: 4rem; font-size: .9rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td class="text-center"><span class="p-approval">APPROVAL</span></td>
                    <td>20/11/2023 20:05</td>
                    <td>20/11/2023 20:05</td>
                    <td>230154</td>
                    <td>Rian</td>
                    <td>029788/ISH/01010107/2023</td>
                    <td>PROBOLINGGO</td>
                    <td>SMD</td>
                    <td>Success</td>
                </tr>
                <tr style="height: 4rem; font-size: .9rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td class="text-center"><span class="p-on_process">ON PROCESS</span></td>
                    <td>20/11/2023 20:05</td>
                    <td>20/11/2023 20:05</td>
                    <td>230154</td>
                    <td>Rian</td>
                    <td>029788/ISH/01010107/2023</td>
                    <td>PROBOLINGGO</td>
                    <td>SMD</td>
                    <td>Success</td>
                </tr>
                <tr style="height: 4rem; font-size: .9rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td class="text-center"><span class="p-fail">FAIL</span></td>
                    <td>20/11/2023 20:05</td>
                    <td>20/11/2023 20:05</td>
                    <td>230154</td>
                    <td>Rian</td>
                    <td>029788/ISH/01010107/2023</td>
                    <td>PROBOLINGGO</td>
                    <td>SMD</td>
                    <td>Success</td>
                </tr>
                <tr style="height: 4rem; font-size: .9rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td class="text-center"><span class="p-cancel_join">CANCEL JOIN</span></td>
                    <td>20/11/2023 20:05</td>
                    <td>20/11/2023 20:05</td>
                    <td>230154</td>
                    <td>Rian</td>
                    <td>029788/ISH/01010107/2023</td>
                    <td>PROBOLINGGO</td>
                    <td>SMD</td>
                    <td>Success</td>
                </tr>
                <tr style="height: 4rem; font-size: .9rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td class="text-center"><span class="p-reject">REJECT</span></td>
                    <td>20/11/2023 20:05</td>
                    <td>20/11/2023 20:05</td>
                    <td>230154</td>
                    <td>Rian</td>
                    <td>029788/ISH/01010107/2023</td>
                    <td>PROBOLINGGO</td>
                    <td>SMD</td>
                    <td>Success</td>
                </tr>
                <tr style="height: 4rem; font-size: .9rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td class="text-center"><span class="p-waiting">Waiting</span></td>
                    <td>20/11/2023 20:05</td>
                    <td>20/11/2023 20:05</td>
                    <td>230154</td>
                    <td>Rian</td>
                    <td>029788/ISH/01010107/2023</td>
                    <td>PROBOLINGGO</td>
                    <td>SMD</td>
                    <td>Success</td>
                </tr>
                <tr style="height: 4rem; font-size: .9rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td class="text-center"><span class="p-resign">RESIGN</span></td>
                    <td>20/11/2023 20:05</td>
                    <td>20/11/2023 20:05</td>
                    <td>230154</td>
                    <td>Rian</td>
                    <td>029788/ISH/01010107/2023</td>
                    <td>PROBOLINGGO</td>
                    <td>SMD</td>
                    <td>Success</td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
    
</body>
</html>