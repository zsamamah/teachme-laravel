<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Saloon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function add_user()
    {
        return view('admin.user.add');
    }

    public function save_user(Request $request)
    {
        if($request['password']==$request['rpassword'] && $request['name'] && $request['email'] && $request['role']){
            User::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'role'=>$request['role'],
                'password'=>Hash::make($request['password'])
            ]);
            return redirect('/users');
        }
        else
            return redirect('/add-user');
    }

    public function delete_user(User $user)
    {
        if($user->role!='admin'){
            $user->deleteOrFail();
            return redirect('/users');
        }
        return redirect('/a_dashboard');
    }
}
