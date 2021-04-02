


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #A6CB26;">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Admin</h5>
        <button type="button" class="close modal-title" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<form action="/superadmin/admin" method="post">
  @csrf
  <div class="form-group">
    <label class="label-add" for="exampleFormControlInput1">Nama</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
    <label class="label-add" for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
    <label class="label-add" for="exampleFormControlInput1">Alamat</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="address">
    <label class="label-add" for="exampleFormControlInput1">Nomor Telepon</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="telephone">
    <label class="label-add" for="exampleFormControlInput1">Password</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" name="password">
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
</form>
    </div>
  </div>
</div>