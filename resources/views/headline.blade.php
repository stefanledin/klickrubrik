@extends('master')

@section('body')
    <div id="app" class="page">
        <div class="headline">
            <header class="headline__header">
                @include('logo')
            </header>
            <h1>Först trodde {{ $headline->who }} att {{ $headline->what }} – {{ $headline->punchline }}</h1>    
            <div class="headline__attachment">
                {!! $headline->attachment_link !!}
            </div>
            <footer class="headline__footer">
                <ul>
                    <li><a href="#">Skapa ny Klickrubrik</a></li>
                    <li><a href="#">Kopiera URL</a></li>
                    <li><a href="#">Dela</a></li>
                </ul>
            </footer>
        </div>
    </div>
@endsection