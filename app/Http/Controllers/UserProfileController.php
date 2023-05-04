<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function student_profile()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        return view('student',compact('user','details'));
    }

    public function teacher_profile()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        return view('teacher',compact('user','details'));
    }
    
    public function edit_teacher()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        $cities = ["Irbid", "Ajloun", "Jerash", "Mafraq", "Zarqa", "Amman", "Salt", "Madaba", "Karak", "Tafila", "Maan", "Aqaba"];
        $majors = ["Math", "English", "Arabic", "Physics", "Biology", "Chemistry", "Computer", "History", "Geology"];
        return view('edit_profile',compact('user','details','cities','majors'));
    }

    public function change_teacher_data(Request $request, Detail $details)
    {
        if($details->user_id == Auth::user()->id){
            $details->update([
                'major' => $request['major'],
                'city' => $request['city'],
                'university' => $request['university'],
                'gpa' => $request['gpa'],
                'phone' => $request['phone']
            ]);
            return redirect(route('teacher_profile'));
        }
        else{
            return redirect(route('index'));
        }
    }

    public function edit_student()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        $cities = ["Irbid", "Ajloun", "Jerash", "Mafraq", "Zarqa", "Amman", "Salt", "Madaba", "Karak", "Tafila", "Maan", "Aqaba"];
        return view('edit_profile',compact('user','details','cities'));
    }

    public function change_student_data(Request $request, Detail $details)
    {
        if($details->user_id == Auth::user()->id){
            $details->update([
                'major' => $request['major'],
                'city' => $request['city'],
                'university' => $request['university'],
                'gpa' => $request['gpa'],
                'phone' => $request['phone']
            ]);
            return redirect(route('student_profile'));
        }
        else{
            return redirect(route('index'));
        }
    }

    public function change_password()
    {
        $user_id = Auth::user()->id;
        return view('change_password',compact('user_id'));
    }

    public function validate_new_password(Request $request, User $user)
    {
        if(Auth::user()->id == $user->id){
            if(Hash::check($request['password'], $user->password)){
                if($request['c_password'] == $request['n_password']){
                    $user->update([
                        'password' => Hash::make($request['n_password'])
                    ]);
                }
                else{
                    return redirect(route('change_password'));
                }
            }
            else{
                return redirect(route('change_password'));
            }
        }
        return redirect(route('index'));
    }
}
