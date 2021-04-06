<form id="form_modal" class="form" method="POST" action="{{ $model->exists ? route('flash.update', $model->id) : route('flash.store') }}" enctype="multipart/form-data">
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
            <label for="products_id" class="control-label">Pilih Product</label><br>
            <select id="products_id" type="text" class="form-control" name="products_id">
                @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="new_price" class="control-label">Harga Flash</label>
            <input id="new_price" type="number" class="form-control" name="new_price" value="{{$model->new_price}}" placeholder="Harga Flash">
        </div>
        <div class="form-group">
            <label class="control-label">Masa Berlaku</label>
            <input id="start" type="datetime-local" class="form-control" name="start" value="{{$model->start}}" placeholder="Time Start">
            <input id="end" type="datetime-local" class="form-control" name="end" value="{{$model->end}}" placeholder="Time End">
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