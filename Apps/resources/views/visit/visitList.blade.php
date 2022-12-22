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
                    <th>Date</th>
                    <th>Owner</th>
                    <th>Pet</th>
                    <th>Prognosis</th>
                    <th>Status</th>
                    <th>Vet</th>
                    <th>Diagnosis</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-billing">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- @csrf -->
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
            "url": "visit/dt",
            "type": "POST",
            "data": function (d) {
                d._token = $("input[name=_token]").val();

            },
      },
      
      "columnDefs": [
            {
                render: function (data, type, row) {
                    return " <p>"+moment(row.created_date).format('DD-MM-YYYY | HH:mm')+" </p>";
                },
                orderable: true,
                targets: 0
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row.pet.owner.name+"</p>";
                },
                orderable: true,
                targets: 1
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row.pet.name+" </p>";

                },
                orderable: true,
                targets: 2
            },
            {
                render: function (data, type, row) {
                    return " <p>"+row.prognosis+" </p>";
                },
                orderable: true,
                targets: 3
            },
            {
                render: function (data, type, row) {
                   return " <p>"+row.status+" </p>";
                },
                orderable: true,
                targets: 4
            },
            {
                render: function (data, type, row) {
                   return " <p> - </p>";
                },
                orderable: true,
                targets: 5
            },

            {
                render: function (data, type, row) {
                   return " <p> - </p>";
                },
                orderable: true,
                targets: 6
            },
            {
                render: function (data, type, row) {
                  var url = '{{ route("visit-detail", ":id") }}';
                  url = url.replace(':id', row.id);
                  if(row['status'] == "Pending"){
                    var d = '<a type="button" class="btn btn-sm btn-default" href = "'+url+'"><i class = "fa fa-microscope"></i></a>';
                  } else if(row['status'] == 'Selesai') {
                    var d = '<a type="button" class="btn btn-sm btn-default" href = "'+url+'"><i class = "fa fa-microscope"></i></a>&nbsp;';
                    d += '<a type="button" class="btn btn-sm btn-default view-billing"><i class = "fa fa-file-invoice-dollar"></i></a>';
                  } else {
                    var d = '<a type="button" class="btn btn-sm btn-default" href = "'+url+'"><i class = "fa fa-question"></i></a>';
                  }
                  
                  return d;
                },
                orderable: true,
                targets: 7
            },

        ],
        "order": [[0, 'desc']],
        fnDrawCallback : function (oSettings) {
            table_callback();
        }
    });

    function table_callback(){
      $('.view-billing').click(function(){
        $('#modal-billing').modal('show');

        $.ajax({
            url: '/visit/formbill',
            type: 'GET',
            // data : {id:2},
            async: false,
            success: function (form) {
                // $('#modal-desktop-survey .modal-content').append(form);
            }
        })
      })
    }

    $('#add-owner').click(function(){
      $('#form_user').trigger('reset');
      $("#modal-user-detail #klinik_id").val('').trigger('change');
      $('#modal-user-detail').modal('show');
    })
});
</script>
@endpush