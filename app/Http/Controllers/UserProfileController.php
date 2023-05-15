<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Detail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    public function student_profile()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        $pending = Book::where('student_id',$user->id)->join('orders','orders.id','books.order_id')->join('users','users.id','orders.teacher_id')->join('details','details.user_id','orders.teacher_id')->where('orders.status','Pending')->get();
        $approved = Book::where('student_id',$user->id)->join('orders','orders.id','books.order_id')->where('orders.status','Approved')->get();
        $rejected = Book::where('student_id',$user->id)->join('orders','orders.id','books.order_id')->where('orders.status','Rejected')->get();
        // dd($details);
        return view('student',compact('user','details','pending','approved','rejected'));
    }

    public function student_approved()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        $approved = Book::where('student_id',$user->id)->join('orders','orders.id','books.order_id')->join('users','users.id','orders.teacher_id')->join('details','details.user_id','orders.teacher_id')->where('orders.status','Approved')->get();
        $rejected = Book::where('student_id',$user->id)->join('orders','orders.id','books.order_id')->where('orders.status','Rejected')->get();
        return view('student.approved',compact('user','details','approved','rejected'));
    }

    public function student_rejected()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        $approved = Book::where('student_id',$user->id)->join('orders','orders.id','books.order_id')->where('orders.status','Approved')->get();
        $rejected = Book::where('student_id',$user->id)->join('orders','orders.id','books.order_id')->join('users','users.id','orders.teacher_id')->join('details','details.user_id','orders.teacher_id')->where('orders.status','Rejected')->get();
        return view('student.rejected',compact('user','details','approved','rejected'));
    }

    public function teacher_profile()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        $pending = Order::where('teacher_id',$user->id)->where('status','Pending')->join('books','books.order_id','orders.id')->join('users','users.id','books.student_id')->join('details','details.user_id','books.student_id')->get();
        $approved = Order::where('teacher_id',$user->id)->where('status','Approved')->get();
        $rejected = Order::where('teacher_id',$user->id)->where('status','Rejected')->get();
        // dd($bookings);
        return view('teacher',compact('user','details','pending','approved','rejected'));
    }

    public function teacher_approved()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        $approved = Order::where('teacher_id',$user->id)->where('status','Approved')->join('books','books.order_id','orders.id')->join('users','users.id','books.student_id')->join('details','details.user_id','books.student_id')->get();
        $rejected = Order::where('teacher_id',$user->id)->where('status','Rejected')->get();
        // dd($bookings);
        return view('teacher.approved',compact('user','details','approved','rejected'));
    }

    public function teacher_rejected()
    {
        $user = Auth::user();
        $details = Detail::where('user_id',$user['id'])->first();
        $approved = Order::where('teacher_id',$user->id)->where('status','Approved')->get();
        $rejected = Order::where('teacher_id',$user->id)->where('status','Rejected')->join('books','books.order_id','orders.id')->join('users','users.id','books.student_id')->join('details','details.user_id','books.student_id')->get();
        // dd($rejected);
        return view('teacher.rejected',compact('user','details','approved','rejected'));
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
            $filename = time().'.pdf';
            Storage::putFileAs('/assets',$request->file,$filename);
            $details->update([
                'major' => $request['major'],
                'city' => $request['city'],
                'university' => $request['university'],
                'gpa' => $request['gpa'],
                'phone' => $request['phone'],
                'price' => $request['price'],
                'facebook' => $request['facebook'],
                'linkedin' => $request['linkedin'],
                'instagram' => $request['instagram'],
                'file'=>$filename
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
        $name = Str::random(10);
        $extension = $request->file('photo')->getClientOriginalExtension();
        Storage::putFileAs('public',$request->file("photo"),$name.".".$extension);
            $details->update([
                'major' => $request['major'],
                'city' => $request['city'],
                'university' => $request['university'],
                'gpa' => $request['gpa'],
                'phone' => $request['phone'],
                'facebook' => $request['facebook'],
                'linkedin' => $request['linkedin'],
                'instagram' => $request['instagram'],
                'photo'=> $name . '.' . $extension
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

    public function show_profile(Request $request, User $user)
    {
        if(Auth::user()->role==$user->role)
            return redirect(route('index'));
        $details = Detail::where('user_id',$user->id)->first();
        $pending = Order::where('teacher_id',$user->id)->where('status','Pending')->count();
        $approved = Order::where('teacher_id',$user->id)->where('status','Approved')->count();
        return view('show_profile',compact('user','details','pending','approved'));
    }
}
