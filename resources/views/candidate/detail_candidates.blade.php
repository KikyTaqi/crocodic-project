<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Load jQuery from CDN -->
    
    
    <!-- Scripts -->
    
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
                <div class="col-md detail-top">
                    <img src="{{asset('assets/profile_img/'.$c->foto_profile)}}" alt="" class="profile-foto-2 my-auto">
                    <div class="d-flex my-auto" style="flex-flow: column !important;">
                        <div class="d-flex">
                            <p class="d-top name me-3">{{$c->nama}}</p>
                            <div class="rating">
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
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
                        <button type="button" class="btn-schedule my-auto"><img src="{{asset('assets/icon-detail-candidate/calendar.svg')}}" alt="">Schedule</button>
                        <button type="button" class="btn-none my-auto ms-2"  data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('assets/icon-detail-candidate/3-dots.svg')}}" alt=""></button>
                        <ul class="dropdown-menu dropdown-more">
                            <li class="d-flex" style="margin-bottom: 5px;"> 
                                <img class="me-2" src="{{asset('assets/icon-detail-candidate/edit.svg')}}" alt="">
                                <p class="text my-auto">Edit Candidates</p>
                            </li>
                            <li class="d-flex" style="margin-bottom: 5px;"> 
                                <img class="me-2" src="{{asset('assets/icon-detail-candidate/move.svg')}}" alt="">
                                <p class="text my-auto">Move Candidates</p>
                            </li>
                            <li class="d-flex" style="margin-bottom: 5px;"> 
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
                                    @if(empty($notes) || $notes == null || $check == 0)
                                    <div class="no-comment">
                                        <h3>Belum ada notes</h3>
                                    </div>
                                    @endif
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
                                
                                <!-- <div class="activity-row">
                                    <img src="{{asset('assets/icon-detail-candidate/activity-duplicate.svg')}}" alt="">
                                    <p class="activity-desc my-auto">Kandidat diduplikasi ke lowongan pekerjaan 'Sales'</p>
                                </div>
                                <p class="activity-date">7 Desember, 2023</p>
                                <div class="activity-row">
                                    <img src="{{asset('assets/icon-detail-candidate/activity-duplicate.svg')}}" alt="">
                                    <p class="activity-desc my-auto">Kandidat diduplikasi ke lowongan pekerjaan 'Sales'</p>
                                </div>
                                <div class="activity-line"></div>
                                <div class="activity-row">
                                    <img src="{{asset('assets/icon-detail-candidate/activity-duplicate.svg')}}" alt="">
                                    <p class="activity-desc my-auto">Kandidat diduplikasi ke lowongan pekerjaan 'Sales'</p>
                                </div> -->
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


    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
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


            // document.getElementById('btn-download').addEventListener('click', function () {
            //     var cvImage = document.getElementById('cvImage');
            //     var nameCandidate = cvImage.getAttribute('nameCandidate');

            //     html2canvas(cvImage).then(canvas => {
            //         const imgData = canvas.toDataURL('image/jpeg'); // Anda bisa mengganti 'image/jpeg' dengan 'image/png' jika perlu
            //         const pdf = new jsPDF('p', 'mm', 'a4'); // Orientasi potret, satuan mm, format A4
            //         const imgWidth = 190; // Lebar gambar di PDF
            //         const imgHeight = (canvas.height * imgWidth) / canvas.width; // Hitung tinggi gambar sesuai rasio

            //         // Menambahkan gambar ke PDF
            //         pdf.addImage(imgData, 'JPEG', 10, 10, imgWidth, imgHeight);
            //         pdf.save("CV-" + nameCandidate + ".pdf");
            //     });
            // });

            // document.getElementById('btn-download').addEventListener('click', async function () {
            //     const cvImage = document.getElementById('cvImage').src;
            //     const nameCandidate = document.getElementById('cvImage').getAttribute('nameCandidate');

            //     // Mengambil gambar sebagai Blob
            //     const response = await fetch(cvImage);
            //     const blob = await response.blob();
            //     const imgData = await blob.arrayBuffer();

            //     // Membuat PDF
            //     const pdfDoc = await PDFLib.PDFDocument.create();
            //     const pngImage = await pdfDoc.embedPng(imgData); // Anda juga bisa menggunakan embedJpg untuk format JPG
            //     const page = pdfDoc.addPage([pngImage.width, pngImage.height]);
            //     page.drawImage(pngImage, {
            //         x: 0,
            //         y: 0,
            //         width: pngImage.width,
            //         height: pngImage.height,
            //     });

            //     // Mengunduh PDF
            //     const pdfBytes = await pdfDoc.save();
            //     const blobPdf = new Blob([pdfBytes], { type: 'application/pdf' });
            //     const url = URL.createObjectURL(blobPdf);
            //     const a = document.createElement('a');
            //     a.href = url;
            //     a.download = `CV-${nameCandidate}.pdf`;
            //     document.body.appendChild(a);
            //     a.click();
            //     document.body.removeChild(a);
            // });




            
            // document.getElementById('btn-download').addEventListener('click', function () {
            //     var cvImage = document.getElementById('cvImage');
            //     var nameCandidate = cvImage.getAttribute('nameCandidate');
            //     html2canvas(cvImage).then(canvas => {
            //         canvas.toBlob(function(blob) {
            //             saveAs(blob, "CV-"+nameCandidate+".pdf");
            //         });
            //     });
            // });
            $( '#choose-pic' ).select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: false,
            } );
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
            const stars = document.querySelectorAll('.star');
            
            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.add('active');
                        } else {
                            s.classList.remove('active');
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

            generateDates();
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
    </script>
</body>