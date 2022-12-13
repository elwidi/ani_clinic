@extends('theme.default')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Clinic</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Clinic</li>
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
      <h3 class="card-title">List Clinic</h3>
      <div style="float:right;">
        <a type="button" class="btn btn-success modif-data" id = "add-clinic"><i class="fa fa-plus"></i>&nbsp; Add</a>
      </div>
        </div>
        <div class="card-body">
        <table class="table table-bordered" id = "table_clinic">
            @csrf
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Tlp</th>
                    <th>Jam Operasional</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-clinic-detail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Clinic</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" id = "form_clinic" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label>Nama Klinik</label>
              <div class="form-group">
                  <input type = "text" name = "nama_klinik" id = "nama_klinik" class = "form-control">
              </div>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <div class="form-group">
                <textarea name = "alamat" id = "alamat" class = "form-control"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label>No Tlp</label>
              <div class="form-group">
                  <input type = "text" name = "no_tlp" id = "no_tlp" class = "form-control">
              </div>
            </div>

                <div class="form-group">
              <label>Jam Operasional</label>
              <div class="form-group">
                  <input type = "text" name = "jam_operasional" id = "jam_operasional" class = "form-control">
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
    var table2 = $("#table_clinic").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "serverSide": true,
      "ajax": {
            "url": "clinic/datatable",
            "type": "POST",
            "data": function (d) {
                d._token = $("input[name=_token]").val();

            },
      },
      
      "columnDefs": [
            {
                render: function (data, type, row) {
                    return " <p>"+row["nama_klinik"]+" </p>";
                },
                orderable: true,
                targets: 0
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row["alamat"]+" </p>";
                },
                orderable: true,
                targets: 1
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row["no_tlp"]+" </p>";

                },
                orderable: true,
                targets: 2
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row["operational_hours"]+" </p>";
                },
                orderable: true,
                targets: 3
            },
            {
                render: function (data, type, row) {
                  var d = '<button type="button" class="btn btn-default edit-data" data-id = "'+row.id+'"><i class = "fa fa-edit"></i></button>';
                  d += '&nbsp; <button type="button" class="btn btn-danger delete-data" data-id = "'+row.id+'"><i class = "fa fa-trash"></i></button>';
                  return d;
                },
                orderable: true,
                targets: 4
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
                  url: '/clinic/delete/'+id,
                  type: 'GET',
                  dataType: 'json',
                  async: false,
                  success: function (res) {
                    // submitting = false;
                    if(res.status == 200){
                      toastr.success('Data has been deleted.')
                      var table1 = $("#table_clinic").dataTable();
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

    $('#add-clinic').click(function(){
      $('#form_clinic').trigger('reset')
      $('#modal-clinic-detail').modal('show');
    })

    $('#form_clinic').submit(function(e){
      e.preventDefault();
      // var form = $(this);

      $.ajax({
        url: '/clinic/store',
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
            var table1 = $("#table_clinic").dataTable();
            table1.api().ajax.reload();
            toastr.success('Data Saved');
            $('#modal-clinic-detail').modal('toggle');
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