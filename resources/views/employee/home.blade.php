@extends('employee.dashboard-employee')
@section('title', 'Home')
@section('dashboard-employee-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   You are {{ Auth::user()->name }} <br>Your email is  {{ Auth::user()->email }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
