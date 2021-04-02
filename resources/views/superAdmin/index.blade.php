@extends('layouts.app')

@section('content')
@include('../component.sidebarSuper')
@include('../component.header')
<div class="c-body">
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            
                        <div class="title-content">Riwayat Transaksi</div>
                        </div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm table-bordered table-striped table-sm mydatatable">
                                            <thead>
                                                <tr>
                                                    <th>Id Transaksi</th>
                                                    <th>Tanggal</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>Alamat Pembeli</th>
                                                    <th>Merchant</th>
                                                    <th>Total Harga</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Vishnu Serghei</td>
                                                    <td>2012/01/01</td>
                                                    <td>Member</td>
                                                    <td>Jl. Raya Bandung Sumedang KM.21, Hegarmanah, Jatinangor, Kabupaten Sumedang, Jawa Barat 45363</td>
                                                    <td>Bapak Kades</td>
                                                    <td>Rp. 100.000</td>
                                                    <td>
                                                    <button class="button badge badge-success" data-toggle="modal" data-target="#detailModal"
                                                    style="background: #A6CB26;"
                                                    >Detail</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @include('../superAdmin.detailTransaksi')
                                        <div class="card mt-3">
                                    <div class="card-header">
                                        Detail Transaksi
                                    </div>
                                    <div id="container" style="width: 100%;">
                                        <canvas id="canvas"></canvas>
                            </div>
                            <div class="d-flex justify-content-around">
                                <button class="button" style="width:15%" id="randomizeData" >Randomize Data</button>
                                <button class="button" style="width:15%" id="addDataset">Add Dataset</button>
                                <button class="button" style="width:15%" id="removeDataset">Remove Dataset</button>
                                <button class="button" style="width:15%" id="addData">Add Data</button>
                                <button class="button" style="width:15%" id="removeData">Remove Data</button>
                            </div>
                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script src="https://coreui.io/demo/free/3.4.0/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <!--[if IE]><!-->
    <script src="https://coreui.io/demo/free/3.4.0/vendors/@coreui/icons/js/svgxuse.min.js"></script>
    <!--<![endif]-->
    
    @include('../component.scriptChart')

<script>
$(document).ready( function () {
    $('.mydatatable').DataTable();
} );
</script>

@endsection