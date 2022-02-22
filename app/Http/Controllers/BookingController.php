<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $bookings = DB::table('bookings')
        ->join('users', 'users.id', '=', 'bookings.user_id')
        ->join('services', 'services.id', '=', 'bookings.service_id')
        ->select('bookings.*', 'services.service', 'users.name')
        ->get();

        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response5
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'id'=>'required',
           'name'=>['required','max:30'],
           'date'=>['required','max:30'],
           'service_id'=>'required',
           'phone'=>['required','max:15','min:9'],
           'location'=>['required','min:5']
        ]);
        $user = Auth::user()->id;
        if($user!=$request['id'])
            return redirect('/');
        Booking::create([
            'service_id'=>$request['service_id'],
            'location'=>$request['location'],
            'date'=>$request['date'],
            'user_id'=>$request['id'],
            'phone'=>$request['phone']
        ]);
        return view('confirm');
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
    public function edit($id)
    {
        $booking = Booking::find($id);
        return view("admin.booking.edit",compact("booking"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->result = $request->input('result');
        $booking->update();
        return redirect("/bookings");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect("/bookings");
    }
}
