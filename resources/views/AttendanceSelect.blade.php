@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("$header") }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    </br>

                    <a href="{{route('ProfessorClassList')}}" class="btn btn-primary">View Individual Classes</a>
                    </br>
                    </br>
                    <a href="{{route('AttendanceTotalClassSelect')}}" class="btn btn-primary">View Total Attendance</a>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
