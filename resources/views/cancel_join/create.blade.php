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


        .form-control, .form-select{
            height: 40px;
            font-size: 14px;
        }
        
        .card-hipipe{
            max-height: 100% !important;
        }


                
        .drop-container {
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 200px;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #55555541;
            color: #444;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover,
        .drop-container.drag-active {
            background: #f5fffc;
            border-color: #41806D;
        }

        .drop-container:hover .drop-title,
        .drop-container.drag-active .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            text-align: center;
            transition: color .2s ease-in-out;
        }

        input[type="file"] {
            position: relative;
            border: 1px solid #55555541;
            border-radius: 10px;
            width: 100%;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

         input[type="file"]:hover{
            border: 1px solid #41806D;
        }

        input[type="file"]::file-selector-button {
            width: 136px;
            color: transparent;
        }

        /* Faked label styles and icon */
        input[type="file"]::before {
            position: absolute;
            pointer-events: none;
            top: 10px;
            left: 16px;
            height: 20px;
            width: 20px;
            content: "";
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23ffffff' viewBox='0 0 16 16'%3E%3Cpath d='M9.828 4a.5.5 0 0 1 .354.146L11 5.293V6H9.828a.5.5 0 0 1-.354-.146L8 4.707 6.526 6.207A.5.5 0 0 1 6 6H2.5a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h2.293l1-1H9.828Z'/%3E%3Cpath d='M0 3.5A1.5 1.5 0 0 1 1.5 2h2.793l1.707-1.707a1 1 0 0 1 .708-.293H9.5a1 1 0 0 1 .707.293L12.207 2H14.5A1.5 1.5 0 0 1 16 3.5v9A1.5 1.5 0 0 1 14.5 14H1.5A1.5 1.5 0 0 1 0 12.5v-9Zm1 0v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-2.793l-1.707 1.707a1 1 0 0 1-.708.293H4.207a1 1 0 0 1-.707-.293L1.5 3.5a.5.5 0 0 0-.5.5Z'/%3E%3C/svg%3E");

        }

        input[type="file"]::after {
            position: absolute;
            pointer-events: none;
            font-size: .88rem;
            top: 9px;
            left: 45px;
            color: white;
            content: "Pilih Berkas";
        }

        input[type="file"]::file-selector-button {
            border-radius: 4px;
            padding: 0 16px;
            height: 40px;
            cursor: pointer;
            background-color: #41806D;
            border: 1px solid rgba(0, 0, 0, 0.16);
            box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.05);
            margin-right: 16px;
            transition: background-color 200ms;
        }

        /* file upload button hover state */
        input[type="file"]::file-selector-button:hover {
            background-color: #41806D;
        }

        /* file upload button active state */
        input[type="file"]::file-selector-button:active {
            background-color: #41806D;
        }


    </style>

    <div class="mx-4 my-3">
        <div class="row mb-3 mt-4">
            <div class="col-md d-flex">
                <a class="me-3" href="/cancel-join"><i class="bi bi-chevron-left"></i></a>
                <h5>Create Cancel Join</h5>
            </div>

            <div class="row mt-4">
                <div class="col-md-5 mb-4">
                    <div class="card card-hipipe">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="mb-2" for="perner">Pilih Perner/Nama</label>
                                <input type="text" placeholder="Masukan 3 karater atau lebih" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2" for="Tanggal">Tanggal Cancel</label>
                                <input type="date" placeholder="Pilih Tanggal" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2" for="perner">Alasan</label>
                                <select name="" id="" class="form-select">
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2" for="Tanggal">Bukti Dokumen</label>

                                <label for="images" class="drop-container" id="dropcontainer">
                                    <span class="drop-title">Tarik dan lepas data disini</span>
                                </label>
                                <input type="file" class="mt-1" id="images" accept="image/*" required>
                                
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2" for="Tanggal">Notes</label>
                                <textarea style="min-height: 20vh; max-height: 20vh;" name="" class="form-control" id=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card card-hipipe">
                        <div class="card-header" style="background-color: white;">
                            Personal Informasi
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td style="width: 50%;">Perner</td>
                                    <td>132246</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>Eka Saputra</td>
                                </tr>
                                <tr>
                                    <td>Personal Area</td>
                                    <td>TELKOM TAM DCS CC</td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td>MEDAN</td>
                                </tr>
                                <tr>
                                    <td>Skill Layanan</td>
                                    <td>OB_TLH</td>
                                </tr>
                                <tr>
                                    <td>Payroll Area</td>
                                    <td>ANTERAJA ISH-SBY</td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>AGENT</td>
                                </tr>
                                <tr>
                                    <td>Level</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Hiring From</td>
                                    <td>Gojobs</td>
                                </tr>
                            </table>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
                                <input style="font-size: .88rem;" type="submit" value="Submit" class="btn bg-green text-light px-4">
                                <a style="font-size: .88rem;" href="#" class="btn btn-danger px-4">Save to draft</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>


    </div>
</body>
</html>


<script>
    const dropContainer = document.getElementById("dropcontainer")
    const fileInput = document.getElementById("images")

    dropContainer.addEventListener("dragover", (e) => {
        // prevent default to allow drop
        e.preventDefault()
    }, false)

    dropContainer.addEventListener("dragenter", () => {
        dropContainer.classList.add("drag-active")
    })

    dropContainer.addEventListener("dragleave", () => {
        dropContainer.classList.remove("drag-active")
    })

    dropContainer.addEventListener("drop", (e) => {
        e.preventDefault()
        dropContainer.classList.remove("drag-active")
        fileInput.files = e.dataTransfer.files
    })
</script>