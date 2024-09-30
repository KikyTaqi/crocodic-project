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
            <h5>PIC Job Access</h5>
        </div>

        <table class="table bg-white table-bordered">
            <thead class="border">
                <tr style="height: 3rem; font-size: 1rem;" class="align-middle">
                    <th class="text-center"></th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Req Date</th>
                    <th>App Date</th>
                    <th>Perner</th>
                    <th>PIC</th>
                    <th>No Job</th>
                    <th>Area SAP</th>
                    <th>Jabatan</th>
                    <th>Status SAP</th>
                </tr>
            </thead>
            <tbody class="border">
                <?php $no = 1; ?>
                <tr style="height: 4rem; font-size: 1rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
    
</body>
</html>