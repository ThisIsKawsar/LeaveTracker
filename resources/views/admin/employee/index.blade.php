@extends('admin.dashboard-admin')

@section('dashboard-admin-content')
    <div class="page-header" style="display: flex; align-items: center; justify-content: space-between">
        <h4 class="page-title"><i class="fa fa-list"></i> @yield('title')</h4>
        <div class="btn-group">

            <a class="btn btn-xs btn-primary" href="{{ route('employee-manege.create') }}">
                <i class="far fa-plus"></i>
                Add
            </a>

        </div>
    </div>
    @include('_alert_message')





    <div class="card">
        <div class="card-body">
        <form id="searchForm" method="GET">
                <div class="row mb-1">

                    <div class="col-md-4">
                        <div class="input-group width-100" style="border: 2px solid #efefef;">
                            <span style="color: black; font-weight: 500">Name</span>
                            <input type="text" name="name" class="form-control" placeholder="Name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group width-100" style="border: 2px solid #efefef;">
                            <span style="color: black; font-weight: 500">Email</span>
                            <input type="text" name="email" class="form-control" placeholder="Email" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn-group"style="margin-top: 30px;">
                            <button class="btn btn-sm btn-primary">
                                <i class="fa fa-search"></i> SEARCH
                            </button>
                            <a href="{{ request()->url() }}" class="btn btn-sm btn-danger"
                                style="color: #000000 !important">
                                <i class="fa fa-refresh"></i> REFRESH
                            </a>
                        </div>

                    </div>
                </div>


            </form>
            <table class="table table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key => $data)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ @$data->id }}</td>
                            <td>{{ @$data->name }}</td>
                            <td>{{ @$data->email }}</td>
                            <td>{{ @$data->dob }}</td>
                            <td>{{ @$data->phone_number }}</td>
                            <td style="text-align: center; font-size: 16px">
                                @if ($data->status == 1)
                                    <i class="fa fa-toggle-on text-success" status="Active"></i>
                                @else
                                    <i class="fa fa-toggle-off text-danger" status="Inactive"></i>
                                @endif
                            </td>
                            <td><a class="btn btn-primary" href="{{ route('employee-manege.edit', $data->id) }}">Edit</a>
                                <!-- <a class="btn btn-danger "
                                    href="{{ route('employee-manege.destroy', $data->id) }}">Delete</a> -->
                                    <a class="btn btn-danger" href="{{ route('employee-manege.destroy', $data->id) }}">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" class="text-center">
                                <b class="text-danger">No data found!</b>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

    <script></script>
@endsection
