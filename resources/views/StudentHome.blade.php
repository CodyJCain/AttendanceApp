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

                    
<!--<button onclick="getLocation()">Get Coordinates</button>-->

<p id="demo"></p>

<form action="{{ route('GPSControllerIn') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="latitude" id="latitude" value="33.4834319">
    <input type="hidden" name="longitude" id="longitude" value="-81.6801946">
    <input type="hidden" name="timestamp" id="timestamp" value="1650368880058">
    <input type="submit" value="Check in to Class" class="btn btn-primary">
</form>

</br>

<a href="{{route('EnterPasscode')}}" class="btn btn-primary">Enter Passcode</a>

</br>
</br>

<a href="{{route('AttendanceTotalStudent')}}" class="btn btn-primary">View Attendance</a>

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
