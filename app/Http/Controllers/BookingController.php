<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
 

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    public function bookingcompleted()
    {
        if(Auth::user()->hasRole('user')){
            $bkings = \DB::table('bookings')->where('user_id', auth()->id())->get();
            return view('bookings.bookingcompleted', compact('bkings'));
        }
        elseif(Auth::user()->hasRole('admin')){

            return view ('dashboard');
            $bkings = \DB::table('bookings');
            return view('bookings.history', compact('bkings'));
    }
    }
    

    public function bookinghistory()
    {
        $bkings = \DB::table('bookings');
        return view('bookings.history', compact('bkings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Booking::create([
            'origin' => request('origin'),
            'destination' => request('destination'),
            'time' => request('time'),
            'date' => request('date'),
            'bus_no' => request('bus_no'),
            'bus_type' => request('bus_type'),
            'bus_seats' => request('bus_seats'),
            'ticket_price' => request('ticket_price'),
            'seat_number' => request('seat_number'),
            'status' => request('status')            
        ]);

        return redirect()->route('bookings.bookingcompleted');
    }

    public function storefeedback(Request $request)
    {   dd('store');
        Feedback::create([
            'user_id'=> (auth()->id())->get(),
            'feedback' => request('feedback')    
        ]);

        return redirect()->route('bookings.miscellaneous');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function miscellaneous(Booking $booking)
    {
        return view('bookings.miscellaneous', compact('booking'));
    }    
    
     public function delete(Booking $booking)
    {
        return view('bookings.delete', compact('booking'));
    } 
    
     public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('dashboard');
    }
}
