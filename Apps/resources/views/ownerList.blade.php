@extends('theme.default')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Owner</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Visit</li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </div>
    </div>
  </div>
</div>
@csrf
<section class="content">
    <div class="card">
        <div class="card-header">
      <h3 class="card-title">List Owner</h3>
      <div style="float:right;">
        <a type="button" class="btn btn-success modif-data" id = "add-owner"><i class="fa fa-plus"></i>&nbsp; Add</a>
      </div>
        </div>
        <div class="card-body">
        <table class="table table-bordered" id = "table2">
            @csrf
            <thead>
                <tr>
                    <th>No Reg</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Tlp</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-user-detail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Owner</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" id = "form_user" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label>No Registrasi</label>
              <div class="form-group">
                  <input type = "hidden" name = "owner_id" id = "owner_id">
                  <input type = "text" name = "kode_pelanggan" id = "kode_pelanggan" class = "form-control">
              </div>
            </div>

            <div class="form-group">
              <label>Klinik</label>
              <div class="form-group">
                  <select name = "klinik_id" id = "klinik_id" class = "select2">
                    <option></option>
                    @foreach($clinic as $c)
                    <option value = "{{$c->id}}">{{$c->nama_klinik}}</option>
                    @endforeach
                  </select>
              </div>
            </div>

            <div class="form-group">
              <label>Nama</label>
              <div class="form-group">
                  <input type = "text" name = "name" id = "name" class = "form-control">
              </div>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <div class="form-group">
                  <input type = "text" name = "alamat" id = "alamat" class = "form-control">
              </div>
            </div>

            <div class="form-group">
              <label>No HP</label>
              <div class="form-group">
                  <input type = "text" name = "no_hp" id = "no_hp" class = "form-control">
              </div>
            </div>

            <div class="form-group">
              <label>Email</label>
              <div class="form-group">
                  <input type = "text" name = "email" id = "email" class = "form-control">
              </div>
            </div>

            <div class="form-group">
              <label>Foto Kartu Reg</label>
              <div class="form-group">
                  <input type = "file" name = "file" id = "file" class = "form-control">
              </div>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection

@push('scripts')
<script>
$(function() {
    var table2 = $("#table2").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "serverSide": true,
      "ajax": {
            "url": "owner/json",
            "type": "POST",
            "data": function (d) {
                d._token = $("input[name=_token]").val();

            },
      },
      
      "columnDefs": [
            {
                render: function (data, type, row) {
                    return " <p>"+row["kode_pelanggan"]+" </p>";
                },
                orderable: true,
                targets: 0
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row["name"]+" </p>";
                },
                orderable: true,
                targets: 1
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row["alamat"]+" </p>";

                },
                orderable: true,
                targets: 2
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row["no_hp"]+" </p>";
                },
                orderable: true,
                targets: 3
            },
            {
                render: function (data, type, row) {
                   return " <p>"+row["email"]+" </p>";
                },
                orderable: true,
                targets: 4
            },
            {
                render: function (data, type, row) {
                  var url = '{{ route("owner-view", ":id") }}';
                  url = url.replace(':id', row.id);
                  var d = '<button type="button" class="btn btn-sm btn-default edit-data" data-id = "'+row.id+'"><i class = "fa fa-edit"></i></button>';
                  d += '&nbsp; <a href = "'+url+'" class="btn btn-sm btn-info"><i class = "fa fa-eye"></i></a>';
                  d += '&nbsp; <button type="button" class="btn btn-sm btn-danger delete-data" data-id = "'+row.id+'"><i class = "fa fa-trash"></i></button>';
                  return d;
                },
                orderable: true,
                targets: 5
            },

        ],
        "order": [[0, 'desc']],
        fnDrawCallback : function (oSettings) {
            table_callback();
        }
    });

    function table_callback(){
      $('.edit-data').click(function(){
        var id = $(this).attr('data-id');
        $.ajax({
          url: '/owner/detail/'+id,
          type: 'GET',
          dataType: 'json',
          // data: new FormData(this),
          async: false,
          success: function (res) {
            // submitting = false;
            if(res.status == 200){
              $('#modal-user-detail').modal('toggle');
              $('#modal-user-detail #owner_id').val(res.data.id);
              $("#modal-user-detail #klinik_id").val(res.data.klinik_id).trigger('change');
              $.each(res.data, function(i,e){
                var elem = '#'+i;
                $(elem).val(e);
              })
            } else {
              return false;
              toastr.danger(res.message);
            }
          }
        });
      })

      $('.delete-data').click(function(){
        var id = $(this).attr('data-id');

        toastr.warning("<br /><button type='button' value='yes' class = 'btn btn-success'>Yes</button> &nbsp;<button type='button' class = 'btn btn-danger' value='no' >No</button>",'Are you sure you want to delete this item?',
        {
            allowHtml: true,
            onclick: function (toast) {
              value = toast.target.value
              if (value == 'yes') {
                $.ajax({
                  url: '/owner/delete/'+id,
                  type: 'GET',
                  dataType: 'json',
                  // data: new FormData(this),
                  async: false,
                  success: function (res) {
                    // submitting = false;
                    if(res.status == 200){
                      toastr.success('Data has been deleted.')
                      var table1 = $("#table2").dataTable();
                      table1.api().ajax.reload();
                    } else {
                      toastr.danger(res.message);
                    }
                  }
                });
              } else {
                toastr.clear();
                toastr.info('Data will not be deleled.')
              }
            }

        })
      })
    }

    $('#add-owner').click(function(){
      $('#form_user').trigger('reset');
      $("#modal-user-detail #klinik_id").val('').trigger('change');
      $('#modal-user-detail').modal('show');
    })

    $('#form_user').submit(function(e){
      e.preventDefault();

      $.ajax({
        url: '/owner/save-owner/',
        type: 'POST',
        dataType: 'json',
        data: new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async: false,
        success: function (res) {
          // submitting = false;
          if(res.status == 200){
            var table1 = $("#table2").dataTable();
            table1.api().ajax.reload();
            toastr.success('Data Saved');
            $('#modal-user-detail').modal('toggle');
          } else {
            return false;
            toastr.danger(res.message);
          }
        }
      });
    })
});
</script>
@endpush