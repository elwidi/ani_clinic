@extends('theme.default')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Visit Detail</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Visit</a></li>
          <li class="breadcrumb-item active">Detail</li>
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
          <form role="form" id = "form_update_visit" method="POST" action = "{{route('update-visit', $visit->id)}}">
          <div class="card-body">
            @csrf
              <div class = "row">
                <div class = "col-md-6">
                    <div class="form-group">
                        <label for="inputName">Owner</label>
                        <input type="text" class="form-control" value = "{{$owner->name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Pet</label>
                        <input type="text" class="form-control" value = "{{$pet->name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Prognosis</label>
                        <textarea class = "form-control" disabled>{{$visit->prognosis}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Suhu</label>
                        <input type="text" class="form-control" id = "temperature" name = "temperature" value = "{{$visit->temperature}}">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Weight</label>
                        <input type="text" class="form-control" id = "" name = "weight" value = "{{$visit->weight}}">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Diagnosis</label>
                        <textarea class = "form-control" id = "diagnosis" name = "diagnosis" rows = '4'>{{$visit->diagnose}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Additional Notes</label>
                        <textarea class = "form-control" id = "notes" name = "notes" rows = '4'>{{$visit->note}}</textarea>
                    </div>
                </div>
                <div class = "col-md-6">
                  <button class="btn btn-sm btn-info" style = "float:right; margin-bottom:5px;"><i class = "fa fa-plus"></i>  &nbsp; Add Item</button>
                    <table class = "table table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Item</th>
                          <th>Qty</th>
                          <th>Notes</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>
                          <select class = "form-control" name = "bill[0][item_id]">
                            <option value = "">-Select-</option>
                            @foreach($bill_item as $item)
                            <option value = "{{$item->id}}">{{$item->item_name}}</option>
                            @endforeach
                          </select>
                          </td>
                          <td><input type = "number" name = "bill[0][qty]" class = "form-control"></td>
                          <td><textarea class = "form-control" name="bill[0][notes]"></textarea></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success" style = "float:right;">Save</button>
          </div>
          </form>
        </div>
      </div>
      <!-- Administration - End !-->
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  $(function() {
    $('#form_new_visit').submit(function(e){
      e.preventDefault();
      var form = $(this);
      $.ajax({
        url: '/visit/update/',
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