@extends('front-end.investor.dashboard')

@section('CJIBF')
    <div class="error">
        <div class="error__content">
            <h2>Sorry!</h2>
            <h3>There is no empty seat anymore in {{$user->namakota[0]->nama}}</h3>
            <p>Contact Us Maybe?</p>
            <a href="/cjibf-cjibe-2019#cp"><button type="button" class="btn btn-accent btn-pill">&larr; Contact Us</button></a>
        </div>
        <!-- / .error_content -->
    </div>
@endsection



