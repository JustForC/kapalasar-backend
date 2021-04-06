<form id="form_modal" class="form" method="POST" action="{{ $model->exists ? route('transaction.update', $model->id) : route('transaction.store') }}" enctype="multipart/form-data">
    @csrf {{ method_field($model->exists ? 'PUT' : 'POST') }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            &times;
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="status" class="control-label">Status</label><br>
            <select id="status" type="number" class="form-control" name="status">
                <option value='1'>Baru Masuk</option>
                <option value='2'>Sudah Konfirmasi</option>
                <option value='3'> Sudah Selesai</option>
            </select>
        </div>
        <div class="form-group">
            <label for="total" class="control-label">Total</label>
            <input id="total" type="number" class="form-control" name="total" value="{{$model->total}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="vouchers_id" class="control-label">Voucher</label><br>
            <select id="vouchers_id" type="text" class="form-control" name="vouchers_id">
                @foreach($vouchers as $voucher)
                <option value="{{$voucher->id}}">{{$voucher->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="users_id" class="control-label">User</label><br>
            <select id="users_id" type="text" class="form-control" name="users_id">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

    <script type="text/javascript">
    </script>

</form>