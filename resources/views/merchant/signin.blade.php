@extends('layouts.app')
@section('content')
<div class="container" style="margin: 0; max-width: 100%;">
    <div class="row">
        <div class="col-md-3 nopadding">
            <img src="{{ asset('image/merchant-signup.png') }}" style="height:100vh" alt="">
        </div>
        <div class="col-md-9">
            <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card p-4">
                            <div class="card-body">
                                <h5>Masuk Akun Merchant Kapalasar</h5>
                                <div class="input-group mb-3 mt-4">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                        </svg></span></div>
                                        <input class="form-control" type="text" placeholder="Email">
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                            </svg></span></div>
                                            <input class="form-control" type="password" placeholder="Password">
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col">
                                                <button class="btn btn-success px-4" type="button">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:100%">
                                    <div class="card-body text-center">
                                        <div>
                                            <h2>Sign up</h2>
                                            <p>Daftar Sekarang juga jika kamu ingin menjadi bagian dari merchant kapalasar</p>
                                            <button class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
                <!--[if IE]><!-->
                <script src="vendors/@coreui/icons/js/svgxuse.min.js"></script>
                <!--<![endif]-->
                <!-- <div class="container h-100">
                    <div class="row h-100 justify-content-center align-items-center">
                        <form class="col-12">
                            <p>Masuk Akun Merchant Kapalasar</p>
                            <div class="form-group justify-content-center">
                                <label for="formGroupExampleInput">Email</label>
                                <input style="width: 555px;height: 40px;" type="text" class="form-control" id="formGroupExampleInput" >
                            </div>
                            <div class="form-group justify-content-center">
                                <label for="formGroupExampleInput2">Password</label>
                                <input style="width: 555px;height:40px" type="password" class="form-control" id="formGroupExampleInput2">
                            </div>
                        </form>   
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    @endsection