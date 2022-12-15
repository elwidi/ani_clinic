@extends('theme.default')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Owner Detail</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Owner</a></li>
          <li class="breadcrumb-item active">View</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class = "col-12">
      <!-- Administration - Start !-->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
            <div class = "row">
              <div class = "col-md-6">
                <div class="form-group">
                  <label for="inputName">No Registrasi</label>
                  <input type="text" class="form-control" value = "{{$owner->kode_pelanggan}}" disabled>
                </div>
              </div>
            </div>
            <div class = "row">
              <div class = "col-md-6">
                <label for="inputName">Nama</label>
                <input type="text" class="form-control" value = "{{$owner->name}}" disabled>
              </div>
            </div>
            <div class = "row">
              <div class = "col-md-6">
                <label for="inputName">No HP</label>
                <input type="text" value = "{{$owner->no_hp}}" class="form-control" disabled>
              </div>
            </div>

            <div class = "row">
              <div class = "col-md-6">
                <label for="inputName">Alamat</label>
                <input type="text" value = "{{$owner->alamat}}" class="form-control" disabled>
              </div>
            </div>
            
            <div class = "row">
              <div class = "col-md-6">
                <label for="inputName">Email</label>
                <input type="text" value = "{{$owner->email}}" class="form-control" disabled>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="col-md-12">
        <div class="card card-purple">
          <div class = "card-header">
            <h3 class = "card-title">Pet</h3>
          </div>
          <div class="card-body">
            <div class = "row">
              <button class = "btn btn-info btn-sm" style = "float:right;"> Add</button>
            </div>
            <br/>
            <table class = "table table-bordered">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Spesies</th>
                  <th>Jenis Kelamin</th>
                  <th>Umur</th>
                  <th>Ras</th>
                  <th>Warna</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @forelse($pet as $p)
                <tr>
                  <td><a class = "pet_detail" data-pet-id = "{{$p->id}}" href = "#">{{ $p->name }}</a></td>
                  <td>{{ $p->species }}</td>
                  <td>{{ $p->sex }}</td>
                  <td>{{ $p->age }}</td>
                  <td>{{ $p->race }}</td>
                  <td>{{ $p->color }}</td>
                  <td><button class = "btn btn-default new-visit" data-pet-id = "{{$p->id}}">Visit</button></td>
                </tr>
                @empty
                <tr>
                  <td colspan = "6" class = "txt-center">No pet data.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Administration - End !-->
    </div>
  </div>
</section>

<div class="modal fade" id="modal-pet-detail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pet's Name</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary card-outline card-outline-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Visits</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Vaccination</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Parasite Prevention</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <span> Name : </span><span id = "show_detail_name"></span>
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  Isi Tab Visits
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                 Isi Tab Vaksinasi
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                  Isi Tab Parasite Prevention
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="modal-footer pull-right">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-new-visit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Visits</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" id = "form_new_visit" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label>Owner</label>
              <div class="form-group">
                  <input type = "hidden" name = "owner_id" id = "owner_id">
                  <input type = "text" name = "owner_name" id = "owner_name" class = "form-control" disabled>
              </div>
            </div>

            <div class="form-group">
              <label>Pet</label>
              <div class="form-group">
                  <input type = "hidden" name = "pet_id" id = "pet_id">
                  <input type = "text" name = "pet_name" id = "pet_name" class = "form-control" disabled>
              </div>
            </div>

            <div class="form-group">
              <label>Prognosis</label>
              <div class="form-group">
                  <textarea class = "form-control" name = "prognosis" id = "prognosis" row = "5"></textarea>
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
    $('.pet_detail').click(function(e){
      $('#modal-pet-detail').modal('show');
      var petId = $(this).attr('data-pet-id');
      $.ajax({
        url: '/pet/detail_ajax/'+petId,
        type: 'GET',
        dataType: 'json',
        async: false,
        success: function (res) {
          if(res.status == 200){
            $('#show_detail_name').html(res.data.name);
          }
        }
      })
    })

    $('.new-visit').click(function(e){
      $('#modal-new-visit').modal('show');
      var petId = $(this).attr('data-pet-id');
      $.ajax({
        url: '/pet/detail_ajax/'+petId,
        type: 'GET',
        dataType: 'json',
        async: false,
        success: function (res) {
          if(res.status == 200){
            $('#modal-new-visit #pet_id').val(res.data.id);
            $('#modal-new-visit #pet_name').val(res.data.name);
            $('#modal-new-visit #owner_id').val(res.data.owner_id);
            $('#modal-new-visit #owner_name').val(res.data.owner_name);
          }
        }
      })
    })

    $('#form_new_visit').submit(function(e){
      e.preventDefault();
      var form = $(this);
      $.ajax({
        url: '/visit/new/',
        type: 'POST',
        dataType: 'json',
        data:form.serialize(),
        async: false,
        success: function (res) {
          if(res.status == 200){
            location.reload();
          }
        }
      })
    })
  })
</script>
@endpush