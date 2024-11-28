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

    <title>Edit Jobs</title>
</head>
<body>
    @include('header')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #F5F5F5;
        }

        .process-bar{
            width: 99%;
        }

        .lbl{font-size: 14px;}

        .form-control, .form-select{
            height: 40px;
            font-size: 16px;
        }

        
    </style>

    <div class="mx-4 my-3">
        <div class="card" style="border: 0; background: transparent;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md mb-3">
                        <a style="color: #333333; text-decoration: none;" href="/jobs"><i class="bi bi-chevron-left"></i> {{$job->nama_job}}</a>
                    </div>
                    <div class="col-md-4" style="width: 450px">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="" id="status" style="width: 100%" class="btn btn-secondary form-select px-4">
                                                <option {{$job->status == 2 ? 'selected' : ''}} value="2">Internal</option>
                                                <option {{$job->status == 3 ? 'selected' : ''}} value="3">External</option>
                                                <option {{$job->status == 0 ? 'selected' : ''}} value="0">Draft</option>
                                            </select>
                                        </td>
                                        <td><button style="width: 100%" class="btn btn-success">Save Job</button></td>
                                        <td><a href="/jobs/setting/{{$job->id_job}}" style="width: 100%" class="btn btn-outline-secondary"><i class="bi bi-gear-fill"></i> Setting</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="border: 0;">
            <div class="card-body">
            <form action="/jobs/edit" method="post" id="edit" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="status" id="statusValue">
                <input type="hidden" name="id_job" value="{{$job->id_job}}">
                    <div class="mt-1" id="div1" style="display: block;">
                        <div class="kotak">
                            <img draggable="false" class="process-bar" src="{{asset('assets/Job-process-1.svg')}}" alt="">
                        </div>
                        <hr class="my-4">
                        <div class="row mx-4 mb-2">
                            <div class="col-md">
                                <p>Tambah Detail Pekerjaan</p>
                                <div class="form-group">
                                    <label class="lbl" for="i1">Type Ads</label>
                                    <input type="text" name="ads" value="{{$job->nomor_job}}" id="i1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md"></div>
                        </div>
                        <hr class="my-4">
                        <div class="row mx-4 mb-4">
                            <div class="col-md">
                                <div class="form-group mt-3">
                                    <label for="namajob" class="lbl">Nama Pekerjaan</label>
                                    <input type="text" name="job_name" value="{{$job->nama_job}}" id="namajob" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="jobcategory" class="lbl">Job Category</label>
                                    <select name="job_category" id="jobcategory" class="form-select">
                                        <option {{$job->job_category == 'Software Developer' ? 'selected' : ''}} value="Software Developer">Software Developer</option>
                                        <option {{$job->job_category == 'Sales $ Marketing' ? 'selected' : ''}} value="Sales & Marketing">Sales & Marketing</option>
                                        <option {{$job->job_category == 'IT' ? 'selected' : ''}} value="IT">IT</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                <label for="joblevel" class="lbl">Job Level</label>
                                    <select name="job_level" id="joblevel" class="form-select">
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="jumlahbutuh" class="lbl">Jumlah Kebutuhan</label>
                                    <input type="number" min="1" value="{{$job->total_butuh}}" name="jumlah_butuh" class="form-control" id="jumlahbutuh">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group mt-3">
                                <label for="lokasi" class="lbl">Lokasi</label>
                                    <select name="lokasi" id="lokasi" class="form-select">
                                        <option value="Semarang">Semarang</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="gaji" class="lbl">Gaji</label>
                                    <input type="number" name="gaji" value="{{$job->gaji}}" class="form-control" id="gaji">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="pengalaman" class="lbl">Pengalaman dalam Tahun</label>
                                    <input type="text" name="pengalaman" value="{{$job->pengalaman}}" id="pengalaman" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="deadline" class="lbl">Deadline Rekrutmen</label>
                                    <input type="date" readonly name="deadline" value="{{$job->deadline_recruitment}}" id="deadline" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr class="my-3">

                        <div class="row mx-4 mb-2">
                            <p>Company Details</p>
                            <br>
                            <div class="col-md">

                                <div class="form-group mt-3">
                                    <label for="nama_perusahaan" class="lbl">Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan" value="{{$job->nama_perusahaan}}" id="nama_perusahaan" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="industri" class="lbl">Industri</label>
                                    <select name="industri" id="industri" class="form-select">\
                                        <option value="FMGC">FMGC</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tentangperusahaan" class="lbl">Tentang Perusahaan</label>
                                    <textarea style="max-height: 150px; min-height: 150px; resize: none" name="tentangperusahaan" placeholder="Perusahaan kami adalah..." id="tentangperusahaan" class="form-control">{{$job->tentang_perusahaan}}</textarea>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group mt-3">
                                    <label for="alamat" class="lbl">Alamat</label>
                                    <textarea style="max-height: 90px; min-height: 90px; resize: none;" name="alamat" id="alamat" class="form-control" >{{$job->alamat}}</textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="logo" class="lbl">Add Logo Company</label>
                                    <input style="max-width: 250px" type="file" name="logo" id="logo" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="Tampilkan" class="lbl">Tampilkan Nama Perusahaan</label>
                                    <select name="tampilkan" id="tampilkan" class="form-select">
                                        <option value="1">Ya</option>
                                        <option {{$config->tampilkan_nama_perusahaan == 0 ? 'selected' : ''}} value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success next-btn float-end mt-4 me-4" data-next="#div2">Lanjut</button>

                    </div>


                    <div class="mt-1" id="div2" style="display: none;">
                        <div class="kotak">
                            <img draggable="false" class="process-bar" src="{{asset('assets/Job-process-2.svg')}}" alt="">
                        </div>
                        <hr class="my-3">
                        <p class="mx-4">Tambah Deskripsi Pekerjaan</p>
                        <div class="form-group my-3 mx-4">
                            <label class="lbl" for="myTextarea">Deskripsi Pekerjaan</label>
                            <textarea name="desc" id="myTextarea" placeholder="Tulis deskripsi pekerjaan dengan lengkap berisikan deskripsi pekerjaan,  keuntungan, persyaratan, skill dll">{{$job->desc_pekerjaan}} </textarea>
                        </div>
                        <button type="button" class="btn btn-success next-btn float-end mx-4" data-next="#div3">Lanjut</button>
                    </div>

                    <div class="mt-1" id="div3" style="display: none;">
                        <div class="kotak">
                            <img draggable="false" class="process-bar" src="{{asset('assets/Job-process-3.svg')}}" alt="">
                        </div>
                        <hr class="my-3">
                        <p class="mx-4">Setting Data Applicant</p>
                        <div class="row mx-3">
                            <div class="col-md mb-4">
                                <div class="card">
                                    <div style="background: transparent;" class="card-header">
                                        <h4>Personal Details</h4>
                                        <p>Select what should be included or required in the application form.</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-switch" style="margin-left: 40px">
                                            <input class="form-check-input" type="checkbox" id="selectAllPersonal">
                                            <label class="form-check-label" for="selectAllPersonal">Select All</label>
                                        </div>

                                        <div class="form-check form-switch mt-4 me-4">
                                            <div class="row">
                                                <div class="col-md"><p style="font-size: 18px; font-weight: 400;">Foto Profil</p></div>
                                                <div class="col-md"><input {{$config->foto_profil == 1 ? 'checked' : ''}} value="1" class="form-check-input float-end personal-details" type="checkbox" name="pp"></div>
                                            </div>
                                        </div>

                                        <div class="form-check form-switch me-4">
                                            <div class="row">
                                                <div class="col-md"><p style="font-size: 18px; font-weight: 400;">Status Pernikahan</p></div>
                                                <div class="col-md"><input {{$config->status_pernikahan == 1 ? 'checked' : ''}} value="1" class="form-check-input float-end personal-details" type="checkbox" name="statusnikah"></div>
                                            </div>
                                        </div>

                                        <div class="form-check form-switch me-4">
                                            <div class="row">
                                                <div class="col-md"><p style="font-size: 18px; font-weight: 400;">Agama</p></div>
                                                <div class="col-md"><input {{$config->agama == 1 ? 'checked' : ''}} value="1" class="form-check-input float-end personal-details" type="checkbox" name="agama"></div>
                                            </div>
                                        </div>

                                        <div class="form-check form-switch me-4">
                                            <div class="row">
                                                <div class="col-md"><p style="font-size: 18px; font-weight: 400;">Tinggi Badan</p></div>
                                                <div class="col-md"><input {{$config->tinggi_badan == 1 ? 'checked' : ''}} value="1" class="form-check-input float-end personal-details" type="checkbox" name="tinggibadan"></div>
                                            </div>
                                        </div>

                                        <div class="form-check form-switch me-4">
                                            <div class="row">
                                                <div class="col-md"><p style="font-size: 18px; font-weight: 400;">Berat Badan</p></div>
                                                <div class="col-md"><input {{$config->berat_badan == 1 ? 'checked' : ''}} value="1" class="form-check-input float-end personal-details" type="checkbox" name="beratbadan"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                            <div class="card">
                                    <div style="background: transparent;" class="card-header">
                                        <h4>Dokumen</h4>
                                        <p>Select what should be included or required in the application form.</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-switch" style="margin-left: 40px">
                                            <input class="form-check-input" type="checkbox" id="selectAllDokumen">
                                            <label class="form-check-label" for="selectAllDokumen">Select All</label>
                                        </div>

                                        <div class="form-check form-switch mt-4 me-4">
                                            <div class="row">
                                                <div class="col-md"><p style="font-size: 18px; font-weight: 400;">Pendidikan</p></div>
                                                <div class="col-md"><input {{$config->pendidikan == 1 ? 'checked' : ''}} value="1" class="form-check-input float-end dokumen" type="checkbox" name="pendidikan"></div>
                                            </div>
                                        </div>

                                        <div class="form-check form-switch me-4">
                                            <div class="row">
                                                <div class="col-md"><p style="font-size: 18px; font-weight: 400;">Pengalaman Kerja</p></div>
                                                <div class="col-md"><input {{$config->pengalaman_kerja == 1 ? 'checked' : ''}} value="1" class="form-check-input float-end dokumen" type="checkbox" name="pengalamankerja"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success next-btn mt-3 me-4 float-end" data-next="#div4">Lanjut</button>
                    </div>
                    <input type="hidden" name="formData" id="form-builder-data">
                </form>

                    <div class="mt-1" id="div4" style="display: none;">
                        <div class="kotak">
                            <img draggable="false" class="process-bar" src="{{asset('assets/Job-process-4.svg')}}" alt="">
                        </div>
                        <hr class="my-3">
                        <div class="mx-4">
                            <p>Sesuaikan Pertanyaan dari Perusahaan</p>
                            <div class="my-3">
                                <div id="fb-editor"></div>
                            </div>
                        </div>
                        <button id="publish-btn" type="button" class="btn btn-success">Publish</button>
                    </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function() {
            // Inisialisasi TinyMCE
            tinymce.init({
                selector: 'textarea#myTextarea'
            });

            // Ambil data form dari database yang dikirim ke view
            var formData = @json($job->form_data ?? '[]'); // Jika null, set ke array kosong

            // Inisialisasi FormBuilder
            var fbEditor = $('#fb-editor').formBuilder({
                formData: formData
            });

            // Event handler untuk tombol "Publish"
            $('#publish-btn').click(function() {
                // Simpan data dari FormBuilder ke hidden input
                var formData = fbEditor.actions.getData('json');
                $('#form-builder-data').val(formData);

                // Submit form
                $('#edit').submit();
            });

            // Navigasi antar step
            $('.next-btn').click(function() {
                var nextDiv = $(this).data('next');
                $(this).closest('div[id^="div"]').hide();
                $(nextDiv).show();
            });
        });

        // Get references to the select and input elements
        const selectElement = document.getElementById('status');
        const inputElement = document.getElementById('statusValue');

        // Function to update input value based on select option
        function updateInputValue() {
            // Get the selected option value
            const selectedValue = selectElement.value;
            // Set the value to the input field5
            inputElement.value = selectedValue;
        }

        // Add event listener to the select element
        selectElement.addEventListener('change', updateInputValue);

        // Optionally, initialize the input field with the default value of the select element
        updateInputValue();




         // Personal Details Select All
        document.getElementById('selectAllPersonal').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.personal-details');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        // Dokumen Select All
        document.getElementById('selectAllDokumen').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.dokumen');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>
</body>
</html>


