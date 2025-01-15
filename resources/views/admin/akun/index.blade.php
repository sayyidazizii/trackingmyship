@extends('admin.template.appadmin')

@section('title', 'Table Data Akun Kurir')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Akun</h1>
    <ol class="breadcrumb mb-4 bg-white">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Akun</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Akun</h6>
                <a href="{{ route('akun.create') }}" class="btn btn-primary mb-3">Tambah <i class="fa-solid fa-plus"></i></a>
                </a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">#</th>
                                <th class="text-bold" scope="col">Nama Lengkap</th>
                                <th class="text-bold" scope="col">Email</th>
                                <th class="text-bold" scope="col">Posisi</th>
                                <th class="text-bold" scope="col">Alamat</th>
                                <th class="text-bold" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akun as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$user->fullname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->level}}</td>
                                    <td>{{$user->alamat}}</td>
                                    <td>
                                        <a href="{{route('akun.edit',$user->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                            <i class="fas fa-trash"></i>
                                            </button>     
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                Apakah anda yakin akan menghapus data {{$user->fullname}} ?
                                              </div>
                                              <div class="modal-footer">
                                                <form action="{{route('akun.destroy',$user->id)}}" method="POST">
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