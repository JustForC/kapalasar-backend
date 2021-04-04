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
<script>
$(document).ready( function () {
    $('.mydatatable').DataTable();
} );
</script>
@endsection