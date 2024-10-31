<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
</head>
<body style="::-webkit-scrollbar {display: none;}">
    @include('header')
    <div class="row" style="::-webkit-scrollbar {display: none;};width: 100vw;margin: 0;padding: 0;">
        @include('candidate/sidebar_candidates')
        <div class="col-md" style="::-webkit-scrollbar {display: none;};overflow-y: scroll;">
            <div class="row">
                @php
                    $data = $candidateDetail;
                @endphp
                @if($first != null || $first != '')
                @php
                $data = $first;
                @endphp
                @endif
                @foreach($data as $c)
                <div class="offcanvas offcanvas-end sidebar-move" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header" style="border-bottom: 1px solid #E7E7ED;">
                        <h5 class="title-move my-auto">Pindahkan pelamar ke pekerjaan lain</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body" style="padding: 30px;">
                        <p class="title-grey">Pilih Job</p>
                        <input type="text" class="form-control input-move" id="searchInput-11" onkeyup="searchFunctionJobs()" placeholder="Cari Pekerjaan">
            
                        <div class="row-data" id="tableJobs">
                            @foreach($jobs as $j)
                            <div class="data">
                                <table class="data-table">
                                    <tr>
                                        <td><p class="data-name">{{$j->nama_job}}</p></td>
                                        <td class="my-auto text-end w-100" rowspan="2">
                                            @if($j->status == 0)
                                                <!-- Draft -->
                                                <div class="s-draft ms-auto">Drafted</div>
                                            @elseif($j->status == 1)
                                                <!-- Published -->
                                                <div class="s-published ms-auto">Published</div>
                                            @elseif($j->status == 2)
                                                <!-- Internal -->
                                                <div class="s-internal ms-auto">Internal</div>
                                            @elseif($j->status == 3)
                                                <!-- External -->
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p class="data-loc" style="width: max-content;">{{$j->lokasi}} - {{$j->nomor_job}}</p></td>
                                    </tr>
                                </table>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Modal Share -->
                <div class="modal fade" id="sharemodal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Share Candidate</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="linkJob" readonly value="http://127.0.0.1:8000/candidates/detail/{{$c->id_candidate}}">
                                <button class="btn btn-outline-secondary"onclick="copyInput()" type="button" id="button-addon2"><i class="bi bi-clipboard"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>


                <!-- Modal Schedule -->
                <div class="modal fade schedule-modal" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="scheduleModalLabel">Interview Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="schedule-input-top">
                                        <div class="left">
                                            <div class="group-select">
                                                <select name="schedule_date" id="dateSelectSchedule" class="select-date schedule"></select>
                                                <img src="{{asset('assets/icon-detail-candidate/select-arrow.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <select name="start_time" class="select-date" id="start-time"></select>
                                            <div class="time-divider"></div>
                                            <select name="end_time" class="select-date" id="end-time"></select>
                                            <span class="time-difference my-auto">(0 minutes)</span>
                                        </div>
                                    </div>
                                    <div class="input-group-schedule">
                                        <p class="input-title">Judul</p>
                                        <div class="group-select">
                                            <select name="schedule_title" class="select-date" style="width: 645px;">
                                                <option value="interview_hr">Interview HR</option>
                                            </select>
                                            <img src="{{asset('assets/icon-detail-candidate/select-arrow.svg')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="input-group-schedule">
                                        <p class="input-title">Kandidat</p>
                                        <select class="select-pic" id="select-kandidat" data-placeholder="Pilih Kandidat" multiple style="width: 645px;">
                                            @foreach($candidates as $cs)
                                            <option value="{{$cs->id_candidate}}">{{$cs->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group-schedule">
                                        <p class="input-title">Pewawancara</p>
                                        <select class="select-pic" id="select-pewawancara" data-placeholder="Pilih Pewawancara" multiple style="width: 645px;">
                                            @foreach($users as $us)
                                            <option value="{{$us->id}}">{{$us->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex">
                                        <div class="input-group-schedule me-4 mt-0">
                                            <p class="input-title">Kandidat</p>
                                            <div class="interview-type">
                                                <input type="radio" name="interview" id="online" value="Online" checked>
                                                <label for="online">
                                                    Online
                                                </label>
                                                <input type="radio" name="interview" id="onsite" value="On site">
                                                <label for="onsite">
                                                    On site
                                                </label>
                                                <input type="radio" name="interview" id="phone" value="Phone">
                                                <label for="phone">
                                                    Phone
                                                </label>
                                            </div>
                                        </div>
                                        <div class="input-group-schedule mt-0">
                                            <p class="input-title">Sertakan resume dalam undangan</p>
                                            <div class="d-flex">
                                                <div class="custom-switch my-auto me-3">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1"></label>
                                                </div>
                                                <input type="email" name="" id="" class="select-date" style="width: 285px;" placeholder="Email User">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group-schedule mt-0">
                                        <p class="input-title">Link Online Meeting</p>
                                        <div class="input-group-meeting">
                                            <div class="line"></div>
                                            <input type="text" name="" id="inputMeet" class="select-date" style="width: 645px;" value="https://meet.google.com/muh-apdy-jwz ">
                                            <span id="textCopied" class="d-none">Text copied to clipboard!</span>
                                            <button type="button" class="btn-copy" id="btnCopy">Copy</button>
                                        </div>
                                    </div>
                                    <div class="input-group-schedule mt-0 mb-0">
                                        <p class="input-title">Informasi Tambahan</p>
                                        <textarea class="select-date" placeholder="Tambahkan catatan untuk kandidat, seperti menggunakan baju berkerah dll" style="width: 645px;height: 126px;resize: none;"></textarea>
                                    </div>
                                    <div class="input-group-schedule float-end">
                                        <button type="button" class="btn-cancel my-auto">Cancel</button>
                                        <button type="button" class="btn-schedule2 my-auto">Schedule</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Modal Profile -->
                <div class="modal fade profile-modal" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profileModalLabel">View Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-auto profile-left">
                                        <div class="row name">
                                            <div class="profile-foto-4"><img src="{{asset('assets/profile_img/'.$c->foto_profile)}}" alt=""></div>
                                            <button class="btn-none pencil-orange" style="width: fit-content;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt="" class="float-end"></button>
                                            <h4 class="name-candidate">{{$c->nama}}</h4>
                                            <p class="title-candidate">Developer</p>
                                            <p class="title-candidate"><small>3 Tahun Pengalaman</small></p>
                                        </div>
                                        <div class="row biodata" id="sosmedView">
                                            <div class="wrap-title">
                                                <p class="title">Social Media</p>
                                                <button type="button" class="btn-none float-end w-fit" onclick="changeFormBiodata(1,'sosmedView','sosmedForm')"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                            </div>
                                            <div class="wrap-biodata">
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/instagram.svg')}}" alt="">
                                                    <p class="text">johns</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/twitter.svg')}}" alt="">
                                                    <p class="text">johnsmith</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/facebook.svg')}}" alt="">
                                                    <p class="text">johnsmith</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/linkedin.svg')}}" alt="">
                                                    <p class="text">John Smith</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row biodata p-27 d-none" id="sosmedForm">
                                            <div class="wrap-title p-0">
                                                <p class="title">Social Media</p>
                                            </div>
                                            <div class="wrap-biodata">
                                                <div class="row-biodata-input">
                                                    <p class="text">Instagram</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Twitter</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Facebook</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">LinkedIn</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-btn">
                                                    <button type="button" class="biodata-submit" onclick="changeFormBiodata(2,'sosmedView','sosmedForm')">Simpan</button>
                                                    <button type="button" class="biodata-cancel ms-2" onclick="changeFormBiodata(2,'sosmedView','sosmedForm')">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row biodata" id="biodataView">
                                            <div class="wrap-title">
                                                <p class="title">Biodata</p>
                                                <button type="button" class="btn-none float-end w-fit" onclick="changeFormBiodata(1,'biodataView','biodataForm')"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                            </div>
                                            <div class="wrap-biodata">
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/date-cake.svg')}}" alt="">
                                                    <p class="text">Jakarta, 10 Mei 2000</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/gender.svg')}}" alt="">
                                                    <p class="text">
                                                        @if($c->gender == 1)
                                                        Laki-laki
                                                        @else
                                                        Perempuan
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/love.svg')}}" alt="">
                                                    <p class="text">Belum menikah</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/pray.svg')}}" alt="">
                                                    <p class="text">Islam</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/money.svg')}}" alt="">
                                                    <p class="text">7.500.000</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/TB.svg')}}" alt="">
                                                    <p class="text">175cm</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/BB.svg')}}" alt="">
                                                    <p class="text">70kg</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row biodata p-27 d-none" id="biodataForm">
                                            <div class="wrap-title p-0">
                                                <p class="title">Biodata</p>
                                            </div>
                                            <div class="wrap-biodata">
                                                <div class="row-biodata-input">
                                                    <p class="text">Tempat Tanggal Lahir</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                    <div class="select-group-date">
                                                        <select id="day" class="biodata-input px-2 day-select">
                                                            <option value="" disabled selected>Day</option>
                                                        </select>
                                                          
                                                        <select id="month" class="biodata-input px-2">
                                                            <option value="" disabled selected>Month</option>
                                                            <option value="Jan">Jan</option>
                                                            <option value="Feb">Feb</option>
                                                            <option value="Mar">Mar</option>
                                                            <option value="Apr">Apr</option>
                                                            <option value="May">May</option>
                                                            <option value="Jun">Jun</option>
                                                            <option value="Jul">Jul</option>
                                                            <option value="Aug">Aug</option>
                                                            <option value="Sep">Sep</option>
                                                            <option value="Oct">Oct</option>
                                                            <option value="Nov">Nov</option>
                                                            <option value="Dec">Dec</option>
                                                        </select>
                                                          
                                                        <select id="year" class="biodata-input px-2 year-select">
                                                            <option value="" disabled selected>Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Jenis Kelamin</p>
                                                    <select name="" id="" class="biodata-input w-122">
                                                        <option value="laki-laki">Laki-laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Status</p>
                                                    <select name="" id="" class="biodata-input w-122">
                                                        <option value="sudah_menikah">Sudah Menikah</option>
                                                        <option value="belum_menikah">Belum Menikah</option>
                                                    </select>
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Agama</p>
                                                    <select name="" id="" class="biodata-input w-122">
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen">Kristen</option>
                                                        <option value="katolik">Katolik</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="buddha">Buddha</option>
                                                        <option value="konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Gaji yang Diharapkan (IDR)</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Tinggi Badan (cm)</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Berat Badan (cm)</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-btn">
                                                    <button type="button" class="biodata-submit" onclick="changeFormBiodata(2,'biodataView','biodataForm')">Simpan</button>
                                                    <button type="button" class="biodata-cancel ms-2" onclick="changeFormBiodata(2,'biodataView','biodataForm')">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row biodata" id="kontakView">
                                            <div class="wrap-title">
                                                <p class="title">Kontak Informasi</p>
                                                <button type="button" class="btn-none float-end w-fit" onclick="changeFormBiodata(1,'kontakView','kontakForm')"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                            </div>
                                            <div class="wrap-biodata">
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/phone.svg')}}" alt="">
                                                    <p class="text">{{$c->no_hp}}</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/email.svg')}}" alt="">
                                                    <p class="text">{{$c->email}}</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/province.svg')}}" alt="">
                                                    <p class="text">Prov. DKI Jakarta</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/location.svg')}}" alt="" class="mb-auto">
                                                    <p class="text">Jl. Raya Condet No.13B RT.4/RW.4, Batu Ampar</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/Kec.svg')}}" alt="">
                                                    <p class="text">Kramat Jati</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/Kel.svg')}}" alt="">
                                                    <p class="text">Jagakarsa</p>
                                                </div>
                                                <div class="row-biodata">
                                                    <img src="{{asset('assets/icon-biodata/message-arrow.svg')}}" alt="">
                                                    <p class="text">13910</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row biodata p-27 d-none" id="kontakForm">
                                            <div class="wrap-title p-0">
                                                <p class="title">Kontak Informasi</p>
                                            </div>
                                            <div class="wrap-biodata">
                                                <div class="row-biodata-input">
                                                    <p class="text">No HP</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122" value="{{$c->no_hp}}">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Email</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122" value="{{$c->email}}">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Provinsi</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Jalan</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Kecamatan</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Kelurahan</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-input">
                                                    <p class="text">Kode Pos</p>
                                                    <input type="text" name="" id="" class="biodata-input w-122">
                                                </div>
                                                <div class="row-biodata-btn">
                                                    <button type="button" class="biodata-submit" onclick="changeFormBiodata(2,'kontakView','kontakForm')">Simpan</button>
                                                    <button type="button" class="biodata-cancel ms-2" onclick="changeFormBiodata(2,'kontakView','kontakForm')">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row biodata p-27">
                                            <div class="wrap-title p-0">
                                                <p class="title">Kontak Informasi</p>
                                            </div>
                                            <div class="wrap-biodata mb-2">
                                                <div class="input-group-contact">
                                                    <div class="title-group-contact">
                                                        <span class="contact-required">*</span>
                                                        <p class="contact-title">KTP</p>
                                                    </div>
                                                    <input type="text" class="input-contact mb-1" placeholder="Nomor KTP">
                                                    <div class="upload-group-contact">
                                                        <input type="file" class="input-contact" title="Upload KTP">
                                                        <img src="{{asset('assets/icon-detail-candidate/download-pic.svg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-biodata mb-2">
                                                <div class="input-group-contact">
                                                    <div class="title-group-contact">
                                                        <span class="contact-required">*</span>
                                                        <p class="contact-title">SIM Motor</p>
                                                    </div>
                                                    <input type="text" class="input-contact mb-1" placeholder="Nomor SIM Motor">
                                                    <div class="upload-group-contact">
                                                        <input type="file" class="input-contact" title="Upload SIM">
                                                        <img src="{{asset('assets/icon-detail-candidate/download-pic.svg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-biodata mb-2">
                                                <div class="input-group-contact">
                                                    <div class="title-group-contact">
                                                        <p class="contact-title">SIM Mobil</p>
                                                    </div>
                                                    <input type="text" class="input-contact mb-1" placeholder="Nomor SIM Mobil">
                                                    <div class="upload-group-contact">
                                                        <input type="file" class="input-contact" title="Upload SIM">
                                                        <img src="{{asset('assets/icon-detail-candidate/download-pic.svg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-biodata mb-2">
                                                <div class="input-group-contact">
                                                    <div class="title-group-contact">
                                                        <span class="contact-required">*</span>
                                                        <p class="contact-title">NPWP</p>
                                                    </div>
                                                    <input type="text" class="input-contact mb-1" placeholder="Nomor NPWP">
                                                    <div class="upload-group-contact">
                                                        <input type="file" class="input-contact" title="Upload NPWP">
                                                        <img src="{{asset('assets/icon-detail-candidate/download-pic.svg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-biodata mb-2">
                                                <div class="input-group-contact">
                                                    <div class="title-group-contact">
                                                        <span class="contact-required">*</span>
                                                        <p class="contact-title">Kartu Keluarga</p>
                                                    </div>
                                                    <div class="upload-group-contact">
                                                        <input type="file" class="input-contact" title="Upload Kartu Keluarga">
                                                        <img src="{{asset('assets/icon-detail-candidate/download-pic.svg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-biodata mb-2">
                                                <div class="input-group-contact">
                                                    <div class="title-group-contact">
                                                        <span class="contact-required">*</span>
                                                        <p class="contact-title">Transkrip Nilai</p>
                                                    </div>
                                                    <div class="upload-group-contact">
                                                        <input type="file" class="input-contact" title="Upload Transkrip Nilai">
                                                        <img src="{{asset('assets/icon-detail-candidate/download-pic.svg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-biodata mb-2">
                                                <div class="input-group-contact">
                                                    <div class="title-group-contact">
                                                        <span class="contact-required">*</span>
                                                        <p class="contact-title">Ijazah Pedidikan Terakhir</p>
                                                    </div>
                                                    <div class="upload-group-contact">
                                                        <input type="file" class="input-contact" title="Ijazah">
                                                        <img src="{{asset('assets/icon-detail-candidate/download-pic.svg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto profile-right" >
                                        <div class="card border-0 h-fit" id="ringkasanView">
                                            <div class="card-heading" style="border-bottom: 1px solid #E3E3E3;">
                                                <div class="wrap-title">
                                                    <p class="title">Ringkasan</p>
                                                    <button type="button" class="btn-none float-end w-fit" onclick="changeFormBiodata(1,'ringkasanView','ringkasanForm')"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p class="text">Developer dengan pengalaman lebih dari 5 tahun bekerja di sektor publik dan swasta. Diplomatik, berkepribadian, dan mahir dalam mengelola situasi sensitif. Sangat terorganisir, memiliki motivasi diri, dan mahir menggunakan komputer. Ingin meningkatkan nilai kepuasan mahasiswa untuk Universitas Internasional. Gelar sarjana di bidang komunikasi. <br><br>

                                                    Ini menggambarkan pengalaman, keterampilan, dan pencapaian kandidat yang relevan. Tujuan ringkasan karir ini adalah untuk menjelaskan kualifikasi Anda untuk pekerjaan itu dalam 3-5 kalimat dan meyakinkan manajer untuk membaca seluruh dokumen resume.</p>
                                            </div>
                                        </div>
                                        <div class="card border-0 h-fit d-none" id="ringkasanForm">
                                            <div class="card-heading" style="border-bottom: 1px solid #E3E3E3;">
                                                <div class="wrap-title">
                                                    <p class="title">Ringkasan</p>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <textarea name="" id="" class="ringkasan-input"></textarea>
                                                <div class="row-biodata-btn">
                                                    <button type="button" class="biodata-submit" onclick="changeFormBiodata(2,'ringkasanView','ringkasanForm')">Simpan</button>
                                                    <button type="button" class="biodata-cancel ms-2" onclick="changeFormBiodata(2,'ringkasanView','ringkasanForm')">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 h-fit mt-4">
                                            <div class="card-heading" style="border-bottom: 1px solid #E3E3E3;">
                                                <div class="wrap-title">
                                                    <p class="title">Pengalaman Kerja</p>
                                                    <button type="button" class="btn-none float-end w-fit" style="font-size: 14px;color: #3C3C3C;"><img src="{{asset('assets/icon-biodata/plus-dark-grey.svg')}}" alt=""> Tambah</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="profile-job-experience">
                                                    <div class="profile-job-icon">
                                                        <div class="profile-letter-icon text-center mx-auto"></div>
                                                    </div>
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5>Web Design & Development Team Leader</h5>
                                                        <p class="job-info">Tech Solutions Inc | May - September 2022 | 3 tahun pengalaman</p>
                                                        <p class="job-detail-info">
                                                            <img src="{{asset('assets/icon-biodata/location.svg')}}" alt=""> <span class="me-4">Depok</span>
                                                            <img src="{{asset('assets/icon-biodata/office.svg')}}" alt=""> <span class="me-4">Digital Marketing</span>
                                                            <img src="{{asset('assets/icon-biodata/briefcase.svg')}}" alt=""> <span class="me-4">Magang</span>
                                                            <img src="{{asset('assets/icon-biodata/money.svg')}}" alt=""> <span class="">IDR 7.500.000</span>
                                                        </p>
                                                        <p class="job-description-title">Deskripsi Pekerjaan:</p>
                                                        <ul class="job-list-desc">
                                                            <li>Bertanggung jawab untuk pengembangan perangkat lunak.</li>
                                                            <li>Merancang dan mengimplementasikan solusi teknis.</li>
                                                            <li>Berkolaborasi dengan tim untuk meningkatkan produk.</li>
                                                            <li>Terlibat dalam pengembangan aplikasi web menggunakan berbagai bahasa pemrograman.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-experience-input">
                                                    <div class="wrap-input-exp px-4">
                                                        <div class="wrap-input-left">
                                                            <div class="row-biodata-input">
                                                                <p class="text">Nama Pekerjaan</p>
                                                                <input type="text" name="" id="" class="biodata-input">
                                                            </div>
                                                            <div class="row-biodata-input">
                                                                <p class="text">Lokasi</p>
                                                                <input type="text" name="" id="" class="biodata-input">
                                                            </div>
                                                            <div class="row-biodata-input">
                                                                <p class="text">Tipe Pekerjaan</p>
                                                                <input type="text" name="" id="" class="biodata-input">
                                                            </div>
                                                            <div class="row-biodata-input">
                                                                <p class="text">Gaji</p>
                                                                <input type="text" name="" id="" class="biodata-input">
                                                            </div>
                                                        </div>
                                                        <div class="wrap-input-right">
                                                            <div class="row-biodata-input">
                                                                <p class="text">Nama Perusahaan</p>
                                                                <input type="text" name="" id="" class="biodata-input">
                                                            </div>
                                                            <div class="row-biodata-input">
                                                                <p class="text">Mulai Bekerja</p>
                                                                <div class="d-flex">
                                                                    <select id="month" class="biodata-input px-2 me-2">
                                                                        <option value="" disabled selected>Month</option>
                                                                        <option value="Jan">Jan</option>
                                                                        <option value="Feb">Feb</option>
                                                                        <option value="Mar">Mar</option>
                                                                        <option value="Apr">Apr</option>
                                                                        <option value="May">May</option>
                                                                        <option value="Jun">Jun</option>
                                                                        <option value="Jul">Jul</option>
                                                                        <option value="Aug">Aug</option>
                                                                        <option value="Sep">Sep</option>
                                                                        <option value="Oct">Oct</option>
                                                                        <option value="Nov">Nov</option>
                                                                        <option value="Dec">Dec</option>
                                                                    </select>
                                                                    <select class="biodata-input px-2 year-select">
                                                                        <option value="" disabled selected>Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row-biodata-input">
                                                                <p class="text">Selesai Bekerja</p>
                                                                <div class="d-flex">
                                                                    <select id="month" class="biodata-input px-2 me-2">
                                                                        <option value="" disabled selected>Month</option>
                                                                        <option value="Jan">Jan</option>
                                                                        <option value="Feb">Feb</option>
                                                                        <option value="Mar">Mar</option>
                                                                        <option value="Apr">Apr</option>
                                                                        <option value="May">May</option>
                                                                        <option value="Jun">Jun</option>
                                                                        <option value="Jul">Jul</option>
                                                                        <option value="Aug">Aug</option>
                                                                        <option value="Sep">Sep</option>
                                                                        <option value="Oct">Oct</option>
                                                                        <option value="Nov">Nov</option>
                                                                        <option value="Dec">Dec</option>
                                                                    </select>
                                                                    <select class="biodata-input px-2 year-select">
                                                                        <option value="" disabled selected>Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row-biodata-input d-flex">
                                                                <input type="checkbox" name="" id="" style="accent-color: #FA6900; width: 20px;margin-right: 10px;">
                                                                <p class="text" style="font-weight: 400;">Saat ini saya bekerja di sini</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-input-desc">
                                                        <div class="row-biodata-input">
                                                            <p class="text">Gaji</p>
                                                            <textarea name="" id="" class="biodata-textarea"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-job-experience">
                                                    <div class="profile-job-icon">
                                                        <div class="profile-letter-icon text-center mx-auto"></div>
                                                    </div>
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5>UI/UX</h5>
                                                        <p class="job-info">Tech Solutions Inc | May - September 2022 | 3 tahun pengalaman</p>
                                                        <p class="job-detail-info">
                                                            <img src="{{asset('assets/icon-biodata/location.svg')}}" alt=""> <span class="me-4">Depok</span>
                                                            <img src="{{asset('assets/icon-biodata/office.svg')}}" alt=""> <span class="me-4">Digital Marketing</span>
                                                            <img src="{{asset('assets/icon-biodata/briefcase.svg')}}" alt=""> <span class="me-4">Magang</span>
                                                            <img src="{{asset('assets/icon-biodata/money.svg')}}" alt=""> <span class="">IDR 7.500.000</span>
                                                        </p>
                                                        <p class="job-description-title">Deskripsi Pekerjaan:</p>
                                                        <ul class="job-list-desc">
                                                            <li>Bertanggung jawab untuk pengembangan perangkat lunak.</li>
                                                            <li>Merancang dan mengimplementasikan solusi teknis.</li>
                                                            <li>Berkolaborasi dengan tim untuk meningkatkan produk.</li>
                                                            <li>Terlibat dalam pengembangan aplikasi web menggunakan berbagai bahasa pemrograman.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-experience">
                                                    <div class="profile-job-icon">
                                                        <div class="profile-letter-icon text-center mx-auto"></div>
                                                    </div>
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5>Project Manager</h5>
                                                        <p class="job-info">Tech Solutions Inc | May - September 2022 | 3 tahun pengalaman</p>
                                                        <p class="job-detail-info">
                                                            <img src="{{asset('assets/icon-biodata/location.svg')}}" alt=""> <span class="me-4">Depok</span>
                                                            <img src="{{asset('assets/icon-biodata/office.svg')}}" alt=""> <span class="me-4">Digital Marketing</span>
                                                            <img src="{{asset('assets/icon-biodata/briefcase.svg')}}" alt=""> <span class="me-4">Magang</span>
                                                            <img src="{{asset('assets/icon-biodata/money.svg')}}" alt=""> <span class="">IDR 7.500.000</span>
                                                        </p>
                                                        <p class="job-description-title">Deskripsi Pekerjaan:</p>
                                                        <ul class="job-list-desc">
                                                            <li>Bertanggung jawab untuk pengembangan perangkat lunak.</li>
                                                            <li>Merancang dan mengimplementasikan solusi teknis.</li>
                                                            <li>Berkolaborasi dengan tim untuk meningkatkan produk.</li>
                                                            <li>Terlibat dalam pengembangan aplikasi web menggunakan berbagai bahasa pemrograman.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 h-fit mt-4">
                                            <div class="card-heading" style="border-bottom: 1px solid #E3E3E3;">
                                                <div class="wrap-title">
                                                    <p class="title">Pendidikan</p>
                                                    <button type="button" class="btn-none float-end w-fit" style="font-size: 14px;color: #3C3C3C;"><img src="{{asset('assets/icon-biodata/plus-dark-grey.svg')}}" alt=""> Tambah</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="profile-job-experience pendidikan">
                                                    <div class="profile-job-icon">
                                                        <div class="profile-letter-icon text-center mx-auto"></div>
                                                    </div>
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5>Universitas Indonesia</h5>
                                                        <p class="job-info">Sarjana, Ilmu Komputer | Depok</p>
                                                        <div class="pendidikan-detail-info">
                                                            <table class="table-borderless">
                                                                <tr>
                                                                    <td width="100px">Jurusan</td>
                                                                    <td>Sistem Informasi</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>IPK</td>
                                                                    <td>3,61</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-job-experience pendidikan">
                                                    <div class="profile-job-icon">
                                                        <div class="profile-letter-icon text-center mx-auto"></div>
                                                    </div>
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5>SMA Negeri 14</h5>
                                                        <p class="job-info">Jakarta</p>
                                                        <div class="pendidikan-detail-info">
                                                            <table class="table-borderless">
                                                                <tr>
                                                                    <td width="100px">Jurusan</td>
                                                                    <td>IPA</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>IPK</td>
                                                                    <td>83</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-job-experience pendidikan">
                                                    <div class="profile-job-icon">
                                                        <div class="profile-letter-icon text-center mx-auto"></div>
                                                    </div>
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5>SMP Negeri 4</h5>
                                                        <p class="job-info">Kendal</p>
                                                        <div class="pendidikan-detail-info">
                                                            <table class="table-borderless">
                                                                <tr>
                                                                    <td width="100px">Jurusan</td>
                                                                    <td>IPA</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>IPK</td>
                                                                    <td>83</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 h-fit mt-4">
                                            <div class="card-heading" style="border-bottom: 1px solid #E3E3E3;">
                                                <div class="wrap-title">
                                                    <p class="title">Pelatihan/Sertifikasi</p>
                                                    <button type="button" class="btn-none float-end w-fit" style="font-size: 14px;color: #3C3C3C;"><img src="{{asset('assets/icon-biodata/plus-dark-grey.svg')}}" alt=""> Tambah</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="profile-job-details position-relative">
                                                    <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                    <h5 class="mb-3">Professional Certified - CEP CCIT Fakultas Teknik Universitas Indonesia</h5>
                                                    <div class="row pelatihan-info">
                                                        <div class="col-md-auto left">
                                                            <div class="wrap-pelatihan-info mb-2">
                                                                <img src="{{asset('assets/icon-profile/date-grey.svg')}}" alt="" class="me-2">
                                                                <p>29 Oktober 2020</p>
                                                            </div>
                                                            <div class="wrap-pelatihan-info">
                                                                <img src="{{asset('assets/icon-profile/files-grey.svg')}}" alt="" class="me-2">
                                                                <p>IT Professional in Software Engineering</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-auto my-auto">
                                                            <div class="wrap-pelatihan-file">
                                                                <img src="{{asset('assets/icon-profile/file-grey.svg')}}" alt="" class="me-3">
                                                                <div class="info">
                                                                    <p>sertifikasi.pdf</p>
                                                                    <p>12.5 MB</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 h-fit mt-4">
                                            <div class="card-heading" style="border-bottom: 1px solid #E3E3E3;">
                                                <div class="wrap-title">
                                                    <p class="title">Pengalaman Organisasi</p>
                                                    <button type="button" class="btn-none float-end w-fit" style="font-size: 14px;color: #3C3C3C;"><img src="{{asset('assets/icon-biodata/plus-dark-grey.svg')}}" alt=""> Tambah</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="profile-job-details position-relative">
                                                    <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                    <h5 class="mb-3">BEM Fakultas Teknik - Universitas Indonesia</h5>
                                                    <div class="row pelatihan-info">
                                                        <div class="col-md-auto left">
                                                            <div class="wrap-pelatihan-info mb-2">
                                                                <img src="{{asset('assets/icon-profile/clock-grey.svg')}}" alt="" class="me-2">
                                                                <p>2018 - 2020</p>
                                                            </div>
                                                            <div class="wrap-pelatihan-info">
                                                                <img src="{{asset('assets/icon-profile/person-grey.svg')}}" alt="" class="me-2">
                                                                <p>Sekertaris</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 h-fit mt-4">
                                            <div class="card-heading" style="border-bottom: 1px solid #E3E3E3;">
                                                <div class="wrap-title">
                                                    <p class="title">Keterampilan</p>
                                                    <button type="button" class="btn-none float-end w-fit" style="font-size: 14px;color: #3C3C3C;"><img src="{{asset('assets/icon-biodata/plus-dark-grey.svg')}}" alt=""> Tambah</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="profile-job-experience keterampilan">
                                                    <div class="profile-job-icon">
                                                        <div class="profile-letter-icon text-center mx-auto"></div>
                                                    </div>
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5 class="mt-3 mb-3">Softskill</h5>
                                                        <ul class="job-list-desc p-0">
                                                            Kreatif, Rasa Ingin Tahu, Komunikasi, Pemecahan Masalah, Berpikir Kritis, Kemampuan Multitasking, Kerja Sama Tim dan Kolaborasi, Motivasi Diri, Analisis, Terorganisir.
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-experience keterampilan">
                                                    <div class="profile-job-icon">
                                                        <div class="profile-letter-icon text-center mx-auto"></div>
                                                    </div>
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5 class="mt-3 mb-3">Hardskill</h5>
                                                        <ul class="job-list-desc p-0">
                                                            Python, JavaScript, Kotlin, ReactJS, Angular, Node.js
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-experience keterampilan">
                                                    <div class="profile-job-icon">
                                                        <div class="profile-letter-icon text-center mx-auto"></div>
                                                    </div>
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5 class="mt-3 mb-3">Webinar</h5>
                                                        <ul class="job-list-desc p-0">
                                                            Kominfo - Pengenalan Keamanan Data dalam Infrastruktur IT (2022) <br>
                                                            Gojek - Inovasi dalam Pengembangan Aplikasi Mobile (2019)
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 h-fit mt-4 card-bahasa">
                                            <div class="card-heading" style="border-bottom: 1px solid #E3E3E3;">
                                                <div class="wrap-title">
                                                    <p class="title">Bahasa</p>
                                                    <button type="button" class="btn-none float-end w-fit" style="font-size: 14px;color: #3C3C3C;"><img src="{{asset('assets/icon-biodata/plus-dark-grey.svg')}}" alt=""> Tambah</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="profile-bahasa">
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5 class="mb-3 mt-0">Inggris</h5>
                                                        <div class="pendidikan-detail-info">
                                                            <table class="table-borderless">
                                                                <tr>
                                                                    <td width="100px">Berbicara</td>
                                                                    <td>Baik</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Menulis</td>
                                                                    <td>Baik</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-bahasa">
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5 class="mb-3 mt-0">Indonesia</h5>
                                                        <div class="pendidikan-detail-info">
                                                            <table class="table-borderless">
                                                                <tr>
                                                                    <td width="100px">Berbicara</td>
                                                                    <td>Lancar</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Menulis</td>
                                                                    <td>Lancar</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-bahasa">
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5 class="mb-3 mt-0">Jepang</h5>
                                                        <div class="pendidikan-detail-info">
                                                            <table class="table-borderless">
                                                                <tr>
                                                                    <td width="100px">Berbicara</td>
                                                                    <td>Lumayan</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Menulis</td>
                                                                    <td>Baik</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-bahasa">
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5 class="mb-3 mt-0">Jerman</h5>
                                                        <div class="pendidikan-detail-info">
                                                            <table class="table-borderless">
                                                                <tr>
                                                                    <td width="100px">Berbicara</td>
                                                                    <td>Buruk</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Menulis</td>
                                                                    <td>Buruk</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-bahasa">
                                                    <div class="profile-job-details position-relative">
                                                        <button type="button" class="btn-none position-absolute w-fit" style="right: 0;top: 0;"><img src="{{asset('assets/icon-detail-candidate/edit-orange.svg')}}" alt=""></button>
                                                        <h5 class="mb-3 mt-0">Jawa</h5>
                                                        <div class="pendidikan-detail-info">
                                                            <table class="table-borderless">
                                                                <tr>
                                                                    <td width="100px">Berbicara</td>
                                                                    <td>Lancar</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Menulis</td>
                                                                    <td>Buruk</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md detail-top">
                    <img src="{{asset('assets/profile_img/'.$c->foto_profile)}}" alt="" class="profile-foto-2 my-auto">
                    <div class="d-flex my-auto" style="flex-flow: column !important;">
                        <div class="d-flex">
                            <p class="d-top name me-3">{{$c->nama}}</p>
                            <div class="rating" id="rating-container" user-id="{{$user->id}}" candidate-id="{{$c->id_candidate}}">
                                <span class="star @if($c->rating >= 1) active @endif" data-value="1">&#9733;</span>
                                <span class="star @if($c->rating >= 2) active @endif" data-value="2">&#9733;</span>
                                <span class="star @if($c->rating >= 3) active @endif" data-value="3">&#9733;</span>
                                <span class="star @if($c->rating >= 4) active @endif" data-value="4">&#9733;</span>
                                <span class="star @if($c->rating >= 5) active @endif" data-value="5">&#9733;</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <img src="{{asset('assets/icon-detail-candidate/work.svg')}}" alt="">
                            <p class="d-top info">Marketing at Lazada</p>
        
                            <img src="{{asset('assets/icon-detail-candidate/location.svg')}}" alt="">
                            <p class="d-top info">{{$c->domisili}}</p>
        
                            <img src="{{asset('assets/icon-detail-candidate/email.svg')}}" alt="">
                            <p class="d-top info">{{$c->email}}</p>
        
                            <img src="{{asset('assets/icon-detail-candidate/call.svg')}}" alt="">
                            <p class="d-top info">{{$c->no_hp}}</p>
                        </div>
                        <div class="d-flex">
                            <div class="dropdown ">
                                <button type="button" class="btn-add-tag" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('assets/icon-detail-candidate/plus.svg')}}" alt="">Add Tag</button>
                                <ul class="dropdown-menu dropdown-add-tag" style="width: 10px !important;">
                                    <li class="d-flex mb-2"> 
                                        <img class="me-2" src="{{asset('assets/icon-detail-candidate/plus-grey.svg')}}" alt="">
                                        <p class="text my-auto">New Tag</p>
                                    </li>
                                    <li class="d-flex mb-2"> 
                                        <img class="me-2" src="{{asset('assets/icon-detail-candidate/tag-stop.svg')}}" alt="">
                                        <p class="text my-auto">Stop</p>
                                        <div class="form-check form-check align-self-end input" style="display: flex;">
                                            <input class="form-check-input input" type="checkbox" role="check">
                                        </div>
                                    </li>
                                    <li class="d-flex mb-2"> 
                                        <img class="me-2" src="{{asset('assets/icon-detail-candidate/tag-lanjut.svg')}}" alt="">
                                        <p class="text my-auto">Lanjut</p>
                                        <div class="form-check form-check align-self-end input" style="display: flex;">
                                            <input class="form-check-input input" type="checkbox" role="check">
                                        </div>
                                    </li>
                                    <li class="d-flex mb-2"> 
                                        <img class="me-2" src="{{asset('assets/icon-detail-candidate/tag-blacklist.svg')}}" alt="">
                                        <p class="text my-auto">Blacklist</p>
                                        <div class="form-check form-check align-self-end input" style="display: flex;">
                                            <input class="form-check-input input" type="checkbox" role="check">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="d-flex ms-auto">
                        <button type="button" class="btn-schedule my-auto" data-bs-toggle="modal" data-bs-target="#scheduleModal"><img src="{{asset('assets/icon-detail-candidate/calendar.svg')}}" alt="">Schedule</button>
                        <button type="button" class="btn-none my-auto ms-2"  data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('assets/icon-detail-candidate/3-dots.svg')}}" alt=""></button>
                        <ul class="dropdown-menu dropdown-more">
                            <li class="d-flex" style="margin-bottom: 5px;" data-bs-toggle="modal" data-bs-target="#profileModal"> 
                                <img class="me-2" src="{{asset('assets/icon-detail-candidate/edit.svg')}}" alt="">
                                <p class="text my-auto">Edit Candidates</p>
                            </li>
                            <li class="d-flex" style="margin-bottom: 5px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> 
                                <img class="me-2" src="{{asset('assets/icon-detail-candidate/move.svg')}}" alt="">
                                <p class="text my-auto">Move Candidates</p>
                            </li>
                            <li class="d-flex" style="margin-bottom: 5px;" data-bs-toggle="modal" data-bs-target="#sharemodal"> 
                                <img class="me-2" src="{{asset('assets/icon-detail-candidate/share.svg')}}" alt="">
                                <p class="text my-auto">Share Candidates</p>
                            </li>
                            <li class="d-flex" style="margin-bottom: 5px;"> 
                                <img class="me-2" src="{{asset('assets/icon-detail-candidate/print.svg')}}" alt="">
                                <p class="text my-auto">Print Profile</p>
                            </li>
                            <li class="d-flex" style="margin-bottom: 5px;"> 
                                <img class="me-2" src="{{asset('assets/icon-detail-candidate/delete.svg')}}" alt="">
                                <p class="text my-auto">Delete</p>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row detail-bottom" style="">
                <ul class="nav nav-tabs detail-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="resume-tab" data-bs-toggle="tab" data-bs-target="#resume" type="button" role="tab" aria-controls="resume" aria-selected="true">resume</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="question-tab" data-bs-toggle="tab" data-bs-target="#question" type="button" role="tab" aria-controls="question" aria-selected="false">question job</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="process-tab" data-bs-toggle="tab" data-bs-target="#process" type="button" role="tab" aria-controls="process" aria-selected="false">process</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="false">history candidate</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false">log activity</button>
                    </li>
                  </ul>
                  @foreach($job as $j)
                  <div class="tab-content detail-tabs-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="resume" role="tabpanel" aria-labelledby="resume-tab">
                        <div class="btn-group-cv">
                            <p class="text-no-job">Lamaran untuk <span>{{$j->nomor_job}}</span></p>
                            <button type="button" class="btn-print" id="btn-print"><img src="{{asset('assets/icon-detail-candidate/cv-print.svg')}}" alt=""> Print</button>
                            <button type="button" class="btn-download" id="btn-download"><img src="{{asset('assets/icon-detail-candidate/cv-download.svg')}}" alt=""> Download</button>
                        </div>
                        <div class="row">
                            <div class="col-md-auto">
                                <div class="card card-notes">
                                    <div class="card-heading">
                                        <p class="alert">Notes</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="/notes/add" method="post">
                                            @csrf
                                            <input type="text" name="id_candidate" id="id-candidate" value="{{$c->id_candidate}}" hidden>
                                            <input type="text" name="id_user" id="id-user" value="{{$user->id}}" hidden>
                                            <textarea class="resume-note" name="resume-note" id="" style="" placeholder="Add note"></textarea>
                                            <button type="submit" class="btn-add-note float-end">Add Note</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="foto-cv">
                                    <img src="{{asset('assets/cv/'.$c->foto_cv)}}" alt="" id="cvImage" nameCandidate="{{$c->nama}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="question" role="tabpanel" aria-labelledby="question-tab">
                        <p class="text-no-job">Lamaran untuk <span>{{$j->nomor_job}}</span></p>
                        <div class="card card-question">
                            <div class="card-heading d-flex">
                                <p class="">Detail</p>
                                <button type="button" class="btn-none ms-auto"><img src="{{asset('assets/icon-detail-candidate/edit-underline.svg')}}" alt=""></button>
                            </div>
                            <div class="card-body p-0 pt-3">
                                <div class="q-a">
                                    <p class="q">Berapa tahun pengalaman Admin Administrasi yang anda miliki?</p>
                                    <p class="a">3</p>
                                </div>
                                <div class="q-a">
                                    <p class="q">Formula excel apa yang kamu ketahui</p>
                                    <p class="a">SUM, IF, VLOOKUP</p>
                                </div>
                                <div class="q-a">
                                    <p class="q">Informasi Lowongan</p>
                                    <p class="a">Karyawan ISH</p>
                                </div>
                                <div class="q-a">
                                    <p class="q">Berapa tahun pengalaman Admin Administrasi yang anda miliki?</p>
                                    <p class="a">3</p>
                                </div>
                                <div class="q-a">
                                    <p class="q">Formula excel apa yang kamu ketahui</p>
                                    <p class="a">SUM, IF, VLOOKUP</p>
                                </div>
                                <div class="q-a">
                                    <p class="q">Informasi Lowongan</p>
                                    <p class="a">Karyawan ISH</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="process" role="tabpanel" aria-labelledby="process-tab">
                        <p class="text-no-job">Lamaran untuk <span>{{$j->nomor_job}}</span></p>
                        <div class="step-container">
                            @php
                            $process = $c->process;
                            $p = 0;
                            if($process == 'screening'){
                                $p = 1;
                            }elseif($process == 'psikotest'){
                                $p = 2;
                            }elseif($process == 'interview_hr'){
                                $p = 3;
                            }elseif($process == 'interview_user'){
                                $p = 4;
                            }elseif($process == 'reject'){
                                $p = 5;
                            }elseif($process == 'hiring'){
                                $p = 6;
                            }
                            
                            @endphp
                            <div class="step @if($p < 1) inactive @endif"><p class="">Screening</p></div>
                            <div class="step @if($p < 2) inactive @endif"><p class="">Psikotest</p></div>
                            <div class="step @if($p < 3) inactive @endif"><p class="">Interview HR</p></div>
                            <div class="step @if($p < 4) inactive @endif"><p class="">Interview User</p></div>
                            <div class="step @if($p < 5) inactive @endif"><p class="">Reject</p></div>
                            <div class="step @if($p < 6) inactive @endif"><p class="">Hiring</p></div>
                        </div>
                        <div class="card card-question" id="detail-view">
                            <div class="card-heading d-flex">
                                <p class="">Detail</p>
                                <button type="button" id="btn-detail-edit" onclick="changeForm(1)" class="btn-none ms-auto" style="font-size: 14px;color: #41806D;font-weight: 500;"><img src="{{asset('assets/icon-detail-candidate/edit-underline.svg')}}" alt=""> Edit Schedule</button>
                            </div>
                            <div class="card-body p-0 pt-3">
                                <div class="row">
                                    <div class="col-md-auto" style="width: 520px;">
                                        <div class="q-a">
                                            <p class="q mb-1">Current Status</p>
                                            @php
                                            $status = $c->status;
                                            $process = $c->process;
                                            @endphp
                                            @if($status == 'on_process_hire')
                                            <span class="a-process">ON PROCESS</span>
                                            @elseif($status == 'waiting_schedule_hire')
                                            <span class="a-process">waiting schedule</span>
                                            @elseif($status == 'waiting_approval_hire')
                                            <span class="a-process">waiting approval</span>
                                            @elseif($status == 'cancel_join')
                                            <span class="a-process">cancel join</span>
                                            @elseif($status == 'on_process')
                                            <span class="a-process">on process</span>
                                            @elseif($status == 'done_hire')
                                            <span class="a-process">done</span>
                                            @elseif($status == 'reject_hire')
                                            <span class="a-process">reject</span>
                                            @elseif($status == 'pass_hire')
                                            <span class="a-process">pass</span>
                                            @elseif($status == 'failed_hire')
                                            <span class="a-process">failed</span>
                                            @else
                                            <span class="a-process">{{$status}}</span>
                                            @endif
                                        </div>
                                        <div class="q-a">
                                            <p class="q">Stage</p>
                                            @if($process == 'interview_hr')
                                            <p class="a">interview HR</p>
                                            @elseif($process == 'interview_user')
                                            <p class="a">interview user</p>
                                            @else
                                            <p class="a">{{$process}}</p>
                                            @endif
                                        </div>
                                        <div class="q-a">
                                            <p class="q">Date</p>
                                            <p class="a">28 Nov - 6 Dec 2023</p>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="q-a">
                                            <p class="q">Assignee</p>
                                            <div class="profile-assignee">
                                                <img src="{{asset('assets/profile_img/profile_user/'.$user->foto_profile)}}" class="profile-foto-3" alt="">
                                                <p class="a my-auto">{{$user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="wrap-btn">
                                            <button type="button" class="btn-reject">Reject</button>
                                            <button type="button" class="btn-lolos">Lolos</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-question d-none" id="detail-form">
                            <div class="card-heading d-flex">
                                <p class="">Detail</p>
                                <button type="button" class="btn-save ms-auto" onclick="changeForm(2)" id="btn-detail-save">Save</button>
                            </div>
                            <div class="card-body p-0 pt-3">
                                <div class="row">
                                    <div class="col-md-auto" style="width: 520px;">
                                        <div class="q-a">
                                            <p class="q mb-1">Interview Result</p>
                                            <select name="" id="" class="select-date" style="padding: 7px 17px;">
                                                <option value="" selected disabled>Pass/Failed</option>
                                                <option value="pass">Pass</option>
                                                <option value="failed">Failed</option>
                                            </select>
                                        </div>
                                        <div class="q-a">
                                            <p class="q">Stage</p>
                                            @if($process == 'interview_hr')
                                            <p class="a">interview HR</p>
                                            @elseif($process == 'interview_user')
                                            <p class="a">interview user</p>
                                            @else
                                            <p class="a">{{$process}}</p>
                                            @endif
                                        </div>
                                        <div class="q-a">
                                            <p class="q">Date</p>
                                            <div class="group-select">
                                                <select name="" id="dateSelect" class="select-date"></select>
                                                <img src="{{asset('assets/icon-detail-candidate/select-arrow.svg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="q-a">
                                            <p class="q">PIC</p>
                                            <select class="select-pic" id="choose-pic" data-placeholder="Pilih PIC" multiple>
                                                @foreach($users as $u)
                                                <option value="{{$u->id}}">{{$u->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="group-upload">
                                            <input type="file" name="" id="" class="upload-input" placeholder="Upload">
                                            <img src="{{asset('assets/icon-detail-candidate/download-pic.svg')}}" alt="">
                                        </div>
                                        <div class="wrap-btn">
                                            <button type="button" class="btn-reject">Reject</button>
                                            <button type="button" class="btn-lolos">Lolos</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-question mt-4" id="detail-comment">
                            <div class="card-heading d-flex">
                                <p class="">Notes</p>
                                <button type="button" id="btn-detail-comment" onclick="commenting()" class="btn-none ms-auto" style="font-size: 14px;color: #41806D;font-weight: 500;"><img src="{{asset('assets/icon-detail-candidate/plus-green.svg')}}" alt=""> <b>Add Note</b></button>
                            </div>
                            <div class="card-body p-0 pt-3">
                                <div class="row row-comment d-none mb-3" id="row-commenting">
                                    <div class="col-md view-comment">
                                        <img src="{{asset('assets/profile_img/profile_user/'.$user->foto_profile)}}" alt="" class="profile-foto">
                                        <form id="noteForm" method="post">
                                            <div class="d-flex my-auto" style="flex-flow: column !important;">
                                                <div class="d-flex">
                                                    <p class="note name me-3 mb-2">{{$user->name}}</p>
                                                    <input type="text" name="" id="id-candidate" value="{{$c->id_candidate}}" hidden>
                                                    <input type="text" name="" id="id-user" value="{{$user->id}}" hidden>
                                                </div>
                                                <div class="d-flex">
                                                    <textarea name="" id="note-input" class="input-comment mb-3" placeholder="Tulis notes tentang kandidat"></textarea>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="submit" class="btn-comment" id="btn-send-comment">Send Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="note-new p-0 m-0">
                                    @php
                                    $check = 0;
                                    @endphp
                                    @foreach($notes as $n)
                                    @php
                                    $check++;
                                    @endphp
                                    <div class="row row-comment c">
                                        <div class="col-md view-comment">
                                            <img src="{{asset('assets/profile_img/profile_user/'.$n->user_profile)}}" alt="" class="profile-foto my-auto">
                                            <div class="d-flex my-auto" style="flex-flow: column !important;">
                                                <div class="d-flex">
                                                    <p class="note name me-3">{{$n->user_name}}</p>
                                                    <p class="note date">{{date("d M Y",strtotime($n->time)) . " ● ".date('h:i A',strtotime($n->time))}}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="note comment">{{$n->note}}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex ms-auto">
                                                <button type="button" class="btn-none my-auto"><img src="{{asset('assets/icon-detail-candidate/comment.svg')}}" alt=""></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="no-comment @if($check != 0) d-none @endif">
                                        <h3>Belum ada notes</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <p class="text-no-job">Lamaran untuk <span>{{$j->nomor_job}}</span></p>
                        <div class="container history-container mb-4">
                            <div class="history-head d-flex">
                                <p class="history-date">Tomorrow - 5 December 2023 (Tuesday)</p>
                                <div class="btn-group ms-auto">
                                    <button type="button" class="btn-none"><img src="{{asset('assets/icon-detail-candidate/edit-grey.svg')}}" alt=""></button>
                                    <button type="button" class="btn-none"><img src="{{asset('assets/icon-detail-candidate/delete-grey.svg')}}" alt=""></button>
                                </div>
                            </div>
                            <div class="row history-row">
                                <div class="col-md history-view">
                                    <img src="{{asset('assets/profile_img/profile_user/user1.jpg')}}" alt="" class="profile-foto my-auto">
                                    <div class="d-flex my-auto" style="flex-flow: column !important;">
                                        <div class="d-flex">
                                            <p class="note name me-3">Andi Setiawan</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="note comment">Forum Group Discussion - Online</p>
                                        </div>
                                    </div>
                                    <div class="d-flex my-auto ms-5" style="flex-flow: column !important;">
                                        <div class="d-flex">
                                            <p class="note name me-3">11:00 - 12:00 PM</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="note comment">1 Hour Interview</p>
                                        </div>
                                    </div>
                                    <div class="d-flex my-auto ms-5" style="flex-flow: column !important;">
                                        <div class="d-flex">
                                            <p class="note comment">Schedule by</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="note name me-3" style="font-weight: 400;">Andi Setiawan</p>
                                        </div>
                                    </div>
                                    <div class="d-flex ms-auto">
                                        <button type="button" class="btn-add-feedback my-auto">Add Feedback</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container history-container mb-4">
                            <div class="history-head d-flex">
                                <p class="history-date">1 December 2023 (Friday)</p>
                                <div class="btn-group ms-auto">
                                    <button type="button" class="btn-none"><img src="{{asset('assets/icon-detail-candidate/edit-grey.svg')}}" alt=""></button>
                                    <button type="button" class="btn-none"><img src="{{asset('assets/icon-detail-candidate/delete-grey.svg')}}" alt=""></button>
                                </div>
                            </div>
                            <div class="row history-row">
                                <div class="col-md history-view">
                                    <img src="{{asset('assets/profile_img/profile_user/user2.jpg')}}" alt="" class="profile-foto my-auto">
                                    <div class="d-flex my-auto" style="flex-flow: column !important;">
                                        <div class="d-flex">
                                            <p class="note name me-3">Susi Susanti</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="note comment">Screening Interview - Phone</p>
                                        </div>
                                    </div>
                                    <div class="d-flex my-auto ms-5" style="flex-flow: column !important;">
                                        <div class="d-flex">
                                            <p class="note name me-3">10:00 - 10:20 AM</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="note comment">20 Minutes Interview</p>
                                        </div>
                                    </div>
                                    <div class="d-flex my-auto ms-5" style="flex-flow: column !important;">
                                        <div class="d-flex">
                                            <p class="note comment">Schedule by</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="note name me-3" style="font-weight: 400;">Susi Susanti</p>
                                        </div>
                                    </div>
                                    <div class="d-flex ms-auto">
                                        <button type="button" class="btn-add-feedback my-auto">Add Feedback</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                        <p class="text-no-job">Lamaran untuk <span>{{$j->nomor_job}}</span></p>
                        <div class="card card-activity mt-4">
                            <div class="card-heading d-flex">
                                <p class="">Notes</p>
                            </div>
                            <div class="card-body p-0 pt-3">
                                @php
                                    $tgl = null;
                                    $tgl2 = null;
                                @endphp
                                @foreach($activity as $a)
                                    @php
                                        $tgl = date("j F, Y",strtotime($a->tgl));
                                    @endphp
                                    @if($tgl != $tgl2)
                                        <p class="activity-date">{{date("j F, Y",strtotime($a->tgl))}}</p>
                                        
                                    @else
                                        <div class="activity-line"></div>
                                    @endif
                                    @php
                                        $tgl2 = date("j F, Y",strtotime($a->tgl));
                                    @endphp
                                    <div class="activity-row">
                                        <img src="{{asset('assets/icon-detail-candidate/activity-'.$a->type.'.svg')}}" alt="">
                                        <p class="activity-desc my-auto">{{$a->deskripsi}}</p>
                                    </div>
                                    @endforeach
                                    @if($tgl == null)
                                        <p class="activity-desc my-auto">Belum ada activity</p>
                                    @endif
                            </div>
                        </div>
                    </div>
                  </div>
                  @endforeach
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Popper.js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Select2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- html2canvas (untuk screenshot CV) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- Moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            function generateDayOptions(selectElement) {
                for (let i = 1; i <= 31; i++) {
                const option = document.createElement("option");
                option.value = i;
                option.textContent = i;
                selectElement.appendChild(option);
                }
            }

            // Function to generate year options from 1950 to current year
            function generateYearOptions(selectElement) {
                const currentYear = new Date().getFullYear();
                for (let i = 1950; i <= currentYear; i++) {
                const option = document.createElement("option");
                option.value = i;
                option.textContent = i;
                selectElement.appendChild(option);
                }
            }

            // Apply to all elements with class "day-select"
            document.querySelectorAll('.day-select').forEach(generateDayOptions);

            // Apply to all elements with class "year-select"
            document.querySelectorAll('.year-select').forEach(generateYearOptions);
            
            document.getElementById('btn-print').addEventListener('click', function () {
                var printWindow = window.open('', '_blank');
                var cvImage = document.getElementById('cvImage').src;

                printWindow.document.open();
                printWindow.document.write(`
                    <html>
                    <head>
                        <title>Print CV</title>
                        <style>
                            body { text-align: center; }
                            img { width: 100%; }
                        </style>
                    </head>
                    <body>
                        <img src="${cvImage}" alt="CV">
                    </body>
                    </html>
                `);
                printWindow.document.close();

                // Menunggu sedikit sebelum memanggil window.print()
                setTimeout(function() {
                    printWindow.print();
                    printWindow.onafterprint = function() {
                        printWindow.close();
                    };
                }, 100); // Tunggu 100ms sebelum mencetak
            });

            document.getElementById('btn-download').addEventListener('click', function () {
                var cvImage = document.getElementById('cvImage');
                var nameCandidate = cvImage.getAttribute('nameCandidate');

                html2canvas(cvImage).then(canvas => {
                    const imgData = canvas.toDataURL('image/jpeg'); // Ganti 'image/jpeg' jika perlu

                    // Menggunakan window.jspdf untuk mengakses jsPDF
                    const { jsPDF } = window.jspdf;

                    // Buat objek pdf
                    const pdf = new jsPDF('p', 'mm', 'a4'); // Potret, mm, format A4
                    const imgWidth = 190; // Lebar gambar di PDF
                    const imgHeight = (canvas.height * imgWidth) / canvas.width; // Hitung tinggi gambar

                    // Menambahkan gambar ke PDF
                    pdf.addImage(imgData, 'JPEG', 10, 10, imgWidth, imgHeight);
                    pdf.save("CV-" + nameCandidate + ".pdf");
                });
            });
            $( '#choose-pic' ).select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: false,
            });
            $('#scheduleModal').on('shown.bs.modal', function () {
                $( '#select-kandidat' ).select2( {
                    dropdownParent: $('#scheduleModal'),
                    theme: "bootstrap-5",
                    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                    placeholder: $( this ).data( 'placeholder' ),
                    closeOnSelect: false,
                });
                $( '#select-pewawancara' ).select2( {
                    dropdownParent: $('#scheduleModal'),
                    theme: "bootstrap-5",
                    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                    placeholder: $( this ).data( 'placeholder' ),
                    closeOnSelect: false,
                });
                // $('#select-kandidat').select2({
                //     dropdownParent: $('#scheduleModal')
                // });
                // $('#select-pewawancara').select2({
                //     dropdownParent: $('#scheduleModal')
                // });
            });
            $('#btn-send-comment').on('click', function(e) {
                e.preventDefault();

                const noteData = {
                    id_candidate: $('#id-candidate').val(),
                    id_user: $('#id-user').val(),
                    time: formatDateToMySQL(new Date()),
                    note: $('#note-input').val(),
                };

                $.ajax({
                    url: 'notes',
                    type: 'POST',
                    data: noteData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            commenting();
                            var note = response.notes[0];
                            var noComment = document.getElementsByClassName('no-comment')[0];

                            var formattedTime = formatDateTime(note.time);
                            // Tambahkan note baru ke dalam list
                            const newNote = `
                                <div class="row row-comment">
                                    <div class="col-md view-comment">
                                        <img src="http://localhost/crocodic-project/public/assets/profile_img/profile_user/${note.user_profile}" alt="" class="profile-foto my-auto">
                                        <div class="d-flex my-auto" style="flex-flow: column !important;">
                                            <div class="d-flex">
                                                <p class="note name me-3">${note.user_name}</p>
                                                <p class="note date">${formattedTime}</p>
                                            </div>
                                            <div class="d-flex">
                                                <p class="note comment">${note.note}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex ms-auto">
                                            <button type="button" class="btn-none my-auto"><img src="{{asset('assets/icon-detail-candidate/comment.svg')}}" alt=""></button>
                                        </div>
                                    </div>
                                </div>
                            `;
                            if(!noComment.classList.contains('d-none')){
                                noComment.classList.add('d-none');
                            }
                            $('.note-new').prepend(newNote);
                            $('#note-input').val('');
                        } else {
                            alert('Failed to add note');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
                
            });
            function generateTimeOptions() {
                let options = '';
                for (let i = 0; i < 24; i++) {
                    for (let j = 0; j < 60; j += 30) {
                        const time = moment({ hour: i, minute: j }).format('hh:mm A');
                        options += `<option value="${time}">${time}</option>`;
                    }
                }
                return options;
            }

            $('#start-time').html(generateTimeOptions());
            $('#end-time').html(generateTimeOptions());

            function calculateTimeDifference() {
                const startTime = moment($('#start-time').val(), 'hh:mm A');
                const endTime = moment($('#end-time').val(), 'hh:mm A');
                const duration = moment.duration(endTime.diff(startTime));
                const minutes = duration.asMinutes();

                if (minutes < 0) {
                    $('#end-time').val($('#start-time').val());
                    $('.time-difference').text('(0 minutes)');
                } else {
                    $('.error-message').text('');
                    $('.time-difference').text(`(${minutes} minutes)`);
                }
            }

            $('#start-time, #end-time').on('change', calculateTimeDifference);

            calculateTimeDifference();
            const stars = document.querySelectorAll('.star');
            const userId = document.getElementById('rating-container').getAttribute('user-id');
            const candidateId = document.getElementById('rating-container').getAttribute('candidate-id');
            
            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.add('active');
                        } else {
                            s.classList.remove('active');
                        }
                    });
                    const value = parseFloat(star.getAttribute('data-value'));
                    console.log('Rated:', value);
                    
                    // Kirim rating ke server
                    const dataStarSend = {
                        id_kandidat: candidateId, // Ganti dengan ID kandidat yang sesuai
                        id_user: userId, // Ganti dengan ID user yang sesuai
                        rate: value,
                        tgl: new Date().toISOString().split('T')[0], // Format tanggal menjadi yyyy-mm-dd
                        _token: '{{ csrf_token() }}' // Jangan lupa menambahkan CSRF token
                    };
                    console.log('Data:', dataStarSend);

                    $.ajax({
                        url: '/candidates/detail/rating/add', // URL endpoint untuk menambahkan rating
                        type: 'POST',
                        data: dataStarSend,
                        success: function(response) {
                            console.log('Rating added successfully');
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                });
                
                star.addEventListener('mouseover', () => {
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.style.color = '#ffcc00';
                        } else {
                            s.style.color = '#ccc';
                        }
                    });
                });
                
                star.addEventListener('mouseout', () => {
                    stars.forEach((s, i) => {
                        if (s.classList.contains('active')) {
                            s.style.color = '#ffcc00';
                        } else {
                            s.style.color = '#ccc';
                        }
                    });
                });
            });
            

            function formatDateToMySQL(date) {
                return date.getFullYear() + '-' +
                    ('00' + (date.getMonth() + 1)).slice(-2) + '-' +
                    ('00' + date.getDate()).slice(-2) + ' ' + 
                    ('00' + date.getHours()).slice(-2) + ':' + 
                    ('00' + date.getMinutes()).slice(-2) + ':' + 
                    ('00' + date.getSeconds()).slice(-2);
            }

            function formatDateTime(datetimeString) {
                const date = new Date(datetimeString);

                const optionsDate = { day: '2-digit', month: 'short', year: 'numeric' };
                const formattedDate = date.toLocaleDateString('en-US', optionsDate);

                const optionsTime = { hour: '2-digit', minute: '2-digit', hour12: true };
                const formattedTime = date.toLocaleTimeString('en-US', optionsTime);

                return `${formattedDate} ● ${formattedTime}`;
            }
            
            const dateSelect = document.getElementById('dateSelect');
            const dateSelectSchedule = document.getElementById('dateSelectSchedule');
            const numberOfDays = 30; // Jumlah hari ke depan yang akan ditampilkan

            function formatDate(date) {
                const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
                const formattedDate = date.toLocaleDateString('en-US', options);
                const parts = formattedDate.split(', ');
                return `${parts[0]}, ${parts[1]} ${parts[2]}`;
            }

            function generateDates() {
                const today = new Date();
                for (let i = 0; i < numberOfDays; i++) {
                    const currentDate = new Date(today);
                    currentDate.setDate(today.getDate() + i);
                    const option = document.createElement('option');
                    option.value = currentDate.toISOString().split('T')[0]; // Format YYYY-MM-DD
                    option.textContent = formatDate(currentDate);
                    dateSelect.appendChild(option);
                }
            }
            function generateDatesSchedule() {
                const today = new Date();
                for (let i = 0; i < numberOfDays; i++) {
                    const currentDate = new Date(today);
                    currentDate.setDate(today.getDate() + i);
                    const option = document.createElement('option');
                    option.value = currentDate.toISOString().split('T')[0]; // Format YYYY-MM-DD
                    option.textContent = formatDate(currentDate);
                    dateSelectSchedule.appendChild(option);
                }
            }

            generateDates();
            generateDatesSchedule();
            const copyButton = document.getElementById('btnCopy');
            const inputText = document.getElementById('inputMeet');
            const copied = document.getElementById('textCopied');

            copyButton.addEventListener('click', () => {
                inputText.select();
                inputText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(inputText.value).then(() => {
                    copied.classList.remove('d-none');
                    let timeLeft = 3;

                    const countdown = setInterval(() => {
                        timeLeft--;

                        if (timeLeft <= 0) {
                            clearInterval(countdown);
                            copied.classList.add('d-none');
                            // messageElement.textContent = 'Time\'s up!';
                        }
                    }, 1000);
                }).catch(err => {
                    console.error('Failed to copy: ', err);
                });
            });
            var jobExperiences = document.querySelectorAll('.profile-job-experience');
            jobExperiences.forEach(jobExp => {
                var jobTitle = jobExp.querySelector('.profile-job-details h5').innerHTML;
                var icon = jobExp.querySelector('.profile-job-icon .profile-letter-icon');
                var firstLetter = jobTitle.charAt(0);

                icon.innerHTML = firstLetter;
            });
        });
        function changeForm(isEdit){
            var detailForm = document.getElementById('detail-form');
            var detailView = document.getElementById('detail-view');
            if(isEdit == 1){
                detailForm.classList.remove('d-none');
                detailView.classList.add('d-none');
            }else{
                detailForm.classList.add('d-none');
                detailView.classList.remove('d-none');
            }
        }
        function changeFormBiodata(isEdit,idView,idForm){
            var detailForm = document.getElementById(idForm);
            var detailView = document.getElementById(idView);
            if(isEdit == 1){
                detailForm.classList.remove('d-none');
                detailView.classList.add('d-none');
            }else{
                detailForm.classList.add('d-none');
                detailView.classList.remove('d-none');
            }
        }
        function commenting(){
            var divComment = document.getElementById('row-commenting');
            var btnComment = document.getElementById('btn-detail-comment');
            var btnSendComment = document.getElementById('btn-send-comment');
            if(divComment.classList.contains('d-none')){
                divComment.classList.remove('d-none');
                btnComment.classList.add('d-none');
            }else{
                btnComment.classList.remove('d-none');
                divComment.classList.add('d-none');
            }
        }
        function searchFunctionJobs() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput-11");
            filter = input.value.toUpperCase();
            table = document.getElementById("tableJobs");
            tr = table.getElementsByClassName("data");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
        }
        function copyInput() {
            // Get the text field
            var copyText = document.getElementById("linkJob");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
            
            // Alert the copied text
            alert("Copied the text: " + copyText.value);
        }
    </script>
</body>