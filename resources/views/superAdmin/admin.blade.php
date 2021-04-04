@extends('layouts.app')

@section('content')
        @include('../component.sidebarSuper')
            @include('../component.header', ['header_title' => 'Admin'])
            <div class="c-body">
                <div class="container-fluid">
                    <div class="fade-in">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header mb-3">
                                        <div class="title-content">List Admin</div>
                                    </div>
                                        <div class="col-md-3 offset-md-9 button-position">
                                <button class="button-add" data-toggle="modal" data-target="#addModal">Tambah Admin</button>
                            </div>
                                        <table class="table table-responsive-sm table-bordered table-striped table-sm mydatatable">
                                    <thead>
                                        <tr>
                                            <th>Id Admin</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>{{$admin->id}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->address}}</td>
                                            <td>{{$admin->telephone}}</td>
                                            <td>
                                            <button class="button badge badge-success" data-toggle="modal" data-target="#updateAdmin" style="background: #A6CB26;" >
                                            Update
                                            </button>
                                            </td>
                                            <td>
                                            <form action="/superadmin/admin/{{$admin->id}}" method="post">@csrf
                                            <button class="button badge badge-danger" data-toggle="modal" style="background: #A6CB26;">
                                            Delete
                                            </button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                @include('superAdmin.addAdmin')
                            </div>
                        @include('superAdmin.updateAdmin')
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
