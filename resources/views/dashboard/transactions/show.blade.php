<div class="modal-header">
    <h5 class="modal-title" id="modal-title"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        &times;
    </button>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table id="table" class="table hover" style="width:100%">
          <tr>
          <td>#</td>
            <td>Produk</td>
            <td>Jumlah</td>
            <td>Harga</td>
          </tr>
          @foreach($model->costs as $index => $t)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$t->product}}</td>
            <td>{{$t->amount}}</td>
            <td>{{'Rp '.number_format($t->price, 0, ',', '.')}}</td>
          </tr>
          @endforeach
        </table>
        </div>
        <div class="mt-3">
        <div class="form-group">
            <label for="detail" class="control-label">Detail Tambahan</label>
            <textarea id="detail" rows="5" class="form-control" name="detail" disabled="true">{!!$model->detail!!}</textarea>
        </div>
        <div class="form-group">
            <label for="extra_order" class="control-label">Extra Order</label>
            <textarea id="extra_order" rows="5" class="form-control" name="extra_order" disabled="true">{!!$model->extra_order!!}</textarea>
        </div>
      </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
</div>