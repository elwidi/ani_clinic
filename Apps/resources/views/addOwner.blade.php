@extends('theme.default')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add Owner</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Owner</a></li>
          <li class="breadcrumb-item active">Add</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action = "{{route('store-owner')}}">
    @csrf
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
                  <input type="text" value = "" class="form-control" name = "kode_pelanggan" required>
                </div>
              </div>
            </div>
            <div class = "row">
              <div class = "col-md-6">
                <div class="form-group">
                    <label for="inputName">Nama</label>
                    <input type="text" value = "" class="form-control" name = "name" required>
                </div>
              </div>
            </div>
            <div class = "row">
              <div class = "col-md-6">
                <div class="form-group">
                    <label for="inputName">No HP</label>
                    <input type="text" value = "" class="form-control" name = "alamat">
                </div>  
              </div>
            </div>

            <div class = "row">
              <div class = "col-md-6">
                <div class="form-group">
                    <label for="inputName">Alamat</label>
                    <input type="text" value = "" class="form-control" name = "no_hp">
                </div>      
              </div>
            </div>
            
            <div class = "row">
              <div class = "col-md-6">
                    <div class="form-group">
                        <label for="inputName">Email</label>
                        <input type="text" value = "" class="form-control" name = "email">
                    </div>
              </div>
            </div>

          </div>
          
            
          <div class="card-footer">
            <div class="col-sm-5" style="float: right;">
                    
              <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-paper-plane"></i>&nbsp;Submit</button>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- Administration - End !-->
    </div>
  </div>
  </form>
</section>
@endsection