@extends('layouts.dashboard')

@section('title','Kategori')

@push('css')
@endpush

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        @if(Auth::user()->roles->name == "Super Admin" || Auth::user()->roles->name == "Admin")
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">Catalog</h6>
          <button class="btn btn-primary modal-show" type="button" href="{{ route('catalog.create') }}" name="Tambah Kategori Produk" data-toggle="modal" data-target="#modal">+ Add New</button>
        </div>
        <div class="table-responsive">  
          <table id="table" class="table hover" style="width:100%"></table>
        </div>
        @endif
        <div>
        </div>
        <div>
        </div>
      </div>
      @if(Auth::user()->roles->name == "Super Admin" || Auth::user()->roles->name == "Admin" || Auth::user()->roles->name == "Merchant")
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">Download Catalog</h6>
        </div>
        <form method="POST" action="{{route('catalog.download')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="id" class="control-label">Pilih Catalog</label><br>
                  <select id="id" type="text" class="form-control" name="id">
                      @foreach($catalogs as $catalog)
                      <option value="{{$catalog->id}}">{{$catalog->name}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Download</button>
            </div>
        </form>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

@push('js')
  <script>
    $('#table').DataTable({
      responsive: true,
      serverSide: true,
      ajax: "{{ route('catalog.data') }}",
      order: [[ 1, "asc" ]],
      columns: [
        {title: '#', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, width: '7.5%', className: 'dt-center'},
        {title: 'Nama Catalog', data: 'name', name: 'name', width: '30%', className: 'dt-head-center'},
        {title: 'Action', data: 'action', name: 'action', width: '12.5%', className: 'dt-center'},
      ],
    });

    $('body').on('click', '.modal-show', function(event){
      event.preventDefault();
      var me = $(this),
          url = me.attr('href'),
          title = me.attr('name');
      $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
          $('#modal-body').html(response);
          $('#modal-title').text(title);
          $('#modal-close').text(me.hasClass('edit') ? 'Cancel' : 'Close');
          $('#modal-save').text(me.hasClass('edit') ? 'Update' : 'Create');
        }
      });
    });

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

    $('body').on('click', '.delete', function (event) {
      event.preventDefault();

      var me = $(this),
          url = me.attr('href'),
          name = me.attr('name');
          $('.swal2-confirm').append('<i class="fas fa-spinner fa-pulse"></i>');
      swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
      }).then((result)=>{
        $('.swal2-confirm').append('<i class="fas fa-spinner fa-pulse"></i>');
        $('.loading').removeClass('hidden');
        if(result.value){
          $.ajax({
            url: url,
            type: "POST",
            data: {
              '_method': 'DELETE',
              '_token': '{{ csrf_token() }}'
            },
            success: function(response){
              $('.loading').addClass('hidden');
              $('#table').DataTable().ajax.reload();
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
                text: 'Data has been deleted'
              })
            },
            error: function(xhr){
              $('.fa-pulse').remove();
              swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
              });
            }
          });
        }
      });
    });
  </script>
@endpush