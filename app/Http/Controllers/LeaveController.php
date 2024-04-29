<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use App\Services\LeaveService;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{



    protected $service;



    public function __construct()
    {
        $this->service = new LeaveService();
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        {

            $data['leaveData']      = Leave::query()
                                            ->where('user_id', auth()->id())
                                            ->when(request('status'), function ($q, $status) {
                                                $q->where('approval_status', $status);
                                            })
                                            ->latest()
                                            ->get();
            return view('employee.leave.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('employee.leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {

        try {


            DB::transaction(function () use ($request) {
                $this->service->validateData($request);
                $this->service->updateOrCreateData($request);
            });


            return redirect()->route('leaves.index')->with('message', 'Leave Created Successfully!');
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit($id)
    {
        $data['leave']=Leave::find($id);
        return view('employee.leave.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(Request $request, $id)
    {
        try {


            DB::transaction(function () use ($request) {

                $this->service->updateOrCreateData($request);
            });


            return redirect()->route('leaves.index')->with('message', 'Leave Updated Successfully!');
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy($id)
    {
        try {


            DB::transaction(function () use ($id) {

                $leave=Leave::find($id);
                $leave->delete();
            });


            return redirect()->route('leaves.index')->with('message', 'Leave Deleted Successfully!');
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    /**
     * Admin
     *
     *
     */
    public function adminIndex()
    {
        {

            $data['leaveData']      = Leave::query()
                                            ->when(request('status'), function ($q, $status) {
                                                $q->where('approval_status', $status);
                                            })
                                            ->latest()
                                            ->get();
            return view('admin.leave-request.index', $data);
        }
    }
    public function adminChangeStatus($id)
    {


            $data['leave']      = Leave::find($id);
            return view('admin.leave-request.status', $data);

    }

}
