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

                    {{$name}}
                    
                    <form action="{{ route('EditControllerIn') }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" id="classID" name="classID" value="{{$classID}}">
                        <input type="hidden" id="studentID" name="studentID" value="{{$studentID}}">
                        <input type="radio" name="status" value="Present">
                        Present  
                        </br>
                        <input type="radio" name="status" value="Absent">
                        Absent
                        </br>
                        <input type="radio" name="status" value="Tardy">
                        Tardy
                        </br>
                        <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection