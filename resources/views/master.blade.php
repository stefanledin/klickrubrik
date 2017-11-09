<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>Klickrubrik - Förändrar allt</title>
    </head>
    <body>
        
        <div class="page">
            
            <div class="creator">
                <div class="logo__wrapper"></div>

                <form action="">
                    <fieldset>
                        <legend>Skapa din Klickrubrik</legend>

                        <label for="who">Först trodde</label>
                        <input type="text" name="who" id="who" v-model="who" placeholder="Vem?">
                        
                        <label for="what">att</label>
                        <input type="text" name="what" v-model="what" placeholder="Vad?" id="what">
                        
                        <select name="punchline" id="punchline">
                            <option>–du kan inte gissa vad som hände sen!</option>
                        </select>

                    </fieldset>
                    <fieldset>
                        <legend>?!!</legend>

                        <label><input type="radio" name="attachment" value="uploaded-image"></label>
                        <label><input type="radio" name="attachment" value="image-link"></label>
                        <label><input type="radio" name="attachment" value="youtube-video"></label>
                    </fieldset>

                    <input type="submit" class="button" value="Visa min Klickrubrik">
                </form>
            </div>

            <div class="preview"></div>

        </div>

    </body>
</html>