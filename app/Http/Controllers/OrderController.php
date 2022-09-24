<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Detail;
use App\Models\Material;
use App\Models\Order;
use App\Models\Saloon;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Saloon $saloon)
    {
        $mats = Service::where('saloon_id',$saloon->id)->join('materials','materials.id','=','services.id')->get();
        $chapters = Chapter::all();
        return view('order',compact('saloon','mats','chapters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Saloon $saloon)
    {
        $order = Order::create([
            'user_id'=>Auth::user()->id,
            'saloon_id'=>$saloon->id,
            'u_phone'=>$request['u_phone'],
            's_provider'=>$request['s_provider'],
            'notes'=>$request['notes'],
            'paid'=>'no',
            'payment'=>$request['payment'],
            'status'=>'pending'
        ]);

        $mats = Material::all('id');
        for ($i=1; $i <= count($mats); $i++) { 
            if($request['material'.$i]){
                $chs = Chapter::where('m_id',$i)->get();
                foreach ($chs as $chp) {
                    if($request['chapter'.$chp->id] && $chp->m_id==$i){
                        Detail::create([
                            'order_id'=> $order['id'],
                            'material_id'=>$i,
                            'chapter_id'=>$chp->id
                        ]);
                    }
                }
            }
        }

        if($request['payment']=='visa' && $order)
            return redirect('/visa'.'/'.$order->id);
        else
            return redirect('/done-booking');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function done()
    {
        return view('confirm.order');
    }
}
