@extends('layouts.dashboard')

@section('title','Push Notification')

@push('css')
@endpush

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline">
          <h6 class="card-title mb-0">Kirim Notifikasi</h6>
        </div>

<form id="form_modal" class="form" method="POST" action="{{route('push.send')}}" enctype="multipart/form-data">
    @csrf

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="title" class="control-label">Judul</label>
            <input id="title" type="text" class="form-control" name="title"placeholder="Title">
        </div>
        <div class="form-group">
            <label for="body" class="control-label">Konten</label>
            <input id="body" type="text" class="form-control" name="body"placeholder="Konten">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save">Kirim</button>
    </div>

</form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
  <script>
    $('body').on('submit','.form', function(event){
      event.preventDefault();

      var form = $('form'),
          url = form.attr('action');

      $('#modal-save').append('<i class="fas fa-spinner fa-pulse"></i>');
      $('.loading').removeClass('hidden');
      $.ajax({
        url : url,
        type : "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
          $('.loading').addClass('hidden');
          $('.table').DataTable().ajax.reload();
          $("#modal .close").click()
          $('#modal-body').trigger('reset');
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          Toast.fire({
            type: 'success',
            title: 'Data has been saved!'
          })
        },
        error: function(xhr){
          $('.fa-pulse').remove();
          var res = xhr.responseJSON;
          if ($.isEmptyObject(res) == false) {
            form.find('.invalid-feedback').remove();
            form.find('.is-invalid').removeClass('is-invalid');
            $.each(res.errors, function (key, value) {
              $('#' + key)
                .addClass('is-invalid')
                .after('<div class="invalid-feedback d-block">'+value+'</div>');
            });
          }
        }
      });
    });

  </script>
@endpush