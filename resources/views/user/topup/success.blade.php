<!DOCTYPE html>
<html>
<head>
  <title>Checkout Berhasil!!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0b9d20e297.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('user/css/stylePayment.css')}}">
</head>
<body>
  <main class="page payment-page my-4 py-4">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <i class="fa-solid fa-circle-check mb-2" style="font-size:48px;color:green"></i>
          <h2>Success Payment</h2>
          <p>TrackMyShipment</p>
        </div>
        <div class="text-center">
            <a href="{{url('my/dompetku')}}" type="button" class="btn btn-primary text-center">Lihat Transaksi</a>
        </div>
      </div>
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
