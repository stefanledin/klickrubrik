@extends('master')

@section('head')
    <meta property="og:url" content="http://klickrubrik.nu">
    <meta property="og:title" content="Klickrubrik – Förändrar allt!">
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1>Skapa klickrubrik</h1>
                <div id="create-headline" class="row">
                    
                    <div class="col-sm-6 col-md-5 col-md-offset-1 create-headline">
                        <form method="post" action="/din-rubrik" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <h2>
                                        Först trodde 
                                        <input v-model="who" type="text" name="who" id="who" placeholder="vem?" autofocus> 
                                        att
                                        <input v-model="what" type="text" name="what" id="what" placeholder="vad?">
                                    </h2>
                                    <select v-on="change: setPunchline" name="punchline" id="punchline" class="form-control input-lg">
                                        @for ($i = 0; $i < count($punchlines); $i++)
                                            <option value="{{ $i }}">{{ $punchlines[$i] }}</option>
                                        @endfor
                                        <optgroup label=""></optgroup>
                                    </select>
                                    <hr>
                                    <h3>Vad hände sen?</h3>
                                    <label for="upload-image">Ladda upp bild</label>
                                    <input data-url="/attachment-upload" type="file" name="uploaded-image" id="uploaded-image" class="form-control" accept=".jpg,.png,.gif">
                                    <input type="hidden" name="ajax-uploaded-image-url" id="ajax-uploaded-image-url">

                                    <label for="image-link">Länk till bild</label>
                                    <input type="text" name="image-link" id="image-link" class="form-control" v-model="imageLink" v-on="keyup: loadImageLink" debounce="2000">
                                    
                                    <label for="youtube-link">YouTube-länk</label>
                                    <input type="text" name="youtube-link" id="youtube-link" class="form-control">
                                    <br>
                                    <button id="submit-headline" class="btn btn-success">Visa min rubrik!</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    
                    <div class="col-sm-6 col-md-5 preview-container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <img src="img/klickrubrik-logo.png" class="logo">
                                <section id="preview">
                                    <h2>
                                        Först trodde
                                        <span v-if="!who" class="preview-placeholder">vem?</span>
                                        <span v-else>@{{who}}</span>
                                        att
                                        <span v-if="!what" class="preview-placeholder">vad?</span> 
                                        <span v-else>@{{what}}</span> 
                                        
                                        <span v-if="!punchline">
                                            {{ $punchlines[0] }}
                                        </span>
                                        <span v-else>
                                            @{{punchline}}
                                        </span>
                                    </h2>
                                    
                                    <div id="preview-link-image-attachment"></div>
                                    <div id="preview-uploaded-image-attachment"></div>
                                </section>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

@endsection
