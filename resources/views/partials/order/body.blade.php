<div class="col-sm-3">
  <!-- order info -->
  <h5><b><u>Name:</u></b></h5>
  <p>{{ $order->name }}</p>
  <h5><b><u>Description:</u></b></h5>
  <p>{{ $order->description }}</p>
  <h5><b><u>Patient MRN:</u></b></h5>
  <p>{{ $order->patient_id }}</p>
  <h5><b><u>Completed:</u></b></h5>
  <p>{{ $order->completed ? 'Yes' : 'No' }}</p>
  <form method="POST" action="{{ route('complete') }}">
     {{ csrf_field() }}
     <input type="hidden" name="order_id" value="{{ $order->id }}">
     <button type="submit" class="btn btn-primary">Complete Order</button>
  </form>
</div>
