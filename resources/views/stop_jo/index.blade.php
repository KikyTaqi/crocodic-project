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


    <title>Stop Job Order</title>
</head>
<body style="background: #f8f8f8">
    @include('header')

    <div class="mx-4 my-3">

        <div class="row mb-3 mt-4">
            <div class="col-md d-flex">
                <h5>Stop Job Order</h5>
            </div>
        </div>
        <div class="table-responsive">

            <table class="table table-bordered custom-table" style="background: #fff; font-weight: 500; font-size: 14px">
                <thead class="align-middle">
                    <tr>
                        <?php $no = 1; ?>
                        <th class="text-center" style="height: 48px">#</th>
                        <th style="min-width: 10rem;">No JO</th>
                        <th style="min-width: 5rem;">Created By</th>
                        <th style="width: 7rem;">Created at</th>
                        <th>Approval I</th>
                        <th>Approval II</th>
                        <th class="text-center">Status</th>
                        <th style="width: 25rem">Remarks</th>
                        <th style="min-width: 1rem"></th>
                    </tr>
                </thead>
                <tbody class="align-middle">
    
                    <tr>
                        <td style="width: 48px; height: 48px" class="text-center">{{$no++}}</td>
                        <td>029788/ISH/01010107/2023</td>
                        <td>FAUZAN RIVALDY</td>
                        <td>20/11/2023 20:05</td>
                        <td>PM</td>
                        <td>Tofan Kusuma</td>
                        <td class="text-center"><span class="mx-3 my-1 p-solid-green">approved</span></td>
                        <td>Dikarenakan sudah tidak ada kebutuhan lagi ditoko tersebut</td>
                        <td><button data-bs-toggle="offcanvas" data-bs-target="#vdetail" aria-controls="offcanvasRight" style="padding: .2rem; height: 2.2rem; width: 2.2rem;" class="btn btn-green mx-2 my-2"><i style="font-size: 1.2rem" class="bi bi-eye-fill"></i></button></td>
                    </tr>
                    <tr>
                        <td style="width: 48px; height: 48px" class="text-center">{{$no++}}</td>
                        <td>029788/ISH/01010107/2023</td>
                        <td>FAUZAN RIVALDY</td>
                        <td>20/11/2023 20:05</td>
                        <td>PM</td>
                        <td>Tofan Kusuma</td>
                        <td class="text-center"><span class="mx-3 my-1 p-solid-green">approved</span></td>
                        <td>Dikarenakan sudah tidak ada kebutuhan lagi ditoko tersebut</td>
                        <td><button style="padding: .2rem; height: 2.2rem; width: 2.2rem;" class="btn btn-green mx-2 my-2"><i style="font-size: 1.2rem" class="bi bi-eye-fill"></i></button></td>
                    </tr>
                    <tr>
                        <td style="width: 48px; height: 48px" class="text-center">{{$no++}}</td>
                        <td>029788/ISH/01010107/2023</td>
                        <td>FAUZAN RIVALDY</td>
                        <td>20/11/2023 20:05</td>
                        <td>PM</td>
                        <td>Tofan Kusuma</td>
                        <td class="text-center"><span class="mx-3 my-1 p-solid-green">approved</span></td>
                        <td>Dikarenakan sudah tidak ada kebutuhan lagi ditoko tersebut</td>
                        <td><button style="padding: .2rem; height: 2.2rem; width: 2.2rem;" class="btn btn-green mx-2 my-2"><i style="font-size: 1.2rem" class="bi bi-eye-fill"></i></button></td>
                    </tr>
                    <tr>
                        <td style="width: 48px; height: 48px" class="text-center">{{$no++}}</td>
                        <td>029788/ISH/01010107/2023</td>
                        <td>FAUZAN RIVALDY</td>
                        <td>20/11/2023 20:05</td>
                        <td>PM</td>
                        <td>Tofan Kusuma</td>
                        <td class="text-center"><span class="mx-3 my-1 p-solid-green">approved</span></td>
                        <td>Dikarenakan sudah tidak ada kebutuhan lagi ditoko tersebut</td>
                        <td><button style="padding: .2rem; height: 2.2rem; width: 2.2rem;" class="btn btn-green mx-2 my-2"><i style="font-size: 1.2rem" class="bi bi-eye-fill"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        
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
                    <td>ID</td>
                    <td>2527</td>
                </tr>
                <tr>
                    <td>No Job Order</td>
                    <td>029941/ISH/01010107/2023</td>
                </tr>
                <tr>
                    <td>Created by</td>
                    <td>FAUZAN RIVALDY</td>
                </tr>
                <tr>
                    <td>Created at</td>
                    <td>20/11/2023 20:05</td>
                </tr>
                <tr>
                    <td>Updated by</td>
                    <td>FAUZAN RIVALDY</td>
                </tr>
                <tr>
                    <td>Updated at</td>
                    <td>20/11/2023 20:05</td>
                </tr>
                <tr>
                    <td>Approval I</td>
                    <td>PM</td>
                </tr>
                <tr>
                    <td>Approval I at</td>
                    <td>20/11/2023 20:05</td>
                </tr>
                <tr>
                    <td>Approval II</td>
                    <td>Tofan Kusuma</td>
                </tr>
                <tr>
                    <td>Approval II at</td>
                    <td>20/11/2023 20:05</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><span class="my-1 p-solid-green">approved</span></td>
                </tr>
                <tr>
                    <td>Alasan Stop</td>
                    <td>Permintaan User/Client</td>
                </tr>
                <tr>
                    <td>Remarks</td>
                    <td>Dikarenakan sudah tidak ada kebutuhan lagi ditoko tersebut</td>
                </tr>
                <tr>
                    <td>Jumlah Kebutuhan Sebelumnya</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Jumlah Stop Pemenuhan Pekerja</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Jumlah Kebutuhan</td>
                    <td>0</td>
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