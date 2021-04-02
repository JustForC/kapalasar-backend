


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #A6CB26;">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Produk</h5>
        <button type="button" class="close modal-title" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <br>
  <form action='/superadmin/product' method="POST" enctype="multipart/form-data">
  <div class="form-group">
  {{csrf_field()}}
    <label class="label-add" for="exampleFormControlInput1">Upload Gambar</label>
    <input type="file" name="product_image" class="form-control" id="exampleFormControlInput1">
    <label class="label-add" for="exampleFormControlInput1">Nama Produk</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="product_name">
    <label class="label-add" for="exampleFormControlInput1">Deskripsi Produk</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="product_description">
    <label class="label-add" for="exampleFormControlInput1">Kategori Produk</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="product_category">
    <label class="label-add" for="exampleFormControlInput1">Stok</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="product_stock">
    <label class="label-add" for="exampleFormControlInput1">Harga</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="product_price">
    <label class="label-add" for="exampleFormControlInput1">Potongan Harga</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="product_cutprice">
    <label class="label-add" for="exampleFormControlInput1">Flash Sale</label>
  </div>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="label-add" class="form-check-label" for="defaultCheck1">
    Ya
  </label>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</form>
  </div>
</div>