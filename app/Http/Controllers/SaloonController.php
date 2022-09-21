<?php

namespace App\Http\Controllers;

use App\Models\Saloon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaloonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provider = Auth::user();
        $saloons = Saloon::where('owner_id',$provider['id'])->get();
        return view('provider.index',compact('provider','saloons'));
    }

    public function my_saloons()
    {
        $saloons = Saloon::where('owner_id',Auth::user()->id)->get();
        return view('provider.saloons.index',compact('saloons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.saloons.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Saloon::create([
            'name'=>$request['name'],
            'owner_id'=>Auth::user()->id,
            'phone'=>$request['phone'],
            'location'=>$request['location'],
            'profile_image'=>$request['profile_image']
        ]);
        return redirect('/my-saloons');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function show(Saloon $saloon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function edit(Saloon $saloon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saloon $saloon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saloon $saloon)
    {
        //
    }
}
