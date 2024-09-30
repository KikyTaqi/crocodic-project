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
                    <th class="text-center">#</th>
                    <th>PIC</th>
                    <th>Job Category</th>
                    <th>Job Position</th>
                    <th>Layanan</th>
                    <th>Area</th>
                    <th>Kota</th>
                </tr>
            </thead>
            <tbody class="border">
                <?php $no = 1; ?>
                <tr style="height: 4rem; font-size: 1rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Riyadi Risyanto</td>
                    <td>Software Developer</td>
                    <td>Promotor</td>
                    <td>Sharp</td>
                    <td>Jakarta</td>
                    <td>Jakarta Barat</td>
                </tr>
                <tr style="height: 4rem; font-size: 1rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Aditya Tri Wibisono</td>
                    <td>Sales & Marketing</td>
                    <td>Sales</td>
                    <td>Elecrolux</td>
                    <td>Semarang</td>
                    <td>Salatiga</td>
                </tr>
                <tr style="height: 4rem; font-size: 1rem;" class="align-middle">
                    <td class="text-center">{{$no++}}</td>
                    <td>Sony Ardhiansyah</td>
                    <td>IT</td>
                    <td>Front End</td>
                    <td>Electrolux</td>
                    <td>Banten</td>
                    <td>Tangerang</td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
    
</body>
</html>