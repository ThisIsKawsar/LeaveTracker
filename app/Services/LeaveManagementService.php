<?php


namespace App\Services;

use App\Mail\SendMail;
use App\Models\Leave;
use Illuminate\Support\Facades\Mail;

class LeaveManagementService
{

    public function validateData($request)
    {
        $request->validate([
            'status'           => ['required'],
            'comments'         => ['required'],


        ]);
    }
    public function updateOrCreateData($request)
    {

        Leave::updateOrCreate(
            [
                'id'                              => $request->leave_id,
            ],[

            'approval_status'                     => $request->status,
            'comments'                            => $request->comments,
           ]);



    }
    public function SendMailData($request)
    {
      $leave            =  Leave::find($request->leave_id);
      $email            = $leave->user->email;
      $data['name']     = $leave->user->name;
      $data['comments'] = $request->comments;
      $data['status']   = $request->status;


     Mail::to($email)->send(new SendMail($data));

    }


}





