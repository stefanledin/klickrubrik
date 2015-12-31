@extends('master')

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1>Skapa klickrubrik</h1>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <form id="create-headline" method="post" action="/din-rubrik" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="create-headline">
                                        <h2>Först trodde <input v-model="who" type="text" name="who" id="who" placeholder="vem?" autofocus> att</h2>
                                        <input v-model="what" type="text" name="what" id="what" placeholder="vad?">
                                        <select v-on="change: setPunchline" name="punchline" id="punchline" class="form-control input-lg">
                                            @for ($i = 0; $i < count($punchlines); $i++)
                                                <option value="{{ $i }}">{{ $punchlines[$i] }}</option>
                                            @endfor
                                        </select>
                                        <hr>
                                        <h3>Vad hände sen?</h3>
                                        <div class="">
                                            <label for="upload-image">Ladda upp bild</label>
                                            <input type="file" name="uploaded-image" id="uploaded-image" class="form-control" accept=".jpg,.png,.gif">
                                        </div>
                                        <div class="">
                                            <label for="image-link">Länk till bild</label>
                                            <input type="text" name="image-link" id="image-link" class="form-control">
                                        </div>
                                        <div class="">
                                            <label for="youtube-link">YouTube-länk</label>
                                            <input type="text" name="youtube-link" id="youtube-link" class="form-control">
                                        </div>
                                        <div class="">
                                            <button id="submit-headline" class="btn btn-success">Visa min rubrik!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
