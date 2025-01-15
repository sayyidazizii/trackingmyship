@extends('kurir.template.app')

@section('title', 'Profile')

@section('konten')
<form action="{{url('kurir/profile/update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Update Foto Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row mb-3">
                <input type="file" name="foto" class="form-control" id="foto">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" id="" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->
  </form>
<div class="container-fluid mt-5 pt-5">
    <div class="row">
        <div class="col-md-12 my-2">
            <div class="col text-center">
                <div class="col">
                    @if (empty(Auth::user()->foto))
                    <img src="{{asset('admin/photo_user/no_photo.jpg')}}" alt="Profile" class="rounded-circle" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                    @else
                    <img src="{{asset('storage/photo_user/'.Auth::user()->foto)}}" alt="Profile" class="rounded-circle" style="aspect-ratio: 1/1; object-fit: cover;" width="225px" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                    @endif
                </div>
                <div class="col mt-4">
                    <div class="col">{{$kurir->nama_kurir}}</div>
                    <div class="col">{{$kurir->jadwal}}</div>
                </div>
            </div>
        </div>
        <a class="btn btn-light border btn-block mx-4 my-4" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span>Log Out</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
@endsection