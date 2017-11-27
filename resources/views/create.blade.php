@extends('master')

@section('body')
    <div id="app" class="page">
        
        <div class="headline-maker vh">
            <div class="logo__wrapper">
                @include('logo')
            </div>

            <form action="/headline" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <fieldset class="headline-maker__text">
                    <legend>Skapa din Klickrubrik</legend>

                    <div class="input-wrapper">
                        <label for="who">Först trodde</label>
                        <input class="input input--text input--rounded" type="text" name="who" id="who" v-model="who" placeholder="Vem?">
                    </div>
                    
                    <div class="input-wrapper">
                        <label for="what">att</label>
                        <input class="input input--text input--rounded" type="text" name="what" v-model="what" placeholder="Vad?" id="what">
                    </div>
                    
                    <div class="input-wrapper">
                        <select class="input input--select input--rounded" v-model="punchline" name="punchline" id="punchline">
                            <option value="du kan inte gissa vad som hände sen!">du kan inte gissa vad som hände sen!</option>
                        </select>
                    </div>

                </fieldset>
                <fieldset class="headline-maker__attachment">
                    <legend>?!!</legend>
                    <ul class="icon-group">
                        <li class="icon-group__icon" v-bind:class="{'icon-group__icon--selected': (attachmentType === 'uploaded-image')}">
                            <label class="headline-maker__attachment__icon">
                                <svg width="48" height="36" viewBox="0 0 48 36" xmlns="http://www.w3.org/2000/svg"><title>imageadd</title><path d="M39 18c-4.966 0-9 4.03-9 9s4.034 9 9 9 9-4.03 9-9-4.034-9-9-9zm5 10h-4v4h-2v-4h-4v-2h4v-4h2v4h4v2zM8 28l8-11.92L20.96 20 26 12l3.706 5.928c-2.542 2.606-3.954 6.178-3.654 10.072H8zm21.64 8H0V0h44v15.002c-1.246-.522-2.594-.844-4-.952V4H4v28h23.004c.624 1.498 1.53 2.848 2.636 4zM11 14c-1.656 0-3-1.342-3-3 0-1.656 1.344-3 3-3s3 1.344 3 3c0 1.658-1.344 3-3 3z" fill-rule="nonzero" fill="#00569F"/></svg>
                                Ladda upp bild
                                <input type="radio" v-model="attachmentType" name="attachment-type" value="uploaded-image">
                            </label>
                        </li>
                        <li class="icon-group__icon" v-bind:class="{'icon-group__icon--selected': (attachmentType === 'image-link')}">
                            <label class="headline-maker__attachment__icon">
                                <svg width="49" height="36" viewBox="0 0 49 36" xmlns="http://www.w3.org/2000/svg"><title>Imagelink</title><path d="M14 11c0-1.656-1.344-3-3-3s-3 1.344-3 3c0 1.658 1.344 3 3 3s3-1.342 3-3zm17.188 9.72c.44-.44.926-.802 1.444-1.088 2.887-1.59 6.59-.745 8.445 2.07l-2.246 2.244c-.643-1.47-2.242-2.305-3.833-1.95-.6.135-1.168.434-1.633.9L29.06 27.2c-1.307 1.308-1.307 3.434 0 4.74 1.307 1.308 3.433 1.308 4.74 0l1.327-1.326c1.207.48 2.5.67 3.78.575l-2.93 2.928c-2.51 2.51-6.582 2.51-9.093 0-2.51-2.51-2.51-6.582 0-9.093l4.304-4.306zm6.836-6.837l-2.93 2.93c1.278-.097 2.573.095 3.78.573L40.2 16.06c1.307-1.307 3.433-1.307 4.74 0 1.307 1.307 1.307 3.433 0 4.74l-4.305 4.305c-1.31 1.31-3.44 1.3-4.74 0-.303-.303-.564-.68-.727-1.05l-2.246 2.244c.236.357.48.666.796.98.812.813 1.846 1.418 3.036 1.705 1.542.37 3.194.166 4.613-.617.518-.286 1.005-.648 1.444-1.087l4.305-4.304c2.512-2.51 2.512-6.582 0-9.093-2.51-2.51-6.58-2.51-9.09 0zm-8.884 3.143L26 12l-5.04 8L16 16.08 8 28h13.388c.288-2.278 1.26-4.484 3.006-6.228l4.746-4.746zM21.632 32H4V4h36v4.252c.598-.124 1.208-.192 1.832-.192.742 0 1.464.12 2.168.294V0H0v36h23.636c-.964-1.21-1.636-2.566-2.004-4z" fill-rule="nonzero" fill="#00569F"/></svg>
                                Länk till bild
                                <input type="radio" v-model="attachmentType" name="attachment-type" value="image-link">
                            </label>
                        </li>
                        <li class="icon-group__icon" v-bind:class="{'icon-group__icon--selected': (attachmentType === 'youtube-video')}">
                            <label class="headline-maker__attachment__icon">
                                <svg width="51" height="36" viewBox="0 0 51 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Page 1</title><defs><path id="a" d="M0 36h51V0H0z"/></defs><g fill="none" fill-rule="evenodd"><mask id="b" fill="#fff"><use xlink:href="#a"/></mask><path d="M20.175 25.095V10.68l13.537 7.056-13.537 7.36zM50.49 7.765s-.498-3.526-2.027-5.08C46.523.648 44.35.638 43.353.52 36.217 0 25.51 0 25.51 0h-.02S14.783 0 7.646.518c-.997.12-3.17.13-5.11 2.168C1.007 4.24.51 7.766.51 7.766S0 11.908 0 16.05v3.883c0 4.143.51 8.285.51 8.285s.498 3.527 2.027 5.08c1.94 2.04 4.488 1.974 5.623 2.188 4.08.392 17.34.514 17.34.514s10.717-.016 17.853-.534c.997-.12 3.17-.13 5.11-2.168 1.53-1.553 2.028-5.08 2.028-5.08s.51-4.142.51-8.285V16.05c0-4.142-.51-8.284-.51-8.284z" fill="#00569F" mask="url(#b)"/></g></svg>
                                YouTube-länk
                                <input type="radio" v-model="attachmentType" name="attachment-type" value="youtube-video">
                            </label>
                        </li>
                    </ul>
                    
                    <div v-if="attachmentType === 'uploaded-image'" class="input-wrapper">
                        <label for="file-upload">Ladda upp bild</label>
                        <input id="file-upload" name="file-upload" class="input input--file input--rounded" v-on:change="uploadImage" type="file" accept=".jpg,.png,.gif">
                    </div>
                    
                    <div v-if="attachmentType === 'image-link'" class="input-wrapper">
                        <input name="link" class="input input--text input--rounded" type="text" v-model="imageLink" v-on:keyup="loadImageLink" debounce="2000" placeholder="Länk till bild">
                    </div>
                    
                    <div v-if="attachmentType === 'youtube-video'" class="input-wrapper">
                        <input name="link" class="input input--text input--rounded" type="text" v-model="youtubeVideo" v-on:keyup="loadYoutubeVideo" debounce="2000" placeholder="Länk till YouTube">
                    </div>

                </fieldset>

                <div class="input-wrapper">
                    <input type="submit" v-on:click="createHeadline" class="button" value="Visa min Klickrubrik">
                </div>
            </form>
        </div>

        <div class="preview-wrapper vh">
            <div class="preview">
                <div class="preview__inner">
                    <span class="preview__headline">Förhandsvisning</span>
                    <h1 class="headline">Först trodde <span>@{{who ? who : 'vem?'}}</span> att <span>@{{what ? what : 'vad?'}}</span> – <span>@{{punchline}}</span></h1>
                    <div v-if="!attachment" class="preview__attachment-placeholder widescreen">
                        <div>?!!</div>
                    </div>
                    <div v-show="attachment" id="attachment-container" class="attachment" v-html="attachment"></div>
                </div>
            </div>
        </div>

    </div>
@endsection