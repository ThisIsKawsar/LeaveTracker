@extends('employee.dashboard-employee')
@section('title', 'Edit Leave')
@section('dashboard-employee-content')
    <div class="page-header" style="display: flex; align-items: center; justify-content: space-between">
        <h4 class="page-title"><i class="fa fa-pencil"></i> @yield('title')</h4>
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

            <form class="form-horizontal" action="{{ route('leaves.update', $leave->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" name="leave_id" value="{{ @$leave->id }} ">

                <div class="form-group row">
                    <label for="type_of_leave" class="col-sm-2 col-form-label">Type of Leave</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="type_of_leave" id="type_of_leave"
                            aria-label="Default select example" required>
                            <option disabled>Select a leave type</option>
                            <option value="Sick leave" {{ $leave->type_of_leave === 'Sick leave' ? 'selected' : '' }}>Sick
                                leave</option>
                            <option value="Casual leave" {{ $leave->type_of_leave === 'Casual leave' ? 'selected' : '' }}>
                                Casual leave</option>
                            <option value="Emergency Leave"
                                {{ $leave->type_of_leave === 'Emergency Leave' ? 'selected' : '' }}>Emergency Leave</option>
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-8">

                        <textarea class="form-control" name="description" id="description" placeholder="Enter the description" required>{{ $leave->description }}</textarea>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_of_leave" class="col-sm-2 col-form-label">Date of Leave(From)</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="from_date"
                            name="from_date"value="{{ $leave->from_date }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date_of_leave" class="col-sm-2 col-form-label">Date of Leave(To)</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="to_date"
                            name="to_date"value="{{ $leave->to_date }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
                    <div class="col-sm-8">
                        <input class="btn btn-primary col-md-2 col-sm-12" value="Update" id="button" type="submit">
                    </div>
                </div>

            </form>

        </div>
    </div>

    <br>
@endsection
