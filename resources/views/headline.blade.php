@extends('master')

@section('content')

    <h1>{{ $headline->text }}</h1>

    @if($headline->attachment)

        @if($headline->attachment->type == 'image')
            <img src="{{ $headline->attachment->link }}">
        @endif

        @if($headline->attachment->type == 'youtube')
            {!! $headline->attachment->embedCode() !!}
        @endif

    @endif

@endsection