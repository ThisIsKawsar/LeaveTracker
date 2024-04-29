<?php


namespace App\Services;

use App\Models\User;
use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCredential;

class EmployeeService
{

    public function validateData($request)
    {
        $request->validate([
            'name'              => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8'],
            'number'            => ['numeric', 'digits_between:1,11'],
        ]);
    }
    public function updateOrCreateData($request)
    {

          $user= User::updateOrCreate(
            [
                'id'                        => $request->user_id,
            ],[

            'name'                          => $request->name,
            'email'                         => $request->email,
            'password'                      => Hash::make($request->password),
            'dob'                           => $request->date_of_birth,
            'phone_number'                  => $request->number,
            'status'                        => $request->status,
          ]);

       
            UserCredential::updateOrCreate([
                'id'                  => $request->userc_id,
            ],[
                    'user_id'         => $user->id,
                    'secrete'         => $request->password,
            ]);


    }




}
