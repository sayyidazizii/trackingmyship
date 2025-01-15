@extends('admin.template.appadmin')

@section('title', 'Table Data Kurir')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Kurir</h1>
    <ol class="breadcrumb mb-4 bg-white">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Kurir</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Kurir</h6>
                <a href="{{ route('kurir.create') }}" class="btn btn-primary mb-3">Tambah <i class="fa-solid fa-plus"></i></a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">#</th>
                                <th class="text-bold" scope="col">Nama</th>
                                <th class="text-bold" scope="col">Nomor HP</th>
                                <th class="text-bold" scope="col">Jadwal</th>
                                <th class="text-bold" scope="col">Layanan Pengiriman</th>
                                <th class="text-bold" scope="col">Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kurir as $k)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$k->nama_kurir}}</td>
                                    <td>{{$k->nomor_telepon}}</td>
                                    <td>{{$k->jadwal}}</td>
                                    <td>{{$k->layanan->nama_layanan ?? 'belum ada'}}</td>
                                    <td>
                                
                                    <a href="{{route('kurir.show',$k->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('kurir.edit',$k->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$k->id}}">
                                        <i class="fas fa-trash"></i>
                                        </button>     
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Apakah anda yakin akan menghapus data {{$k->nama_kurir}} ?
                                          </div>
                                          <div class="modal-footer">
                                            <form action="{{route('kurir.destroy',$k->id)}}" method="POST">
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