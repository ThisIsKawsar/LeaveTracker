@extends('admin.dashboard-admin')

@section('dashboard-admin-content')
    <div class="page-header" style="display: flex; align-items: center; justify-content: space-between">
        <h4 class="page-title"><i class="fa fa-list"></i> @yield('title')</h4>
        <div class="btn-group">

            <a class="btn btn-xs btn-primary" href="{{ route('employee-manege.index') }}">
                <i class="fa fa-list"></i>
                List
            </a>

        </div>
    </div>
    @include('_alert_message')




    <div class="card">
        <div class="card-body">
            <h3 class="panel-title" style="text-align:center;">Employee</h3>
            <br>

            <form class="form-horizontal" action="{{ route('employee-manege.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" class="form-control" value="">
                <input type="hidden" name="employee_id" class="form-control" value="">
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-8">

                        <input type="text" name="name" class="form-control" placeholder="Name"required>

                    </div>
                </div>
          
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">DOB</label>
                    <div class="col-sm-8">

                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">

                        <input type="email" class="form-control" name="email"placeholder="email@email.com" required>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-8">

                        <input type="number" class="form-control" id="number" name="number"placeholder="Phone Number"
                            required>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-8">

                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>

                    </div>
                    <div class="checkbox col-md-2" style="margin-top:0.6%;">
                        <label>
                            <input type="checkbox" style="width: 0.9rem; height: 0.9rem;" class="form-check-input"
                                id="check1" runat="server"> Show Password
                        </label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="type_of_leave" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" name = "status" id="status" aria-label="Default select example"
                            required>

                            <option value="1">Active</option>
                            <option value="0">Inactive</option>



                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
                    <div class="col-sm-8">
                        <input class="btn btn-primary col-md-2 col-sm-12" value="Submit" id="button" type="submit">
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
<script>
    window.onload = function() {
        $(".nav-item:eq(2)").addClass("active");

        document.getElementById("check1").onclick = function() {

            if (document.getElementById("check1").checked == true) {

                document.getElementById("password").type = "text";

            } else {

                document.getElementById("password").type = "password";
            }

        }


    }
</script>
