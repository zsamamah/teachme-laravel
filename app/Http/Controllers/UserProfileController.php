<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function student_profile()
    {
        $user = Auth::user();
        return view('student',compact('user'));
    }

    public function teacher_profile()
    {
        $user = Auth::user();
        return view('teacher',compact('user'));
    }
}
