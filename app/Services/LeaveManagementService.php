<?php


namespace App\Services;

use App\Models\Leave;

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



}





