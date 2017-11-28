
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const getVideoId = require('get-video-id');

const app = new Vue({
    el: '#app',
    data: {
        who: '',
        what: '',
        punchline: 'du kan inte gissa vad som hände sen!',
        fileUpload: '',
        imageLink: '',
        youtubeVideo: '',
        attachmentType: '',
        attachment: ''
    },
    mounted() {
        this.attachmentContainer = this.$el.querySelector('#attachment-container');
    },
    watch: {
        imageLink(value) {
            this.attachment = `<img class="attachment attachment--image" src="${value}">`;
        }
    },
    methods: {

        loadImageLink: function(e) {},

        uploadImage: function (e) {
            let data = new FormData();
            data.append('file-upload', e.target.files[0]);
            axios.post('/uploadedfile', data)
                .then((response) => this.imageLink = response.data.link)
                .catch((error) => console.log(error));
        },

        loadYoutubeVideo: function (e) {
            const video = getVideoId(this.youtubeVideo);
            if (!video.id) {
                // Error!
                return;
            }
            this.attachment = `<div class="attachment attachment--video"><iframe src="https://www.youtube.com/embed/${video.id}" width="560" height="315" allowfullscreen></iframe></div>`
        },

        createHeadline: function (event) {
            event.preventDefault();
            axios.post('/headline', {
                who: this.who,
                what: this.what,
                punchline: this.punchline,
                'attachment-link': this.attachment,
                'attachment-type': this.attachmentType
            })
                .then((response) => window.location.href = window.location.href + 'headline/' + response.data.id)
                .catch((error) => console.log(error));
        }

    },
});

const showAttachment = document.querySelector('.headline__body button');
if (showAttachment) {
    showAttachment.addEventListener('click', function (event) {
        event.preventDefault();
        this.style.display = 'none';
        document.querySelector('div.headline__attachment').style.display = 'block';
    });
}