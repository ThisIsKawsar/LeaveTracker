<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use Auth;
class EmployeeController extends Controller
{
   
    // public function home(){
    //     $users = User::where('is_admin',"0") ->get();
 
    //     return view('admin.index',compact('users'));
    // }
 
 
 
    // public function save(Request $request){
    //     $this->validate($request, [
    //         'name' => 'required|unique:users',
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);
     
    //     $user = (new User)->storeUser($request->all());
 
    //     return redirect('/index');
    // }
    // public function update(Request $request, $id){
    //     $user = User::find($id);
    //     $input = $request->all();
    //     $user->fill($input)->save();
 
    //     return redirect('/index');
    // }
 
    // public function delete($id)
    // {
    //     $users = User::find($id);
    //     $users->delete();
  
    //     return redirect('/index');
    // }
    // public function employee(){
        
    //     $users =Auth::user()->name;
    //     return view('employee.home',compact('users'));
    // }
}
