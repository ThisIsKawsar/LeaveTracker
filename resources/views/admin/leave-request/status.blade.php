@extends('admin.dashboard-admin')

@section('title', 'Change Status')
@section('dashboard-admin-content')
    <div class="page-header" style="display: flex; align-items: center; justify-content: space-between">
        <h4 class="page-title"><i class="fa fa-list"></i> @yield('title')</h4>
        <div class="btn-group">

            <a class="btn btn-xs btn-primary" href="{{ route('leave-requests.index') }}">
                <i class="fa fa-arrow"></i>
                Back
            </a>

        </div>
    </div>

    @include('._alert_message')

    <div class="row">
        <div class="col-sm-12">

            <table class="table table-bordered table-hover">
                <thead style="border-bottom: 3px solid #346cb0 !important">
                    <tr style="background: #e1ecff !important; color:black !important">

                        <th>Employee Name</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th class="text-center">Type Of Leave</th>
                        <th class="text-center">Total Days</th>
                        <th class="text-center">Status</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>

                        <td>{{ @$leave->user->name }}</td>
                        <td>{{ @$leave->from_date }}</td>
                        <td>{{ @$leave->to_date }}</td>
                        <td>{{ @$leave->type_of_leave }}</td>
                        <td class="text-center">
                            @php
                                $fromDate = new DateTime($leave->from_date);
                                $toDate = new DateTime($leave->to_date);
                                $difference = $fromDate->diff($toDate)->days;
                            @endphp
                            {{ $difference }} days
                        </td>
                        <td class="text-center">
                            @if (@$leave->approval_status == 'Pending')
                                <span class="badge" style="background-color: yellow; color: black;">Pending</span>
                            @elseif (@$leave->approval_status == 'Approve')
                                <span class="badge" style="background-color: rgb(24, 92, 30); color: black;">Approve</span>
                            @elseif (@$leave->approval_status == 'Rejected')
                                <span class="badge"
                                    style="background-color: rgb(245, 44, 18); color: black;">Rejected</span>
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="card">
                <div class="card-body">
                    <h3 class="panel-title" style="text-align:center;">Changing Status for leave</h3>
                    <br>

                    <form class="form-horizontal" action="{{ route('leave-requests.update', $leave->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="leave_id" class="form-control" value="{{ $leave->id }}">
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Staus</label>
                            <div class="col-sm-8">
                                <select class="form-control" name = "status" id="status" aria-label="Default select "
                                    required>
                                    <option value="Approve">Approve</option>
                                    <option value="Rejected">Reject</option>


                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-sm-2 col-form-label">Comments</label>
                            <div class="col-sm-8">

                                <textarea class="form-control" name="comments" id="comments" placeholder="Enter the Comments" required></textarea>

                            </div>
                        </div>



                        <div class="form-group row">
                            <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
                            <div class="col-sm-8">
                                <input class="btn btn-primary col-md-2 col-sm-12" value="Submit" id="button"
                                    type="submit">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
