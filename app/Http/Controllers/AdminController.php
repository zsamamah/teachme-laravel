<?php

namespace App\Http\Controllers;

use App\Models\Book;
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

    public function details(Order $order)
    {
        $order = Order::where('orders.id',$order->id)->join('users','users.id','orders.teacher_id')->join('details','details.user_id','orders.teacher_id')->select('orders.*','users.name','details.phone','details.city')->first();
        $booking = Book::where('books.order_id',$order->id)->join('users','books.student_id','users.id')->join('details','details.user_id','books.student_id')->select('users.name','details.phone','details.university','details.major')->first();
        return view('admin.orders.edit',compact('order','booking'));
    }
}
