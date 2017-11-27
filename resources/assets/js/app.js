
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const getVideoId = require('get-video-id');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

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
            this.attachment = value
        }
    },
    computed: {},
    methods: {

        loadImageLink: function(e) {
            if (this.imageLink) {
                this.attachment = `<img class="attachment attachment--image" src="${this.imageLink}">`;
            }
            
            /*var img = new Image;
            img.src = this.imageLink;
            img.onload = function() {
                if ((img.width === 0) && (img.height == 0)) return;
                this.attachment = img;
                if (this.attachmentContainer.childNodes.length) {
                    this.attachmentContainer.childNodes[0].remove();
                }
                this.attachmentContainer.appendChild(img);
            }.bind(this);*/
        },

        uploadImage: function (e) {
            console.log(e);
            let data = new FormData();
            data.append('who', this.who);
            data.append('what', this.what);
            data.append('punchline', this.punchline);
            data.append('attachment_type', this.attachment_type);
            data.append('file-upload', e.target.files[0]);
            axios.post('/headline', data)
                .then(function (response) {
                    console.log(response)
                })
                .catch(function (error) {
                    console.log(error);
                });
                //this.createHeadline();
            },

            loadYoutubeVideo: function (e) {
            const video = getVideoId(this.youtubeVideo);
            if (!video.id) {
                // Error!
                return;
            }
            this.attachment = `<div class="attachment attachment--video"><iframe src="https://www.youtube.com/embed/${video.id}" width="560" height="315" allowfullscreen></iframe></div>`
        },

        createHeadline: function () {
            axios.post('/headline', {
                who: this.who,
                what: this.what,
                punchline: this.punchline,
                attachment_type: this.attachmentType
            })
        }

    },
});
