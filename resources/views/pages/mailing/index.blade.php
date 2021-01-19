@extends('layouts.mailing')
@section('content')
<transition name="fade" mode="out-in">
    {{-- <keep-alive> --}}
        <router-view
            style="background-color:black;height:100%"
        ></router-view>
    {{-- </keep-alive> --}}
</transition>
@endsection
