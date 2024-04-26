@extends('admin.dashboard-admin')

@section('dashboard-admin-content')
    @include('_alert_message')


    <div class="row">


        <div class="col-xs-12 col-md-4 col-lg-3 ">

            <div class="item-body " style="position: relative;">

                <img alt="" height="100%" src="{{ asset('assets/img/widget-bg/purple.png') }}"
                    width="100%"style="height: 100px;">
                <div class="overlay">
                    <div class="dashboard-info"style="position: absolute; bottom: 0; left: 0; color: white;">
                        <h2><i class="fas fa-users"></i></h2>
                        <a href="{{ route('employee-manege.index') }}" class="text-center"
                            style="color: inherit; text-decoration: none; font-weight: bold;">Total Employee</a>
                    </div>
                    <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;color: white;">
                        <h3 class=""id="count-employee">{{@$user_count}}</h3>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-md-4 col-lg-3 ">

            <div class="item-body " style="position: relative;">

                <img alt="" height="100%" src="{{ asset('assets/img/widget-bg/yellow.png') }}"
                    width="100%"style="height: 100px;">
                <div class="overlay">
                    <div class="dashboard-info"style="position: absolute; bottom: 0; left: 0; color: white;">
                        <h2><i class="fa fa-list"></i></h2>
                        <a href="{{ route('leave-requests.index') }}" class="text-center"
                            style="color: inherit; text-decoration: none; font-weight: bold;">Total Leave Request</a>
                    </div>
                    <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;color: white;">
                        <h3 class=""id="count-employee">{{@$leave}}</h3>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="col-xs-12 col-md-4 col-lg-3 ">

            <div class="item-body " style="position: relative;">

                <img alt="" height="100%" src="{{ asset('assets/img/widget-bg/green.png') }}"
                    width="100%"style="height: 100px;">
                <div class="overlay">
                    <div class="dashboard-info"style="position: absolute; bottom: 0; left: 0; color: white;">
                        <h2><i class="fa fa-check"></i></h2>
                        <a href="{{ route('leave-requests.index') }}?status=Approve" class="text-center"
                            style="color: inherit; text-decoration: none; font-weight: bold;">Total Approve Leave
                        </a>
                    </div>
                    <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;color: white;">
                        <h3 class=""id="count-employee">{{@$approve}}</h3>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-md-4 col-lg-3 ">

            <div class="item-body " style="position: relative;">

                <img alt="" height="100%" src="{{ asset('assets/img/widget-bg/yellow.png') }}"
                    width="100%"style="height: 100px;">
                <div class="overlay">
                    <div class="dashboard-info"style="position: absolute; bottom: 0; left: 0; color: white;">
                        <h2><i class="fa fa-spinner"></i></h2>
                        <a href="{{ route('leave-requests.index') }}?status=Pending" class="text-center"
                            style="color: inherit; text-decoration: none; font-weight: bold;">Total Leave Pending Request
                        </a>
                    </div>
                    <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;color: white;">
                        <h3 class=""id="count-employee">{{@$pending}}</h3>
                    </div>
                </div>
            </div>

        </div>

        <br>
        <div class="col-xs-12 col-md-4 col-lg-3 "style="margin-top: 22px;">

            <div class="item-body " style="position: relative;">

                <img alt="" height="100%" src="{{ asset('assets/img/widget-bg/red.png') }}"
                    width="100%"style="height: 100px;">
                <div class="overlay">
                    <div class="dashboard-info"style="position: absolute; bottom: 0; left: 0; color: white;">
                        <h2><i class="fa fa-times"></i></h2>
                        <a href="{{ route('leave-requests.index') }}?status=Rejected" class="text-center"
                            style="color: inherit; text-decoration: none; font-weight: bold;">Total Reject Leave
                        </a>
                    </div>
                    <div class="dashboard-loader" style="position:absolute;right:13px;top:11px;color: white;">
                        <h3 class=""id="count-employee">{{@$reject}}</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




