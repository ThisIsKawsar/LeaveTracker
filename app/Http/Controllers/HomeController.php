<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use App\Models\Leave; 

use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user() && Auth::user()->is_admin == 1) {
           
            $data['user_count'] = User::count();
            $data['leave']      = Leave::count();
            $data['pending']    = Leave::where('approval_status','Pending')->count();
            $data['approve']    = Leave::where('approval_status','Approve')->count();
            $data['reject']     = Leave::where('approval_status','Rejected')->count();
            return view('admin.home',$data);
        }
        return redirect('/employee');
    }
}
