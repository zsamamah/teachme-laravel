<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function search(Request $request)
    {
        return view('search');
    }

    public function search_name(Request $request)
    {
        return view('search_name');
    }

    public function fetch_data(Request $request)
    {
        $data='none';
        if($request['name']){
            $data = User::where('role','teacher')->join('details','users.id','details.user_id')->where('users.name', 'like', '%'.$request['name'].'%')->get();
        }
        if($request['major'] && $request['city'] && $request['category']=='Category'){
            $data = User::where('role','teacher')->join('details','users.id','details.user_id')->where('major',$request['major'])->where('city',$request['city'])->get();
        }
        else if($request['major'] && $request['city'] && $request['category']=='1'){
            $data = User::where('users.role','teacher')->join('details','users.id','details.user_id')->where('details.major',$request['major'])->where('details.city',$request['city'])->get();
            $reviews = Review::join('orders','orders.id','reviews.order_id')->join('users','users.id','orders.teacher_id')->select('reviews.range','orders.teacher_id','users.name')->get();
            foreach ($data as &$dataObject) {
                $teacherId = $dataObject['id'];
                $dataObject['reviews'] = 0;
                $dataObject['sum'] = 0;
            }
            foreach ($data as &$dataObject) {
                $teacherId = $dataObject['id'];
                foreach ($reviews as $review) {
                    if ($review['teacher_id'] === $teacherId) {
                        $dataObject['reviews']+=1;
                        $dataObject['sum']+=$review['range'];
                    }
                }
            }
            foreach ($data as &$dataObject) {
                $teacherId = $dataObject['id'];
                if($dataObject['reviews']>=1)
                    $dataObject['sum']/=$dataObject['reviews'];
            }
            $data = json_decode($data, true);
            usort($data, function($a, $b) {
                return $b['sum'] - $a['sum'];
            });
        }
        else if($request['major'] && $request['city'] && $request['category']=='2'){
            $data = User::where('users.role','teacher')->join('details','users.id','details.user_id')->where('details.major',$request['major'])->where('details.city',$request['city'])->get();
            $reviews = Review::join('orders','orders.id','reviews.order_id')->join('users','users.id','orders.teacher_id')->select('reviews.range','orders.teacher_id','users.name')->get();
            foreach ($data as &$dataObject) {
                $teacherId = $dataObject['id'];
                $dataObject['reviews'] = 0;
                $dataObject['sum'] = 0;
            }
            foreach ($data as &$dataObject) {
                $teacherId = $dataObject['id'];
                foreach ($reviews as $review) {
                    if ($review['teacher_id'] === $teacherId) {
                        $dataObject['reviews']+=1;
                        $dataObject['sum']+=$review['range'];
                    }
                }
            }
            foreach ($data as &$dataObject) {
                $teacherId = $dataObject['id'];
                if($dataObject['reviews']>=1)
                    $dataObject['sum']/=$dataObject['reviews'];
            }
            $data = json_decode($data, true);
            usort($data, function($a, $b) {
                return $a['price'] - $b['price'];
            });
        }
        else if($request['major'] && $request['city'] && $request['category']=='4'){
            $data = User::where('users.role','teacher')->join('details','users.id','details.user_id')->where('details.major',$request['major'])->where('details.city',$request['city'])->get();
            $reviews = Review::join('orders','orders.id','reviews.order_id')->join('users','users.id','orders.teacher_id')->select('reviews.range','orders.teacher_id','users.name')->get();
            foreach ($data as &$dataObject) {
                $teacherId = $dataObject['id'];
                $dataObject['reviews'] = 0;
                $dataObject['sum'] = 0;
            }
            foreach ($data as &$dataObject) {
                $teacherId = $dataObject['id'];
                foreach ($reviews as $review) {
                    if ($review['teacher_id'] === $teacherId) {
                        $dataObject['reviews']+=1;
                        $dataObject['sum']+=$review['range'];
                    }
                }
            }
            foreach ($data as &$dataObject) {
                $teacherId = $dataObject['id'];
                if($dataObject['reviews']>=1)
                    $dataObject['sum']/=$dataObject['reviews'];
            }
            $data = json_decode($data, true);
            usort($data, function($a, $b) {
                return $b['price'] - $a['price'];
            });
        }
        return response($data);
    }
}
