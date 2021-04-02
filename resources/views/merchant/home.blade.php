@extends ('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex flex-row mt-2">

            <img src="{{ asset('image/homeDashboard.png') }}"  alt="">
            <div class="box mt-2">
                <input type="text" placeholder="" />
            </div>
                <a href="#" class="loginMerchant mr-2">Masuk</a>
                <a href="#" class="signupMerchant">Daftar</a>
        </div>
        <div class="container mt-5">
            <div class="owl-carousel owl-theme">
                <div class="ml-2 mr-2">

                    <div class="card">
                        <img src="asset('image/homeDashboard.png')" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Post</h5>
                            Post Desc
                        </div>
                    </div>
                </div>
                <div class="ml-2 mr-2">

                    <div class="card">
                        <img src="asset('image/homeDashboard.png')" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Post</h5>
                            Post Desc
                        </div>
                    </div>
                </div>
                <div class="ml-2 mr-2">

                    <div class="card">
                        <img src="asset('image/homeDashboard.png')" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Post</h5>
                            Post Desc
                        </div>
                    </div>
                </div>
                <div class="ml-2 mr-2" style="background: #ddd;">2</div>
                <div class="ml-2 mr-2" style="background: #ddd;">3</div>
            </div>
        </div>
    </div>    
<!-- <div class="navbar navbar-expand navbar-light fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand ">
                <img src="{{ asset('image/homeDashboard.png') }}" alt="" />
            </a>
            <div class="box">
                <input type="text" placeholder="" />
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link loginMerchant mr-2">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link signupMerchant">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div></div> -->

    <script>
        $('.owl-carousel').owlCarousel();
    </script>
@endsection