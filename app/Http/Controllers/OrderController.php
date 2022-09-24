<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Detail;
use App\Models\Material;
use App\Models\Order;
use App\Models\Saloon;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
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
        $orders= Order::where('saloon_owner',Auth::user()->id)->where('status','pending')->join('users','users.id','orders.user_id')->join('saloons','saloons.id','orders.saloon_id')->select('orders.*','users.name as name','saloons.name as s_name')->get();
        return view('provider.orders.index',compact('orders'));
    }

    public function done_orders()
    {
        $orders= Order::where('saloon_owner',Auth::user()->id)->where('status','done')->join('users','users.id','orders.user_id')->join('saloons','saloons.id','orders.saloon_id')->select('orders.*','users.name as name','saloons.name as s_name')->get();
        return view('provider.orders.index',compact('orders'));
    }

    public function invoice(Order $order)
    {
        $user = User::where('id',$order->user_id)->first();
        $order = Order::where('id',$order->id)->first();
        $saloon = Saloon::where('id',$order->saloon_id)->first();
        $details = Detail::where('details.order_id',$order->id)->leftJoin('services','details.material_id','services.material_id')->leftJoin('materials','materials.id','details.material_id')->leftJoin('chapters','chapters.id','details.chapter_id')->select('details.*','services.price','materials.m_name as m_name','chapters.c_name as c_name')->get();
        $services = Service::where('saloon_id',$saloon->id)->get();
        $total=floatval(0);
        foreach ($details as $detail) {
            $total = floatval(floatval($total)+floatval($detail->price));
        }
        return view('layouts.invoice',compact('user','order','saloon','details','services','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Saloon $saloon)
    {
        $mats = Service::where('saloon_id',$saloon->id)->join('materials','services.material_id','=','materials.id')->get();
        $chapters = Chapter::all();
        $now = Carbon::now()->toDateTimeString();
        return view('order',compact('saloon','mats','chapters','now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Saloon $saloon)
    {
        $owner = User::where('id',$saloon->owner_id)->first();
        $order = Order::create([
            'user_id'=>Auth::user()->id,
            'saloon_id'=>$saloon->id,
            'saloon_owner'=>$owner->id,
            'u_phone'=>$request['u_phone'],
            's_provider'=>$request['s_provider'],
            'date'=>$request['date'],
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
