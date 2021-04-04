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
            <script>
$(document).ready( function () {
    $('.mydatatable').DataTable();
} );
</script>
@endsection