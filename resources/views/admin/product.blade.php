@extends('layouts.app')

@section('content')
        @include('component.sidebar')
            @include('component.header', ['header_title' => 'Produk'])
            <div class="c-body mt-2">
                <div class="container-fluid">
                    <div class="fade-in">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header mb-3">
                                        <div class="title-content">List Merchant</div>
                                    </div>
                                        <div class="col-md-3 offset-md-9 button-position">
                                <button class="button-add mb-2" data-toggle="modal" data-target="#addModal">Tambah Produk</button>
                            </div>
                                        <table class="table table-responsive-sm table-bordered table-striped table-sm mydatatable">
                                    <thead>
                                        <tr>
                                            <th>Id Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Yiorgos Avraamu</td>
                                            <td>2012/01/01</td>
                                            <td>Member</td>
                                            <td>Jl. Raya Bandung Sumedang KM.21, Hegarmanah, Jatinangor, Kabupaten Sumedang, Jawa Barat 45363</td>
                                            <td>Member</td>
                                            <td>Member</td>
                                            <td>
                                            <button class="button badge badge-success" data-toggle="modal" data-target="#updateModal"
                                                style="background: #A6CB26;"
                                                >Update</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Gio</td>
                                            <td>2012/01/01</td>
                                            <td>Member</td>
                                            <td>Jl. Raya Bandung Sumedang KM.21, Hegarmanah, Jatinangor, Kabupaten Sumedang, Jawa Barat 45363</td>
                                            <td>Member</td>
                                            <td>Member</td>
                                            <td>
                                            <button class="button badge badge-success" data-toggle="modal" data-target="#updateModal"
                                                style="background: #A6CB26;"
                                                >Update</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                @include('admin.addProduct')
                            </div>
                        @include('admin.updateProduct')
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="d-flex justify-content-between ml-4 mt-3">
                <div class="mr-3" style="flex: 8;border-radius: 1em;">
                    <div class="d-flex flex-column white-bg p-3" style="box-shadow: 0px 2px 15px rgba(221, 221, 221, 0.15);">
                        <div class="title-content mb-3">List Merchant</div>
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
                                <button class="button-add" data-toggle="modal" data-target="#addModal">Tambah Produk</button>
                            </div>
                        </div>
                        <table class="table table-hover table-striped mt-2">
                            <thead class="titletable">
                                <tr style="background: #A6CB26;">
                                    <th scope="col" class="headTable">Id Produk</th>
                                    <th scope="col" class="headTable">Nama Produk</th>
                                    <th scope="col" class="headTable">Deskripsi</th>
                                    <th scope="col" class="headTable">Kategori</th>
                                    <th scope="col" class="headTable">Stok</th>
                                    <th scope="col" class="headTable">Harga</th>
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
                                    <td>
                                        <button class="button" data-toggle="modal" data-target="#updateModal">Update</button>
                                    </td>
                                </tr>
                            </tbody>  
                        </table>
                        @include('admin.addProduct')
                        @include('admin.updateProduct')
                    </div>
                </div>
            </div> -->
            <script>
$(document).ready( function () {
    $('.mydatatable').DataTable();
} );
</script>
@endsection