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
        .border{
            border: solid 1px #8d8e8f;
        }
    </style>

    <title>Hiring</title>
</head>
<body style="background: #f8f8f8">
    @include('header')

    <div class="mx-4 my-3">

        <div class="row mb-3 mt-4">
            <h5>Ready to Hiring</h5>
        </div>

        <div class="row">
            <div class="col-md mb-2">
                <div class="search-box">
                    <input style="height: 50px; width: 450px;" type="text" id="searchBox" class="form-control white-theme search-input" placeholder="Search..">
                    <i class="bi bi-search search-icon-lg"></i>
                </div>
            </div>
            <div class="col-md">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-white-outline" type="button"><i class="bi bi-bar-chart-fill"></i> Report Hiring</button>
                    <button class="btn btn-green-outline" type="button"><span class="badge bg-green me-1">0</span> Cancel Join</button>
                    <button class="btn bg-green text-light" type="button"><span class="badge bg-light text-dark me-1">0</span> Request Hiring</button>
                </div>
            </div>
        </div>
        <table class="table bg-white border" style="font-size: 14px;">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" id=""></th>
                    <th>Name</th>
                    <th>Profile</th>
                    <th>No Job</th>
                    <th>Posisi</th>
                    <th>Lokasi</th>
                    <th>Layanan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>Ainul Mumbait</td>
                    <td><span class="percent">100%</span></td>
                    <td>029861/ISH/01010107/2023</td>
                    <td>HUNTER NOO</td>
                    <td>BULUKUMBA</td>
                    <td>JOYDAY HUNTER GT ISH</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>ACHMAD MAULANA ONKY PRADANA</td>
                    <td><span class="percent">100%</span></td>
                    <td>029861/ISH/01010107/2023</td>
                    <td>CONSUMER ACCOUNT MANAGER</td>
                    <td>PASURUAN</td>
                    <td>CAM TELKOMSEL A3 BALNUS</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>M Ikhwan Arif</td>
                    <td><span class="percent">90%</span></td>
                    <td>029168/ISH/01010107/2023</td>
                    <td>HUNTER NOO</td>
                    <td>PASURUAN</td>
                    <td>JOYDAY HUNTER GT ISH</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>Nighara Asmarantaka Sulya</td>
                    <td><span class="percent">80%</span></td>
                    <td>029758/ISH/01010107/2023</td>
                    <td>CONSUMER ACCOUNT MANAGER</td>
                    <td>SURAKARTA</td>
                    <td>CAM TELKOMSEL A3 JATENG</td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
    
</body>
</html>