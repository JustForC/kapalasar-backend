<form id="form_modal" class="form" method="POST" action="{{ $model->exists ? route('voucher.update', $model->id) : route('voucher.store') }}" enctype="multipart/form-data">
    @csrf {{ method_field($model->exists ? 'PUT' : 'POST') }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            &times;
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="category" class="control-label">Jenis Voucher</label><br>
            <select id="category" type="text" class="form-control" name="types_id">
                <option value="0" selected="selected" disabled>Pilih Jenis Voucher</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}" >{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Nama Voucher</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$model->name}}" placeholder="Nama Voucher">
        </div>
        {{-- <div class="form-group">
            <label for="amount" class="control-label">Jumlah Voucher</label>
            <input id="amount" type="number" class="form-control" name="amount" value="{{$model->amount}}" placeholder="Jumlah Voucher">
        </div> --}}
        <div class="form-group">
            <label for="value" class="control-label">Besar Potongan</label>
            <input id="value" type="number" class="form-control" name="value" value="{{$model->value}}" placeholder="Besar Potongan">
        </div>
        <div class="form-group">
            <label for="start" class="control-label">Waktu Mulai</label>
            <input id="start" type="datetime-local" class="form-control" name="start" value="{{$model->start}}">
        </div>
        <div class="form-group">
            <label for="end" class="control-label">Waktu Berakhir</label>
            <input id="end" type="datetime-local" class="form-control" name="end" value="{{$model->end}}">
        </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

    <script type="text/javascript">
    </script>

</form>