@extends('template.home_template')  
@section('home')

  <h1>Klik Bayar Untuk Memilih metode pembayaran</h1>
  {{-- @foreach ($pesanan as $item)
      
  {{ $item->id_pesanan }}
  @endforeach --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-9ZmOtl21kQPuItRW"></script>
    <div class="container">
      <form action="/index" method="POST" >
        @csrf
      </form>
      <div class="content flex justify-center">
        <button class="bg-yellow-500 hover:bg-yellow-400 py-2 px-4 text-white rounded-xl text-center"  id="pay-button">Bayar</button>
      </div>

      <form action="" method="POST" id="submit_form">
        @csrf
        <input type="hidden" name="json" id="json_callback">
      </form>

      <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snap_token }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
            send_response_to_form(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
            send_response_to_form(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
            send_response_to_form(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        });
        // customer will be redirected after completing payment pop-up
      });

      function send_response_to_form(result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
      }
      </script>
      </div>
@endsection
