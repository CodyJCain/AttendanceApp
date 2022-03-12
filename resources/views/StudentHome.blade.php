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

                    {{ __('You are logged in!') }}
                    Student Home Successful

                    <p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Get Coordinates</button>

<p id="demo"></p>

<form action="{{ route('GPSControllerIn') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="latitude" id="latitude" placeholder="Latitude">
    <input type="text" name="longitude" id="longitude" placeholder="Longitude">
    <input type="text" name="timestamp" id="timestamp" placeholder="Timestamp">
    <input type="submit" value="send" class="btn btn-primary">
</form>

<form action="{{ route('AttendanceClassStudentIn') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="code" id="code" placeholder="Class Code">
    <input type="submit" value="send" class="btn btn-primary">
</form>

<a href="{{route('AttendanceTotalStudent')}}" class="btn btn-primary">View Attendance</a>
</br>
</br>
<a href="{{route('EnterPasscode')}}" class="btn btn-primary">Enter Passcode</a>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude + "<br>Timestamp: " + position.timestamp;
}
/*
<form action="{{ route('GPSControllerIn') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="latitude" value=position.coords.latitude>
    <input type="hidden" name="longitude" value=position.coords.longitude>
    <input type="submit" value="send">
</form>
*/
</script>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
