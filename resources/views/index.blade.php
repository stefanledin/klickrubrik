@extends('master')

@section('head')
    <meta property="og:url" content="http://klickrubrik.nu">
    <meta property="og:title" content="Klickrubrik – Förändrar allt!">
@endsection

@section('content')

<header role="banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <img src="img/klickrubrik-logo.png" class="logo">
                <!--<nav class="main-menu">
                    <ul>
                        <li><a href="#">Skapa Klickrubrik</a></li>
                        <li><a href="#">Sparade sensationer</a></li>
                        <li><a href="#">Tipsa Klickrubrik</a></li>
                    </ul>
                </nav>-->
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Skapa klickrubrik</h1>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="create-headline">
                            <form id="create-headline" method="post" action="/din-rubrik" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                            <h2>Först trodde <input v-model="who" type="text" name="who" id="who" placeholder="vem?" autofocus> att</h2>
                                            <input v-model="what" type="text" name="what" id="what" placeholder="vad?">
                                            <select v-on="change: setPunchline" name="punchline" id="punchline" class="form-control input-lg">
                                                @for ($i = 0; $i < count($punchlines); $i++)
                                                    <option value="{{ $i }}">{{ $punchlines[$i] }}</option>
                                                @endfor
                                            </select>
                                            <hr>
                                            <h3>Vad hände sen?</h3>
                                            <label for="upload-image">Ladda upp bild</label>
                                            <input type="file" name="uploaded-image" id="uploaded-image" class="form-control" accept=".jpg,.png,.gif">
                                            
                                            <label for="image-link">Länk till bild</label>
                                            <input type="text" name="image-link" id="image-link" class="form-control">
                                            
                                            <label for="youtube-link">YouTube-länk</label>
                                            <input type="text" name="youtube-link" id="youtube-link" class="form-control">
                                            <br>
                                            <button id="submit-headline" class="btn btn-success">Visa min rubrik!</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
