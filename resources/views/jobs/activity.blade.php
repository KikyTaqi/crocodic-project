<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>


    <title>Activity</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #F5F5F5;
        }
        
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        :root {
            --c-grey-100: #f4f6f8;
            --c-grey-200: #e3e3e3;
            --c-grey-300: #b2b2b2;
            --c-grey-400: #7b7b7b;
            --c-grey-500: #3d3d3d;

            --c-blue-500: #688afd;
        }

        .timeline {
            width: 85%;
            max-width: 700px;
            display: flex;
            flex-direction: column;
            padding: 32px 0 32px 32px;
            border-left: 2px solid var(--c-grey-200);
            font-size: 16px;
        }

        .timeline-item {
            display: flex;
            gap: 24px;
        }

        .timeline-item + * {
            margin-top: 24px;
        }

        .timeline-item + .extra-space {
            margin-top: 30px;
        }


        .timeline-item-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: -52px;
            flex-shrink: 0;
            overflow: hidden;
            box-shadow: 0 0 0 6px #fff;
        }

        .timeline-item-icon img {
            width: 40px;
            height: 40px;
        }

        .timeline-item-icon.faded-icon {
            background-color: var(--c-grey-100);
            color: var(--c-grey-400);
        }

        .timeline-item-icon.filled-icon {
            background-color: var(--c-blue-500);
            color: #fff;
        }

        .timeline-item-description {
            display: flex;
            padding-top: 6px;
            gap: 8px;
            color: var(--c-grey-400);
        }

        .timeline-item-description img {
            flex-shrink: 0;
        }

        .timeline-item-description a {
            color: var(--c-grey-500);
            font-weight: 500;
            text-decoration: none;
        }

        .timeline-item-description a:hover,
        .timeline-item-description a:focus {
            outline: 0;
            color: var(--c-blue-500);
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden;
            aspect-ratio: 1 / 1;
            flex-shrink: 0;
            width: 40px;
            height: 40px;
        }

        .avatar.small {
            width: 28px;
            height: 28px;
        }

        .avatar img {
            object-fit: cover;
        }

    </style>
</head>
<body>
    
    @include('header')

    <div class="card card-hipipe px-5" style="max-width: 100%">
        <div class="row mt-4 mb-3">
            <div class="col-md-5" style="font-size: 20px; font-weight: 500; padding-right: 60px;">
                <div class="row">
                    <div class="col-sm-1">
                        <a href="/jobs/detail/{{$job->id_job}}"><i class="bi bi-chevron-left"></i></a>
                    </div>
                    <div class="col-md">
                        <p style="margin-bottom: 1px">{{$job->nama_job}}</p>
                        <div class="row pe-1" style="font-size: 12px; font-weight: 400;">
                            <div class="col-md-5" style="padding-right: 0;">
                                <p>nomor</p>
                            </div>
                            <div class="col-md-4" style="padding-left: 0; padding-right: 0;">
                                <p><i class="bi bi-geo-alt-fill"></i>{{$job->lokasi}}</p>
                            </div>
                            <div class="col-md-3" style="padding-left: 0; padding-right: 0;">
                                <p><i class="bi bi-person"></i> {{$job->total_butuh}} Applicants</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md mt-2">
                
            </div>
        </div>
    </div>

    <div class="card mt-4 mx-4" style="border: 0">
        <div class="card-header" style="padding-left: 40px; background: #fff; font-weight: 500">
            <h4 class="mt-2" style="font-size: 18px;">Activity</h4>
        </div>
        <div class="card-body mx-4">
        @php
    // Kelompokkan data berdasarkan tanggal
    $groupedActivity = $activity->groupBy(function($activity) {
        return $activity->created_at->format('d F, Y');
    });
@endphp

@foreach ($groupedActivity as $date => $activityOnDate)
    <p id="tanggal" class="mb-3" style="font-size: 16px; margin-left: 5px">{{ $date }}</p>
    <ol class="timeline mx-4">
        @foreach ($activityOnDate as $act)
            <li class="timeline-item | extra-space">
                <span class="timeline-item-icon">
                    <img draggable="false" src="{{ asset('assets/edit.svg') }}" alt="logo">
                </span>
                <div class="timeline-item-description">
                    <span>{{ $act->action }}</span>
                </div>
            </li>
        @endforeach
    </ol>
@endforeach

        </div>
    </div>

    
    
</body>
</html>
