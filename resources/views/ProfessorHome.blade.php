@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    </br>

                    <a href="{{route('ProfessorCurrentClass')}}" class="btn btn-primary">View Current Class</a>
                    </br>
                    </br>
                    <a href="{{route('AttendanceSelect')}}" class="btn btn-primary">View Attendance</a>
                    </br>
                    </br>
                    <a href="{{route('LocationClassList')}}" class="btn btn-primary">Change Class Location</a>
                    </br>
                    </br>
                    <a href="{{route('DisplayPasscode')}}" class="btn btn-primary">Display Passcode</a>
                    </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
