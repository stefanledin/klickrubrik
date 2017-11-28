@extends('master')

@section('body')
    <div id="app" class="page vh">
        <div class="headline shadow">
            <header class="headline__header">
                @include('logo')
            </header>
            <div class="headline__body">
                <h1>Först trodde {{ $headline->who }} att {{ $headline->what }} – {{ $headline->punchline }}</h1>    
                <button class="button button--blue">Visa mig!</button>
                <div class="headline__attachment" style="display: none;">
                    {!! $headline->attachment_link !!}
                </div>
            </div>
            <footer class="headline__footer">
                <ul>
                    <li><a href="{{ route('home') }}">Skapa ny Klickrubrik</a></li>
                    <li><a href="#">Kopiera URL</a></li>
                    <li><a href="#">Dela</a></li>
                </ul>
            </footer>
        </div>
    </div>
@endsection