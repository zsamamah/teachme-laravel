<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Saloon;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all('id');
        $saloons = Saloon::all('id');
        $orders = Order::all('id');
        $contacts = Contact::all('id');
        return view('admin.index',compact('users','saloons','orders','contacts'));
    }
    
    public function users()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function delete_user(User $user)
    {
        if($user->role!='admin'){
            $user->deleteOrFail();
            return redirect('/users');
        }
        return redirect('/users');
    }

    public function all_saloons()
    {
        $saloons = Saloon::join('users','users.id','saloons.owner_id')->select('saloons.*','users.name as o_name')->get();
        // dd($saloons);
        return view('admin.saloons.index',compact('saloons'));
    }

    public function orders()
    {
        $orders= Order::join('users','users.id','orders.user_id')->join('saloons','saloons.id','orders.saloon_id')->select('orders.*','users.name as name','saloons.name as s_name')->get();
        // dd($orders);
        return view('admin.orders.index',compact('orders'));
    }
}
