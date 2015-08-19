@extends('master')

@section('content')

<form method="post" action="/din-rubrik" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <h2>Först trodde</h2>
    <div class="form-group">
        <input type="text" name="who" id="who" class="form-control input-lg" placeholder="vem?" autofocus>
    </div>
    <h2>att</h2>
    <div class="form-group">
        <input type="text" name="what" id="what" class="form-control input-lg" placeholder="vad?">
    </div>
    <div class="form-group">
        <select name="punchline" id="punchline" class="form-control input-lg">
            @for ($i = 0; $i < count($punchlines); $i++)
                <option value="{{ $i }}">{{ $punchlines[$i] }}</option>
            @endfor
        </select>
    </div>
    <hr>
    <div class="well well-lg">
        <h3>Vad hände sen?</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Bild</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="upload-image">Ladda upp bild</label>
                            <input type="file" name="upload-image" id="upload-image" class="form-control" accept=".jpg,.png,.gif">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="image-link">Länk till bild</label>
                            <input type="text" name="image-link" id="image-link" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Film</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="youtube-link">YouTube-länk</label>
                            <input type="text" name="youtube-link" id="youtube-link" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button id="submit-headline" class="btn btn-success">Visa min rubrik!</button>
    </div>
</form>

@endsection
