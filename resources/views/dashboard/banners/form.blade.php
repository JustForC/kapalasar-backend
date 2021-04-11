<form id="form_modal" class="form" method="POST" action="{{ $model->exists ? route('banner.update', $model->id) : route('banner.store') }}" enctype="multipart/form-data">
    @csrf {{ method_field($model->exists ? 'PUT' : 'POST') }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            &times;
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="id" class="control-label">ID Iklan</label>
            <input id="id" type="text" class="form-control" name="id" value="{{$model->id}}" placeholder="ID Iklan">
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Nama Iklan</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$model->name}}" placeholder="Nama Iklan">
        </div>
        <div class="form-group">
            <label for="products" class="control-label">Produk Terkait</label><br>
            <select multiple id="products" type="text" class="form-control" name="products[]">
                @foreach ($products as $product)
                    <option value="{{$product->id}}" {{ $model->exists ? (in_array($product->id, $model->selected) ? 'selected="selected"' : null) : null }}>{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image" class="control-label">Gambar Iklan</label>
            <input id="image" type="file" name="image">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

    <script type="text/javascript">
        $("#select").select2({
            placeholder: "Pilih Produk",
            theme: "classic",
            width: "resolve"
        })
    </script>
</form>