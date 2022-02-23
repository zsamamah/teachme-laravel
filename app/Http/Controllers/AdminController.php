<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        $services = Service::all();
        $bookings = Booking::all();
        return view('admin.index',compact('user','services','bookings'));
    }

    public function showServices()
    {
        $services = Service::paginate(10);
        // dd($services->links());
        return view('admin.services.index',compact('services'));
    }

    public function editService($name)
    {
        // dd($service);
        $single_service = Service::where("service","=",$name)->get();
        // dd($single_service);
        return view('admin.services.edit',compact('single_service'));
    }

    public function createService(Request $request)
    {
        Service::create([
            'service'=>$request['service'],
            'price'=>$request['price'],
            'service_image'=>$request['service_image'],
            'description'=>$request['description']
        ]);
        return redirect('/dashboard');
    }

    public function storeService(Request $request,Service $service)
    {
        $service->update([
            'service'=>$request['name'],
            'price'=>$request['price'],
            'service_image'=>$request['service_image'],
            'description'=>$request['description']
        ]);
        return redirect('services-dashboard');
    }

    public function deleteService(Service $service)
    {
        $service->deleteOrFail();
        return redirect('dashboard');
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
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
