<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Saloon;
use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        if($order->paid=='yes' || $order->user_id!=Auth::user()->id)
            return redirect('/');
        return view('visa',compact('order'));
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
    public function store(Request $request,Order $order)
    {
        if($order->user_id!=Auth::user()->id)
            return redirect('/');
        Visa::create([
            'c_name'=>$request['c_name'],
            'c_num'=>$request['c_num'],
            'exp'=>$request['exp'],
            'cvv'=>$request['cvv'],
            'order_id'=>$order->id,
            'user_id'=>Auth::user()->id
        ]);
        $order->update([
            'paid'=>'yes'
        ]);
        return redirect('/done-booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function show(Visa $visa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function edit(Visa $visa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visa $visa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visa $visa)
    {
        //
    }
}
