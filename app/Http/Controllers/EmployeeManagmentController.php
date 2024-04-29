<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Services\EmployeeService;
class EmployeeManagmentController extends Controller
{



    protected $service;



    public function __construct()
    {
        $this->service = new EmployeeService();
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {


            $data['users']      = User::query()->where('is_admin',"0")
                                            ->when(request('name'), function ($q, $name) {
                                                $q->where('name', $name);
                                            })
                                            ->when(request('email'), function ($q, $email) {
                                                $q->where('email', $email);
                                            })


                                            ->latest()
                                            ->get();
            return view('admin.employee.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.employee.create');
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


            return redirect()->route('employee-manege.index')->with('message', 'Employee Created Successfully!');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit($id)
    {
        $data['user']=User::find($id);
        return view('admin.employee.edit',$data);
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


            return redirect()->route('employee-manege.index')->with('message', 'Employee Updated Successfully!');
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

                $user=User::find($id);
                $user->credential()->delete();
                $user->delete();
            });


            return redirect()->route('employee-manege.index')->with('message', 'Employee Deleted Successfully!');
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

    }
     public function employee(){


            return view('employee.home');
        }
}
