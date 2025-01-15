<!DOCTYPE html>
<html>
<head>
  <title>Payment Dompetku</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('user/css/stylePayment.css')}}">
  <script type="text/javascript"
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="{{config('midtrans.client_key')}}"></script>
</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment</h2>
          <p>TrackMyShipment</p>
        </div>
        <form>
          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
              <span class="price">Rp. {{number_format($bayar, 0, ',', '.')}}</span>
              <p class="item-name">Saldo</p>
            </div>
            <div class="item">
              <span class="price">Rp. {{number_format($pajak, 0, ',', '.')}}</span>
              <p class="item-name">Pajak</p>
            </div>
            <div class="total">Total<span class="price">Rp. {{number_format($total, 0, ',', '.')}}</span></div>
          </div>
          <button type="button" class="btn btn-primary btn-block" id="pay-button">Payment</button>
        </form>
      </div>
    </section>
  </main>
</body>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){
          window.location.href = '{{url('my/dompetku/success/'. $topupID->topup_no)}}';
        },
        onPending: function(result){
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          alert('you closed the popup without finishing the payment');
        }
      })
    });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
