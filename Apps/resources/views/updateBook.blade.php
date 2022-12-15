@extends('theme.default')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Book</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Book</a></li>
          <li class="breadcrumb-item active">Update</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action = "{{route('modify-book', $book->id)}}">
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
                  <label for="inputName">Kode Buku</label>
                  <input type="text" value = "{{$book->kode_buku}}" class="form-control" name = "kode_buku">
                </div>
              </div>
            </div>
            <div class = "row">
              <div class = "col-md-6">
                <label for="inputName">Judul</label>
                <input type="text" value = "{{$book->judul}}" class="form-control" name = "judul">
              </div>
            </div>
            <div class = "row">
              <div class = "col-md-6">
                <label for="inputName">Pengarang</label>
                <input type="text" value = "{{$book->pengarang}}" class="form-control" name = "pengarang">
              </div>
            </div>

            <div class = "row">
              <div class = "col-md-6">
                <label for="inputName">ISBN</label>
                <input type="text" value = "{{$book->isbn}}" class="form-control" name = "isbn">
              </div>
            </div>
            
            <div class = "row">
              <div class = "col-md-6">
                <label for="inputName">Tahun</label>
                <input type="text" value = "{{$book->tahun}}" class="form-control" name = "tahun">
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