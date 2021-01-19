@extends('voyager::master')

@section('content')
    @if(Auth::user()->hasRole(['admin', 'Promosi']))
    <div class="container">
        <div class="row justify-content-center">
            <iframe src="https://dashboard.tawk.to" width="100%" height="800">
                <p>Your browser does not support iframes.</p>
            </iframe>
        </div>
    </div>
    @endif
@endsection