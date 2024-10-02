<body style="::-webkit-scrollbar {display: none;}">
    @include('header')
    <div class="row" style="::-webkit-scrollbar {display: none;};width: 100vw;margin: 0;padding: 0;">
        @include('candidate/sidebar_candidates')
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
                    {{$c->nama}}
                </div>
                <div class="d-flex">
                    {{$c->nama}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
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
        });

    </script>
</body>
    