@extends('layouts.app')

@section('content')
        @include('component.sidebarSuper')
            @include('component.header', ['header_title' => 'Produk'])
            <div class="c-body ">
                <div class="container-fluid">
                    <div class="fade-in">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header mb-3">
                                        <div class="title-content">List Merchant</div>
                                    </div>
                                        <div class="col-md-3 offset-md-9 button-position mb-1">
                                <button class="button-add" data-toggle="modal" data-target="#addModal">Tambah Merchant</button>
                            </div>
                                        <table class="table table-responsive-sm table-bordered table-striped table-sm mydatatable">
                                    <thead>
                                        <tr>
                                            <th>Id Merchant</th>
                                            <th>Nama </th>
                                            <th>Email</th>
                                            <th>Umur</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($merchants as $merchant)
                                        <tr>
                                            <td>{{$merchant->id}}</td>
                                            <td>{{$merchant->name}}</td>
                                            <td>{{$merchant->email}}</td>
                                            <td>{{$merchant->age}}</td>
                                            <td>{{$merchant->address}}</td>
                                            <td>{{$merchant->telephone}}</td>
                                            <td>
                                            <button class="button badge badge-success" data-toggle="modal" data-target="#updateModal" style="background: #A6CB26;">
                                            Update
                                            </button>
                                            </td>
                                            <td>
                                            <form action="/superadmin/merchant/{{$merchant->id}}" method="post">@csrf
                                            <button type="submit" class="button badge badge-success" data-toggle="modal" data-target="#updateModal" style="background: #A6CB26;">
                                            Delete
                                            </button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach 
                                    </tbody>
                                </table>
                                </div>
                                @include('superadmin.addMerchant')
                            </div>
                        @include('superadmin.updateMerchant')
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