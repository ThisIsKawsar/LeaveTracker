@extends('employee.dashboard-employee')
@section('title', 'Create Leave')
@section('dashboard-employee-content')
    <div class="page-header" style="display: flex; align-items: center; justify-content: space-between">
        <h4 class="page-title"><i class="fa fa-plus"></i> @yield('title')</h4>
        <div class="btn-group">

            <a class="btn btn-xs btn-primary" href="{{ route('leaves.index') }}">
                <i class="fa fa-list"></i>
                List
            </a>

        </div>
    </div>
    @include('_alert_message')

    <div class="card">
        <div class="card-body">
            <h3 class="panel-title" style="text-align:center;">Requesting for leave</h3>
            <br>

            <form class="form-horizontal" action="{{ route('leaves.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group row">
                    <label for="type_of_leave" class="col-sm-2 col-form-label">Type of Leave</label>
                    <div class="col-sm-8">
                        <select class="form-control" name = "type_of_leave" id="type_of_leave"
                            aria-label="Default select example" required>
                            <option selected disabled>Select a leave type</option>
                            <option value="Sick leave">Sick leave</option>
                            <option value="Casual leave">Casual leave</option>
                            <option value="Emergency Leave">Emergency Leave</option>


                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-8">

                        <textarea class="form-control" name="description" id="description" placeholder="Enter the description" required></textarea>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_of_leave" class="col-sm-2 col-form-label">Date of Leave(From)</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="from_date" name="from_date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date_of_leave" class="col-sm-2 col-form-label">Date of Leave(To)</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="to_date" name="to_date" required>
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

    <br>
@endsection
