@extends('layouts.app')

@section('content')
        @include('component.sidebarSuper')
            @include('component.header', ['header_title' => 'Produk'])
            <div class="c-body mt-2">
                <div class="container-fluid">
                    <div class="fade-in">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="title-content mb-3">List Produk</div>
                                        <div class="col-md-3 offset-md-9 button-position">
                                <button class="button-add" data-toggle="modal" data-target="#addModal">Tambah Produk</button>
                            </div>
                                        <table class="table table-responsive-sm table-striped mydatatable ml-1 mr-1">
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
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->product_description}}</td>
                                            <td>{{$product->product_category}}</td>
                                            <td>{{$product->product_stock}}</td>
                                            <td>{{$product->product_finalprice}}</td>
                                            <td>
                                            <button class="button badge badge-success" data-toggle="modal" data-target="#updateModal" style="background: #A6CB26;">
                                            Update
                                            </button>
                                            </td>
                                            <td>
                                            <form action="/superadmin/product/{{$product->id}}" method="post">@csrf
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
                                </div>
                                @include('superAdmin.addProduct')
                            </div>
                        @include('superAdmin.updateProduct')
                        </div>
                    </div>
                </div>
            </div>
            
<script>
$(document).ready( function () {
    $('.mydatatable').DataTable();
} );
</script>
@endsection