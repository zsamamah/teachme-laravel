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
}
