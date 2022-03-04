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

                    {{$classID}}
                    
                    <form action="{{ route('SetLocationIn') }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" id="classID" name="classID" value="{{$classID}}">
                        <select name="locations">
                        {!!$data!!}
                        </select>
                        <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection