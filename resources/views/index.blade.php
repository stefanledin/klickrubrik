@extends('master')

@section('content')

<header role="banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <img src="img/klickrubrik-logo.png" class="logo">
                <nav class="main-menu">
                    <ul>
                        <li><a href="#">Skapa Klickrubrik</a></li>
                        <li><a href="#">Sparade sensationer</a></li>
                        <li><a href="#">Tipsa Klickrubrik</a></li>
                    </ul>
                </nav>
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
                    <div class="col-xs-10 col-xs-offset-1">
                        <section class="create-headline">
                            <form id="create-headline" method="post" action="/din-rubrik" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <div class="form-group">
                                            <h2>Först trodde <input v-model="who" type="text" name="who" id="who" placeholder="vem?" autofocus> att</h2>
                                        </div>
                                        <div class="form-group">
                                            <input v-model="what" type="text" name="what" id="what" class="form-control input-lg" placeholder="vad?">
                                        </div>
                                        <div class="form-group">
                                            <select v-on="change: setPunchline" name="punchline" id="punchline" class="form-control input-lg">
                                                @for ($i = 0; $i < count($punchlines); $i++)
                                                    <option value="{{ $i }}">{{ $punchlines[$i] }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <hr>
                                        <h3>Vad hände sen?</h3>
                                        <div class="form-group">
                                            <label for="upload-image">Ladda upp bild</label>
                                            <input type="file" name="uploaded-image" id="uploaded-image" class="form-control" accept=".jpg,.png,.gif">
                                        </div>
                                        <div class="form-group">
                                            <label for="image-link">Länk till bild</label>
                                            <input type="text" name="image-link" id="image-link" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="youtube-link">YouTube-länk</label>
                                            <input type="text" name="youtube-link" id="youtube-link" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button id="submit-headline" class="btn btn-success">Visa min rubrik!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
