@extends('admin.template.appadmin')

@section('title', 'Table Data Layanan')

@section('content')
<form action="{{ url('admin/layanan/importLayanan') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Layanan Pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file" name="file" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
      </div>
  </div>
</form>
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Layanan</h1>
    <ol class="breadcrumb mb-4 bg-white">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Layanan</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Layanan</h6>
                <a href="{{ route('layanan.create') }}" class="btn btn-primary mb-3">Tambah <i class="fa-solid fa-plus"></i></a>
                <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#exampleModal">
                  Import <i class="fas fa-upload"></i>
                </button>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">#</th>
                                <th class="text-bold" scope="col">Nama Layanan</th>
                                <th class="text-bold" scope="col">Biaya</th>
                                <th class="text-bold" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($layanan as $lyn)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$lyn->nama_layanan}}</td>
                                <td>Rp. {{number_format($lyn->biaya, 0, ',', '.')}} / Kg</td>
                                <td>
                                <a href="{{route('layanan.show',$lyn->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{route('layanan.edit',$lyn->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$lyn->id}}">
                                    <i class="fas fa-trash"></i>
                                    </button>     
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$lyn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Apakah anda yakin akan menghapus data {{$lyn->nama_layanan}} ?
                                      </div>
                                      <div class="modal-footer">
                                        <form action="{{route('layanan.destroy',$lyn->id)}}" method="POST">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
