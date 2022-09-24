<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id',$user->id)->leftJoin('saloons','saloons.id','saloon_id')->select('orders.*','saloons.name as s_name','saloons.phone as s_phone')->get();
        return view('profile',compact('user','orders'));
    }
}
