<form id="form_modal" class="form" method="POST" action="{{ $model->exists ? route('merchant.update', $model->id) : route('merchant.store') }}" enctype="multipart/form-data">
    @csrf {{ method_field($model->exists ? 'PUT' : 'POST') }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            &times;
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="control-label">Nama</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$model->name}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{$model->email}}" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="referral_code" class="control-label">Refferal Code</label>
            <input id="referral_code" type="text" class="form-control" name="referral_code" value="{{$model->referral_code}}" placeholder="Refferal Code">
        </div>
        <div class="form-group">
            <label for="age" class="control-label">Umur</label>
            <input id="age" type="text" class="form-control" name="age" value="{{$model->age}}" placeholder="Umur">
        </div>
        <div class="form-group">
            <label for="job" class="control-label">Jenis Usaha</label>
            <input id="job" type="text" class="form-control" name="job" value="{{$model->job}}" placeholder="Jenis Usaha">
        </div>
        <div class="form-group">
            <label for="address" class="control-label">Address</label>
            <input id="address" type="text" class="form-control" name="address" value="{{$model->address}}" placeholder="Adress">
        </div>
        <div class="form-group">
            <label for="address_detail" class="control-label">Address Detail</label>
            <input id="address_detail" type="text" class="form-control" name="address_detail" value="{{$model->address}}" placeholder="Adress Detail">
        </div>
        <div class="form-group">
            <label for="phone" class="control-label">Phone</label>
            <input id="phone" type="text" class="form-control" name="phone" value="{{$model->phone}}" placeholder="Phone">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Umur</label>
            <input id="password" type="password" class="form-control" name="password" value="{{$model->password}}" placeholder="Passowrd">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

    <script type="text/javascript">
    </script>

</form>