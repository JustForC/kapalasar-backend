


<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <p class="detail-title">Foto Produk</p>
           <div class="col-md-3">
            <img src="{{ asset('image/sayur.png') }}" alt="" style="width: 250px;height: 173px;">
           </div>
        </div>
        <button class="mt-1" style="background: #C4C4C4;border-radius: 5px;width: 149px;height: 35px;">Upload</button>
        <br>
        <form>
  <div class="form-group">
    <label class="label-add" for="exampleFormControlInput1">Nama Produk</label>
    <input type="email" class="form-control" id="exampleFormControlInput1">
    <label class="label-add" for="exampleFormControlInput1">Deskripsi Produk</label>
    <input type="email" class="form-control" id="exampleFormControlInput1">
    <label class="label-add" for="exampleFormControlInput1">Kategori Produk</label>
    <input type="email" class="form-control" id="exampleFormControlInput1">
    <label class="label-add" for="exampleFormControlInput1">Stok</label>
    <input type="email" class="form-control" id="exampleFormControlInput1">
    <label class="label-add" for="exampleFormControlInput1">Harga</label>
    <input type="email" class="form-control" id="exampleFormControlInput1">
    <label class="label-add" for="exampleFormControlInput1">Potongan Harga</label>
    <input type="email" class="form-control" id="exampleFormControlInput1">
    <label class="label-add" for="exampleFormControlInput1">Flash Sale</label>
  </div>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="label-add" class="form-check-label" for="defaultCheck1">
    Ya
  </label>
</div>
</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>