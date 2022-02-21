<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('userprofile');
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
