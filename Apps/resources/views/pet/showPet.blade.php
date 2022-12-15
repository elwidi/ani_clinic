@extends('theme.default')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Pet</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Pet</li>
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
      <h3 class="card-title">List Pet</h3>
      <div style="float:right;">
        <a type="button" class="btn btn-success modif-data" id = "add-clinic"><i class="fa fa-plus"></i>&nbsp; Add</a>
      </div>
        </div>
        <div class="card-body">
        <table class="table table-condensed" id = "table_pet">
            @csrf
            <thead>
                <tr>
                    <th>Owner</th>
                    <th>Nama</th>
                    <th>DOB</th>
                    <th>Species</th>
                    <th>Race</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(function() {
    var table2 = $("#table_pet").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "serverSide": true,
      "ajax": {
            "url": "pet/datatable",
            "type": "POST",
            "data": function (d) {
                d._token = $("input[name=_token]").val();

            },
      },
      
      "columnDefs": [
            {
                render: function (data, type, row) {
                    return " <p>"+row["owner_name"]+" </p>";
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
                    if(row['dob'] == null) row['dob'] = '-';
                    return " <p>"+row["dob"]+" </p>";

                },
                orderable: true,
                targets: 2
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row["species"]+" </p>";
                },
                orderable: true,
                targets: 3
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row["race"]+" </p>";
                },
                orderable: true,
                targets: 4
            },
            {
                render: function (data, type, row) {
                  var d = '<button type="button" class="btn btn-default edit-data" data-id = "'+row.id+'"><i class = "fa fa-edit"></i></button>';
                  d += '&nbsp; <button type="button" class="btn btn-danger delete-data" data-id = "'+row.id+'"><i class = "fa fa-trash"></i></button>';
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