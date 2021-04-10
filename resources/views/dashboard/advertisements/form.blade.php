<form id="form_modal" class="form" method="POST" action="{{ $model->exists ? route('ads.update', $model->id) : route('ads.store') }}" enctype="multipart/form-data">
    @csrf {{ method_field($model->exists ? 'PUT' : 'POST') }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            &times;
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="control-label">Nama Iklan</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$model->name}}" placeholder="Name">
        </div>
    <div class="form-group">
            <label for="path" class="control-label">Letak Iklan</label><br>
            <select id="path" type="text" class="form-control" name="path">
                <option value="Atas">Diatas</option>
                <option value="Bawah">Dibawah</option>
                <option value="FlashSale">Flash Sale</option>
            </select>
        </div>
    <div class="form-group">
            <label for="image" class="control-label">Gambar Produk</label>
            <input id="image" type="file" name="image">
    </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

    <script type="text/javascript">
    </script>

</form>