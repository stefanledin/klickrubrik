<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Klickrubrik.nu</title>
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <form method="post" action="/din-rubrik">
                        {!! csrf_field() !!}
                        <h2>Först trodde</h2>
                        <div class="form-group">
                            <input type="text" name="who" id="who" class="form-control" placeholder="vem?" autofocus>
                        </div>
                        <h2>att</h2>
                        <div class="form-group">
                            <input type="text" name="what" id="what" class="form-control" placeholder="vad?">
                        </div>
                        <div class="form-group">
                            <select name="punchline" id="punchline" class="form-control">
                                <option value="">och du kan inte gissa vad som hände sen!</option>
                                <option value="">– du anar inte vad som vad hände!</option>
                                <option value="">och det som hände sen har fått en hel värld att förundras!</option>
                                <option value="">och det som hände sen har fått ett helt land att förundras!</option>
                                <option value="">och det som hände sen har fått en hel läkarkår att förundras!</option>
                                <option value="">det som hände sen kommer förändra din syn på mänskligheten!</option>
                                <option value="">och det som sen hände fick mig att gråta!</option>
                                <option value="">– resultatet är chockerande!</option>
                                <option value="">och resultatet har chockat en hel värld!</option>
                                <option value="">– ingen kunde ana följderna!</option>
                                <option value="">– konsekvenserna var oanade!</option>
                                <option value="">– ingen kunde förutse följderna!</option>
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
                                                <input type="file" name="upload-image" id="upload-image" class="form-control">
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
                </div>
            </div>
        </div>
    </body>
</html>