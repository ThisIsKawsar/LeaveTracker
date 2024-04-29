@extends('admin.dashboard-admin')

@section('title', 'Leave Request List')
@section('dashboard-admin-content')
    <div class="page-header" style="display: flex; align-items: center; justify-content: space-between">
        <h4 class="page-title"><i class="fa fa-list"></i> @yield('title')</h4>
        <div class="btn-group">



        </div>
    </div>

    @include('._alert_message')

    <div class="row">
        <div class="col-sm-12">
            <form id="searchForm" method="GET">
                <div class="row mb-1">

                    <div class="col-md-4">
                        <div class="input-group width-100" style="border: 2px solid #efefef;">
                            <span style="color: black; font-weight: 500">Status</span>
                            <select name="status" class="form-control" style="width: 100%">
                                <option>Select Status</option>
                                <option value="Pending" {{ request()->query('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Approve" {{ request()->query('status') === 'Approve' ? 'selected' : '' }}>Approve</option>
                                <option value="Rejected" {{ request()->query('status') === 'Rejected' ? 'selected' : '' }}>Reject</option>
                            </select>


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
            <table class="table table-bordered table-hover">
                <thead style="border-bottom: 3px solid #346cb0 !important">
                    <tr style="background: #e1ecff !important; color:black !important">
                        <th class="text-center">SL</th>
                        <th>Employee Name</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th class="text-center">Type Of Leave</th>
                        <th class="text-center">Total Days</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($leaveData as $value)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ @$value->user->name }}</td>
                            <td>{{ @$value->from_date }}</td>
                            <td>{{ @$value->to_date }}</td>
                            <td>{{ @$value->type_of_leave }}</td>
                            <td class="text-center">
                                @php
                                    $fromDate = new DateTime($value->from_date);
                                    $toDate = new DateTime($value->to_date);
                                    $difference = $fromDate->diff($toDate)->days;
                                @endphp
                                {{ $difference }} days
                            </td>
                            <td class="text-center">
                                @if (@$value->approval_status == 'Pending')
                                    <span class="badge" style="background-color: yellow; color: black;">Pending</span>
                                @elseif (@$value->approval_status == 'Approve')
                                    <span class="badge"
                                        style="background-color: rgb(24, 92, 30); color: black;">Approve</span>
                                @elseif (@$value->approval_status == 'Rejected')
                                    <span class="badge"
                                        style="background-color: rgb(245, 44, 18); color: black;">Rejected</span>
                                @endif
                            </td>




                            <td class="text-center action">
                                <div class="btn-group btn-corner">




                                    <a href="{{ route('leave-requests.edit', $value->id) }}"title="Change Status"
                                        class="btn btn-primary btn-xs"><i class="fa fa-check"></i></a>



                                    <a href="#"
                                        onclick="delete_item('{{ route('leave-requests.destroy', $value->id) }}')"
                                        class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>


                                </div>
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

            <!-- delete form -->
            <form action="" id="deleteItemForm" method="POST">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
@endsection
<script>
function delete_item(url) {
        Swal.fire({
            title: 'Are you sure ?',
            html: "<div style='margin: 10px 0'><b>You will delete this record permanently !</b></div>",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            width: 400,
        }).then((result) => {
            if (result.value) {
                // $('deleteItemForm').attr({'action': url});
                $('#deleteItemForm').attr('action', url).submit();
            }
        })

    }
</script>