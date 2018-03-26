@extends("layouts.app")
@section("title", "Vitae NET Administration - Patient")
@section("content")
<div class="col-md-offset-1 col-md-10">
  <div id="patient" class="panel panel-default">
    <div class="panel-heading">
      @include("partials.patient.header", ["patient" => $patient])
    </div>
    <div class="panel-body">
      @include("partials.patient.body", ["patient" => $patient])
      <div class="row">
        <div class="col-md-6">
          <h5><b><u>Bar Code</u></b></h5>
          <?php echo $patient->generateBarcode() ?>
        </div>
      </div>
    </div>
  </div>
</div>
@include("partials.mar", [
  "medical_record_number" => $patient->medical_record_number,
  "prescriptions" => $prescriptions,
  "statMeds" => $statMeds,
  "meds" => $meds,
])
<div class="col-md-offset-1 col-md-10">
  <div class="panel-group" role="tablist">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        <h3 class="panel-title">
          <a href="#labs" class="collapsed" role="button" data-toggle="collapse">Lab Results</a>
        </h3>
      </div>
      <div id="labs" class="panel-collapse collapse in" role="tabpanel">
        @if ($labs->isEmpty())
          <div class="panel-body">
            <h5 class="text-center text-muted">No Labs for
              <span class="text-capitalize">{{ $patient->first_name }} {{ $patient->last_name }}</span>
            </h5>
          </div>
        @else
          <ul class="list-group">
            @foreach ($labs as $lab)
              <a class="list-group-item" href="{{ route('labs.show', ['id' => $lab->id]) }}">{{ $lab->name }}</a>
            @endforeach
          </ul>
        @endif
      </div>
    </div>
  </div>
  <div class="panel-group" role="tablist">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        <h3 class="panel-title">
          <a href="#orders" class="collapsed" role="button" data-toggle="collapse">Provider's Orders</a>
        </h3>
      </div>
      <div id="orders" class="panel-collapse collapse in" role="tabpanel">
        @if ($orders->isEmpty())
          <div class="panel-body">
            <h5 class="text-center text-muted">No Orders for
              <span class="text-capitalize">{{ $patient->first_name }} {{ $patient->last_name }}</span>
            </h5>
          </div>
        @else
          <ul class="list-group">
            @foreach ($orders as $order)
              @if ($order->completed)
                <a class="list-group-item list-group-item-success" href="{{ route('orders.show', ['id' => $order->id]) }}">
                  {{ $order->name }}
                </a>
              @else
                <a class="list-group-item list-group-item-danger" href="{{ route('orders.show', ['id' => $order->id]) }}">
                  {{ $order->name }}
                </a>
              @endif
            @endforeach
          </ul>
        @endif
      </div>
    </div>
  </div>
</div>
@include("partials.mar", [
  "medical_record_number" => $patient->medical_record_number,
  "prescriptions" => $prescriptions,
  "statMeds" => $statMeds,
  "meds" => $meds,
])
@include("partials.assessment", [
  "medical_record_number" => $patient->medical_record_number,
  "assessment" => $assessment,
])
@endsection
