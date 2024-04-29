<?php


namespace App\Services;

use App\Models\Leave;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class LeaveService
{
    public function validateData($request)
    {
        $request->validate([
            'type_of_leave'     => ['required'],
            'from_date'         => ['required'],
            'to_date'           => ['required'],
            'description'       => ['required'],

        ]);
    }
    public function updateOrCreateData($request)
    {

        $leave  =  Leave::updateOrCreate(
            [
                'id'                              => $request->leave_id,
            ],[

            'user_id'                             => $request->user_id,
            'type_of_leave'                       => $request->type_of_leave,
            'from_date'                           => $request->from_date,
            'to_date'                             => $request->to_date,
            'description'                         => $request->description,
            'approval_status'                     => 'Pending',


        ]);

        $email            = $leave->user->email;
        $data['name']     = $leave->user->name;
        // $data['comments'] = $request->comments;
         $data['status']   = $request->status;



       Mail::to($email)->send(new SendMail($data));
    }




}
