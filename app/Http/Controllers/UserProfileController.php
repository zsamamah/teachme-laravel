<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user = Auth::user();
        return view('userprofile',compact('bookings','user'));
    }
    public function edit(Request $request,User $user)
    {
        // dd($request);
        if($request['name']!=null)
            $user->update(['name'=>$request['name']]);
        if($request['email']!=null)
            $user->update(['email'=>$request['email']]);
        if($request['phone']!=null)
            $user->update(['phone'=>$request['phone']]);
        if($request['password']!=null && $request['password']==$request['c_password'])
            $user->update(['password'=>Hash::make($request['password'])]);
        return redirect(route('profile'));

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
