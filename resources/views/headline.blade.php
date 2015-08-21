@extends('master')

@section('content')

    <h1>{{ $headline }}</h1>

    @if($attachment)
        @if($attachment_type == 'image')
            <img src="{{ $attachment }}">
        @endif
    @endif

@endsection