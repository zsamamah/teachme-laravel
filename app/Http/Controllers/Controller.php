<?php

namespace App\Http\Controllers;

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

    public function fetch_data(Request $request)
    {
        $data='none';
        if($request['major']){
            $data = User::where('role','teacher')->join('details','users.id','details.user_id')->get();
            // dd($data);
        }
        return response($data);
    }
}
