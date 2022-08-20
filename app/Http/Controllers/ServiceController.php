<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services',compact('services'));
    }

    public function booking(Service $service)
    {
        $services = Service::all();
        $date = date('Y-m-d');
        // dd($date);
        $user = Auth::user();
        return view('booking',compact('service','services','date','user'));
    }

    public function result(Booking $booking)
    {
        // dd($booking);
        $user = Auth::user();
        $service = Service::where('id','=',$booking['service_id'])->first();
        // dd($service);
        if($booking['user_id']==$user['id'] || $user['email']=='admin@admin.com')
        return view('layouts.invoice',compact('booking','user','service'));
        else
        return redirect('/');
    }

    public function visa(Booking $booking)
    {
        return view('layouts.visa',compact('booking'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('single-service',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
