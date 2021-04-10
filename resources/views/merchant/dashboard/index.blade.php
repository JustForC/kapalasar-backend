@extends('layouts.dashboard')

@section('title','Dashboard')

@push('css')
@endpush

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">RIWAYAT TRANSAKSI</h6>
        </div>
        <div class="table-responsive">
          <table id="table" class="table hover" style="width:100%">
            <tr>
              <td>ID</td>
              <td>Nama</td>
              <td>Status</td>
              <td>Voucher</td>
              <td>Total</td>
              <td>Invoice</td>
              <td>Tanggal Invoice</td>
              <td>Receipt</td>
              <td>Tanggal Receipt</td>
            </tr>
            @foreach($transactions as $transaction)
            <tr>
              <td>$transaction->id</td>
              <td>$transaction->users->name</td>
              <td>$transaction->status</td>
              <td>$transaction->vouchers->name</td>
              <td>$transaction->total</td>
              <td>$transaction->invoice</td>
              <td>$transaction->invoice_date</td>
              <td>$transaction->receipt</td>
              <td>$transaction->receipt_date</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">GRAFIK TRANSAKSI</h6>
          {{-- <button class="btn btn-primary modal-show" type="button" href="" name="Tambah Produk Baru" data-toggle="modal" data-target="#modal">+ Add New</button> --}}
        </div>
        <div>
          <canvas id = "myChart" width="400" height="200"> </canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
  <script>

    // $('#table').DataTable({
    //   responsive: true,
    //   serverSide: true,
    //   ajax: "",
    //   order: [[ 1, "asc" ]],
    //   columns: [
    //     {title: '#', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, width: '7.5%', className: 'dt-center'},
    //     {title: 'Name', data: 'name', name: 'name', width: '30%', className: 'dt-head-center'},
    //     {title: 'Description', data: 'desc', name: 'desc', width: '30%', className: 'dt-head-center'},
    //     {title: 'User', data: 'users.name', name: 'users.name', width: '30%', className: 'dt-head-center'},
    //     {title: 'Action', data: 'action', name: 'action', width: '12.5%', className: 'dt-center'},
    //   ],
    // });

    var ctx = document.getElementById('myChart');
    var ctx = document.getElementById('myChart').getContext('2d');
    var ctx = $('#myChart');
    var ctx = 'myChart';

    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
            label: 'Penjualan Perbulan',
            data: [9, 3, 5, 1, 0, 0],
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
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