<form id="form_modal" class="form" method="POST" action="{{ $model->exists ? route('product.update', $model->id) : route('product.store') }}" enctype="multipart/form-data">
    @csrf {{ method_field($model->exists ? 'PUT' : 'POST') }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            &times;
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="categories_id" class="control-label">Kategori</label><br>
            <select id="categories_id" type="text" class="form-control" name="categories_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Nama Produk</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$model->name}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="unit" class="control-label">Deskripsi</label>
            <textarea form ="form_modal" rows="3" id="unit" class="form-control" name="unit" placeholder="Deskripsi" value = "{{$model->unit}}">{{$model->unit}}</textarea>
        </div>
        {{-- <div class="form-group">
            <label for="stock" class="control-label">Stok</label>
            <input id="stock" type="number" class="form-control" name="stock" value="{{$model->stock}}" placeholder="Stock">
        </div> --}}
        <div class="form-group">
            <label for="price" class="control-label">Harga</label>
            <input id="price" type="number" class="form-control" name="price" value="{{$model->price}}" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="discount_price" class="control-label">Harga diskon</label>
            <input id="discount_price" type="number" class="form-control" name="discount_price" value="{{$model->discount_price}}" placeholder="Harga diskon">
        </div>
        <div class="form-group">
            <label for="product_image" class="control-label">Gambar Produk</label><br/>
            <input id="product_image" type="file" name="product_image">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

    <script type="text/javascript">
    </script>

</form>