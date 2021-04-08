<form id="form_modal" class="form" method="POST" action="{{ $model->exists ? route('mail.update', $model->id) : route('mail.store') }}" enctype="multipart/form-data">
    @csrf {{ method_field($model->exists ? 'PUT' : 'POST') }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            &times;
        </button>
    </div>
    <div class = "modal-body">
    <div class="form-group">
            <label for="tawaran" class="control-label">Tawaran</label>
            <textarea form ="form_modal" id="tawaran" class="form-control" name="tawaran" placeholder="Isi Tawaran"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

    <script type="text/javascript">
    </script>

</form>