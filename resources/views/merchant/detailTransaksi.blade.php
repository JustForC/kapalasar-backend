<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #A6CB26;">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Transaksi</h5>
        <button type="button" class="close modal-title" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <p class="detail-title">Daftar Produk</p>
           <div class="col-md-3">
            <img src="{{ asset('image/sayur.png') }}" alt="" style="width: 84px;height: 47px;">
           </div>
           <div class="col-md-9">
           <p class="sayuran">Sayuran a</p>
           <p class="cost-detail">Rp. 10.000</p>
           </div>
        </div>
        <br>
        <div class="row">
        <p class="detail-title">Informasi Pembeli</p>
        <p class="info">Nama</p>
        <p class="info-detail">Gio</p>
        <p class="info">Nomor Telepon</p>
        <p class="info-detail">0812121212</p>
        <p class="info">Alamat Pengiriman</p>
        <p class="info-detail">Lubuklinggau</p>
        </div>  
        <div class="row">
        <p class="detail-title">Informasi Merchant</p>
        <p class="info">Nama</p>
        <p class="info-detail">Gio</p>
        <p class="info">Nomor Telepon</p>
        <p class="info-detail">0812121212</p>
        <p class="info">Alamat Merchant</p>
        <p class="info-detail">Lubuklinggau</p>
        </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>