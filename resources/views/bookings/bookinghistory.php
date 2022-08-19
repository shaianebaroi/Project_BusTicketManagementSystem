@extends('layouts.main');
@section('content');

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">BOOKING HISTORY</h1>
        <h6> Please proceed to the Bus Counter to complete the Payment Procedure within the next three days. 
        Failure to do so, will result in the cancellation of the booking. Booking is confirmed when Payment Status = 1.</h4>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Origin</th>
              <th scope="col">Destination</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Bus No.</th>
              <th scope="col">Bus Type</th>
              <th scope="col">Ticket Price</th>
              <th scope="col">Payment Status</th>

            </tr>
          </thead>
        

        @foreach ($bkings as $booking) 
          <tr>
            <td> {{ $booking->origin }} </td>
            <td> {{ $booking->destination }} </td>
            <td> {{ $booking->date }} </td>
            <td> {{ $booking->time }} </td>
            <td> {{ $booking->bus_no }} </td>
            <td> {{ $booking->bus_type }} </td>
            <td> {{ $booking->ticket_price}} </td>
            <td> {{ $booking->status }} </td>
          <td> 
          <a button type="button" class="btn btn-danger" onclick = "location.href = '/booking/delete/{{ $booking->booking_id }}' ">Delete</button></a>
          </td>
          </tr>
          @endforeach 
          
          </table>
          <a href = "{{ route('dashboard') }}" class = "btn btn-secondary"> Back </a>
      </div>
    </main>
@endsection

