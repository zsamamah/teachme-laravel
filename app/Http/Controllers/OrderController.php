<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user_phone = Detail::where('user_id',$user->id)->select('phone')->first();
        return view('booking',compact('user','user_phone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        // dd($request,$user, Auth::user());
        $order = Order::create([
            'teacher_id' => $user['id'],
            'date' => $request['date'],
            'start_time' =>$request['start_time'],
            'end_time' => $request['end_time'],
            'students_num' => $request['students_num']
        ]);
        Book::create([
            'order_id' => $order['id'],
            'student_id' => Auth::user()->id
        ]);
        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $user = Auth::user();
        $details = Detail::where('user_id', $user->id)->first();
        $order = Order::where('orders.id',$order->id)->join('users','users.id','orders.teacher_id')->join('details','orders.teacher_id','details.user_id')->select('users.name','orders.*','details.phone')->first();
        $book = Book::where('order_id',$order->id)->first();
        $approved = Book::where('books.student_id',$user->id)->join('orders','orders.id','books.order_id')->join('users','users.id','orders.teacher_id')->where('orders.status','Approved')->get();
        $rejected = Book::where('student_id',$user->id)->join('orders','orders.id','books.order_id')->where('orders.status','Rejected')->get();
        if($book->student_id == $user->id)
            return view('show_order',compact('user','order','details','approved','rejected'));
        else
            return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // dd($order,'delete');
        $book = Book::where('order_id',$order->id)->first();
        if($book->student_id==Auth::user()->id){
            $order->deleteOrFail();
            return redirect(route('student_profile'));
        }
        else
            return redirect(route('index'));
    }

    public function delete(Order $order)
    {
        $order->deleteOrFail();
        return redirect(route('orders'));
    }

    public function approve(Order $order)
    {
        $order->update([
            'status' => 'Approved'
        ]);
        return redirect(route('teacher_profile'));
    }
    
    public function reject(Order $order)
    {
        $order->update([
            'status' => 'Rejected'
        ]);
        return redirect(route('teacher_profile'));
    }
}
