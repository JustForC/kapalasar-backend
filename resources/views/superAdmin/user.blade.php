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
                                        <div class="title-content mb-3">List User</div>
                                        <div class="col-md-3 offset-md-9 button-position">
                            </div>
                                        <table class="table table-responsive-sm table-striped mydatatable ml-1 mr-1">
                                    <thead>
                                        <tr>
                                            <th>Id Merchant</th>
                                            <th>Nama </th>
                                            <th>Email</th>
                                            <th>Umur</th>
                                            <th>Alamat</th>
                                            <th>Pekerjaan</th>
                                            <th>Nomor Telepon</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->age}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->job}}</td>
                                            <td>{{$user->telephone}}</td>
                                            <td>
                                            <button class="button badge badge-success" data-toggle="modal" data-target="#updateModal" style="background: #A6CB26;">
                                            Update
                                            </button>
                                            </td>
                                            <td>
                                            <form action="/superadmin/{{$user->id}}" method="post">@csrf
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
                            </div>
                        @include('superadmin.updateUser')
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