<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use LengthException;

class UserProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $bookings = DB::table('bookings')
        ->join('users', 'users.id', '=', 'bookings.user_id')
        ->join('services', 'services.id', '=', 'bookings.service_id')
        ->select('bookings.*', 'services.service', 'users.name')->where("bookings.user_id","=",$id)->get();
        return view('userprofile',compact('bookings'));
    }
    public function showUsers()
    {
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }
    public function editUser(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }
    public function deleteUser(User $user)
    {
        $user->deleteOrFail();
        return redirect('dashboard');
    }



}
