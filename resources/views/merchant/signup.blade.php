@extends('layouts.app')
@section('content')

<div class="container" style="margin: 0; max-width: 100%;">
    <div class="row">
        <div class="col-md-5 nopadding">
            <img src="{{ asset('image/merchant-signup.png') }}" style="height:100vh" alt="">
        </div>
        <div class="col-md-7" >
            <div class="d-flex justify-content-center ">
               <p class="title-sign-merch">Gabung Sebagai Merchant Kapalasar</p>
            </div>
            <div class="d-flex justify-content-center" >
               <p class="sub-sign-merch">Sudah Terdaftar? </p><a href="" class="login-merch-signup">Masuk Sekarang</a>
            </div>
            <div >
                <div class="container flex-row align-items-center">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card mx-4">
                            <div class="card-body p-4">
                                <h1>Register</h1>
                                <p class="text-muted">Create your account</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                        </svg></span></div>
                                        <input class="form-control" type="text" placeholder="Nama">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                            </svg></span></div>
                                            <input class="form-control" type="text" placeholder="Email">
                                        </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                            </svg></span></div>
                                            <input class="form-control" type="password" placeholder="Password">
                                        </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                            </svg></span></div>
                                            <input class="form-control" type="text" placeholder="Tanggal Lahir">
                                        </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                            </svg></span></div>
                                            <input class="form-control" type="text" placeholder="Nomor Telepon">
                                        </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                            </svg></span></div>
                                            <input class="form-control" type="text" placeholder="Alamat">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                <svg class="c-icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                                </svg></span></div>
                                                <input class="form-control" type="text" placeholder="Daerah">
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                    <svg class="c-icon">
                                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                                    </svg></span></div>
                                                    <input class="form-control" type="text" placeholder="Jenis Usaha">
                                                </div>
                                                <button class="btn btn-block btn-success" type="button">Create Account</button>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            
                            <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
                            <!--[if IE]><!-->
                            <script src="vendors/@coreui/icons/js/svgxuse.min.js"></script>
                            <!--<![endif]-->
                        </div>
                    </div>
                </div>
                
            </div>
            @endsection