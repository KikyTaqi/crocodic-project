<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/formBuilder@3.19.12/dist/form-builder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>

    <title>Create Cancel Join</title>
</head>
<body>
    @include('header')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #F5F5F5;
        }

        
    </style>

    <div class="mx-4 my-3">
        <div class="row mb-3 mt-4">
            <div class="col-md d-flex">
                <a class="me-3" href="/cancel-join"><i class="bi bi-chevron-left"></i></a>
                <h5>Create Cancel Join</h5>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="perner">Pilih Perner/Nama</label>
                                <input type="text" placeholder="Masukan 3 karater atau lebih" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Tanggal Cancel</label>
                                <input type="date" placeholder="Pilih Tanggal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="perner">Alasan</label>
                                <select name="" id="" class="form-select">
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Bukti Dokumen</label>
                                <input type="file" placeholder="Nama file..." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Tanggal">Notes</label>
                                <textarea name="" class="form-control" id=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>


    </div>
</body>
</html>


