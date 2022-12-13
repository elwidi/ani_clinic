@extends('theme.default')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Buku</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Buku</li>
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
      <h3 class="card-title">List Buku</h3>
      <div style="float:right;">
        <a type="button" class="btn btn-success modif-data" href = "{{route('addBook')}}"><i class="fa fa-plus"></i>&nbsp; Add</a>
      </div>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>ISBN</th>
                    <th>Tahun</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->kode_buku }}</td>
                    <td>{{ $post->judul }}</td>
                    <td>{{ $post->pengarang }}</td>
                    <td>{{ $post->isbn }}</td>
                    <td>{{ $post->tahun }}</td>
                    <td><a href = "{{route('update-book', $post->id)}}" class= "btn btn-sm btn-success"> Edit</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</section>
@endsection