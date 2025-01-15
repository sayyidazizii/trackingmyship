@extends('kurir.template.app')

@section('title', 'Maps')

@section('konten')
<div class="container-fluid mt-5 pt-5">
    <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658975.644836187!2d95.9389585715285!3d-2.268560804487058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1701673110059!5m2!1sid!2sid" style="border:0;" id="map_canvas" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
@endsection