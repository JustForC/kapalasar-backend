


<div class="modal fade" id="updateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #A6CB26;">
        <h5 class="modal-title" id="exampleModalLongTitle">Update User</h5>
        <button type="button" class="close modal-title" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
          <div class="col-md-6" style="text-align: center;">
            <img src="{{ asset('image/pp-user.png') }}" alt="" style="width: 250px;height: 173px;">
            <button class="mt-1" style="background: #A6CB26;color: #FFFFFF;border-radius: 5px;width: 149px;height: 35px; border:none;">Upload</button>
          </div>
        <div class="col-md-6">
            <form>
              <div class="form-group">
                  <label class="label-add" for="exampleFormControlInput1">Nama</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1">
                  <label class="label-add" for="exampleFormControlInput1">Email</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1">
                  <label class="label-add" for="exampleFormControlInput1">Tanggal Lahir</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1">
                  <label class="label-add" for="exampleFormControlInput1">Alamat</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1">
                  <label class="label-add" for="exampleFormControlInput1">Nomor Telepon</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1">
                  <label class="label-add" for="exampleFormControlInput1">Pekerjaan</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1">
                  <label class="label-add" for="exampleFormControlInput1">Password</label>
                  <input type="password" class="form-control" id="exampleFormControlInput1">
                </div>
            </form>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>