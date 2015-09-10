@extends('master')

@section('head')
    <meta property="og:url" content="{{ url($headline->uid) }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $headline->text }}">
    <meta property="og:description" content="Your description">
@endsection

@section('content')

    <h1>{{ $headline->text }}</h1>

    @if($headline->attachment)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="#attachment" data-toggle="collapse">Visa mig!</a>
                </h3>
            </div>
            <div id="attachment" class="collapse panel-body">
                @if($headline->attachment->type == 'image')
                    <p><img src="{{ $headline->attachment->link }}"></p>
                @endif

                @if($headline->attachment->type == 'youtube')
                    <div class="embed-responsive embed-responsive-16by9">
                        {!! $headline->attachment->embedCode() !!}
                    </div>
                @endif
            </div>
        </div>

    @endif

    <div class="btn-group">
        <a href="{{ route('home') }}" class="btn btn-success">Ny rubrik</a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(url($headline->uid));?>" class="btn btn-primary">Dela på Facebook</a>
        <a href="mailto:?subject=Klickrubrik&amp;body={{ url($headline->uid) }}" class="btn btn-primary">Dela med e-post</a>
    </div>

@endsection