@extends('layouts.app')

@section('content')
        @include('component.sidebarSuper')
            @include('component.header')
            <div class="c-body mt-2">
                <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="title-content mb-3">List Voucher</div>
                                        <div class="col-md-3 offset-md-9 button-position">
                                <button class="button-add" data-toggle="modal" data-target="#addModal">Tambah Voucher</button>
                            </div>
                                        <table class="table table-responsive-sm table-striped mydatatable ml-1 mr-1">
                             
                                    <thead>
                                        <tr>
                                            <th>Id Voucher</th>
                                            <th>Nama Voucher</th>
                                            <th>Tipe</th>
                                            <th>Kategori</th>
                                            <th>Periode Mulai</th>
                                            <th>Periode Berakhir</th>
                                            <th>Kuota</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        @foreach($vouchers as $voucher)
                                            <td>{{$voucher->id}}</td>
                                            <td>{{$voucher->voucher_name}}</td>
                                            <td>{{$voucher->voucher_type}}</td>
                                            <td>{{$voucher->voucher_category}}</td>
                                            <td>{{$voucher->voucher_start}}</td>
                                            <td>{{$voucher->voucher_end}}</td>
                                            <td>{{$voucher->voucher_amount}}</td>
                                            <td></td>
                                            <td>
                                            <button class="button badge badge-success" data-toggle="modal" data-target="#updateModal" style="background: #A6CB26;">
                                            Update
                                            </button>
                                            </td>
                                            <td>
                                            <form action="/superadmin/voucher/{{$voucher->id}}" method="post">@csrf
                                            <button type="submit" class="button badge badge-success"  style="background: #A6CB26;">
                                            Delete
                                            </button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                                @include('superAdmin.addVoucher')
                            </div>
                        @include('superAdmin.updateVoucher')
                        </div>
                    </div>
                </div>
                @include('superAdmin.deleteVoucher')
                </main>
            </div>
            <!-- <div class="d-flex justify-content-between ml-4 mt-3">
                <div class="mr-3" style="flex: 8;border-radius: 1em;">
                    <div class="d-flex flex-column white-bg p-3" style="box-shadow: 0px 2px 15px rgba(221, 221, 221, 0.15);">
                        <div class="title-content mb-3">List Voucher</div>
                        <div class="row">
                            <div class="col-md-3 col">
                                Pencarian
                                <form class="form-inline md-form form-sm mt-0 " style="width: 30vh; height:5vh" >        
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                    <input class="form-control form-control-sm ml-3 " id="input-search" type="text" placeholder="Cari berdasarkan id, nama, dll" aria-label="Search" >
                                </form>   
                            </div>
                            <div class="col-md-3 col">
                                <div> Urut Berdasarkan</div>
                                <select name="" id="sortBy" style="width: 30vh; height:5vh">
                                    <option value="">aaa</option>
                            </select>
                            </div>
                            <div class="col-md-3 offset-md-3 button-position">
                                <button class="button-add" data-toggle="modal" data-target="#addModal">Buat Voucher</button>
                            </div>
                        </div>
                        <table class="table table-hover table-striped mt-2">
                            <thead class="titletable">
                                <tr style="background: #A6CB26;">
                                    <th scope="col" class="headTable">Id Voucher</th>
                                    <th scope="col" class="headTable">Nama Voucher</th>
                                    <th scope="col" class="headTable">Nominal Potongan</th>
                                    <th scope="col" class="headTable">Kategori</th>
                                    <th scope="col" class="headTable">Periode Mulai</th>
                                    <th scope="col" class="headTable">Periode Berakhir</th>
                                    <th scope="col" class="headTable">Kuota</th>
                                    <th scope="col" class="headTable"></th>
                                    <th scope="col" class="headTable"></th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Michael</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button class="button" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                    </td>
                                    <td>
                                        <button class="button" data-toggle="modal" data-target="#updateModal">Update</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @include('admin.addVoucher')
                    </div>
                </div>
                @include('admin.updateVoucher')
            </div>
@include('admin.deleteVoucher') -->
<script>
$(document).ready( function () {
    $('.mydatatable').DataTable();
} );
</script>
@endsection