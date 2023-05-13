<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all('id');
        $contacts = Contact::all('id');
        $orders = Order::all('id');
        return view('admin.index',compact('users','contacts','orders'));
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

    public function contacts()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index',compact('contacts'));
    }

    public function delete_contact(Contact $contact)
    {
        $contact->deleteOrFail();
        return redirect('/contacts');
    }

    public function orders()
    {
        $orders = Order::join('users','orders.teacher_id','users.id')->join('details','orders.teacher_id','details.user_id')->select('orders.*','users.name','details.city')->get();
        return view('admin.orders.index',compact('orders'));
    }
}
