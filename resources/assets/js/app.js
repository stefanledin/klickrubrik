
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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
        imageLink: '',
        youtubeLink: '',
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
            this.attachment = `<img src="${this.imageLink}">`;
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
        }

    },
});
