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

                    <form action="{{ route('VerifyPasscode') }}" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="passcode" id="passcode" placeholder="Passcode">
                        <input type="submit" value="Send">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection