@extends('layouts.consuloan')
@section('content')
<div style="height: 100%; min-height: 500px;">
    {!! Mapper::render() !!}
</div>
@endsection
@section('js')

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>

    {{--{!! ($chart->script()) !!}--}}
@endsection
