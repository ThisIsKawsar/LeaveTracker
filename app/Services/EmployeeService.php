<?php


namespace App\Services;

use App\Models\User;
use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeService
{

    public function validateData($request)
    {
        $request->validate([
            'name'              => ['required', 'string', 'max:255'],
            'username'          => ['required', 'string',  'max:255', 'unique:users'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8'],
            'date_of_birth'     => ['required'],
            'number'            => ['required', 'numeric', 'digits_between:1,11'],
        ]);
    }
    public function updateOrCreateData($request)
    {


        Employee::updateOrCreate(
            [
                'id'                       => $request->employee_id,
            ],[

            'name'                         => $request->name,
            'dob'                          => $request->date_of_birth,
            'email'                        => $request->email,
            'phone_number'                 => $request->number,
          ]);

          User::updateOrCreate(
            [
                'id'                        => $request->user_id,
            ],[

            'employee_id'                   => $request->employee_id,
            'name'                          => $request->name,
            'username'                      => $request->username,
            'email'                         => $request->email,
            'password'                      => $request->password,
          ]);




    }




}
