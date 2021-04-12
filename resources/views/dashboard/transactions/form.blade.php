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
                <option name="status" value=1 @if(1 == $model->status) selected="selected" @endif>Dipesan</option>
                <option name="status" value=2 @if(2 == $model->status) selected="selected" @endif>Selesai</option>
                <option name="status" value=3 @if(3 == $model->status) selected="selected" @endif>Refund</option>
                <option name="status" value=4 @if(4 == $model->status) selected="selected" @endif>Tidak Selesai</option>
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