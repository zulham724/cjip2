@extends('layouts.consuloan')
@section('css')
@endsection
@section('content')
<transition name="fade" mode="out-in">
    <keep-alive include="LocationPage">
        <router-view></router-view>
    </keep-alive>
</transition>
@endsection
