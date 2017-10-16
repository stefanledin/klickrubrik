;(function(window, document, $, undefined) {
    'use strict';

    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function () {
            navigator.serviceWorker.register('../service-worker.js');
        });
    }

    var attachmentContainer = document.getElementById('attachment-container');
    var createHeadlineForm = new Vue({
        el: '#create-headline',
        data: {
            punchline: '',
            imageLink: '',
            uploadedImage: '', 
            youtubeLink: ''
        },
        computed: {
            hasAttachment: function () {
                return !(this.youtubeLink.length || this.imageLink.length || this.uploadedImage.length);
            }
        }, 
        methods: {
            setPunchline: function(event) {
                var selectedOption = event.target.selectedOptions[0];
                this.$data.punchline = selectedOption.innerHTML;
            },
            loadImageLink: function(e) {
                if (this.imageLink === e.currentTarget.value) return;

                this.imageLink = e.currentTarget.value;
                this.youtubeLink = '';

                var img = new Image;
                img.src = this.imageLink;
                img.onload = function() {
                    if ((img.width === 0) && (img.height == 0)) return;
                    if (attachmentContainer.childNodes.length) {
                        attachmentContainer.childNodes[0].remove();
                    }
                    attachmentContainer.appendChild(img);
                }.bind(this);
            },
            loadYoutubeEmbedLink: function(e) {
                this.imageLink = '';
                this.youtubeLink = e.currentTarget.value;
                if (this.youtubeLink !== '') {
                    var url = '/youtube-embed?url=' + this.youtubeLink;
                    $.ajax(url, {
                        success: function(data) {
                            attachmentContainer.innerHTML = data;
                        } 
                    });

                } else {
                    attachmentContainer.innerHTML = '';
                }
            }
        }
    });

    if (matchMedia('(min-width: 767px)').matches) {
        $('input[name="uploaded-image"]').fileupload({
            dataType: 'json',
            submit: function (e, data) {
                e.target.classList.add('loading');
            }, 
            done: function (e, data) {
                e.target.classList.remove('loading');
                attachmentContainer.innerHTML = '';
                if (data.result.uploadedImageURL) {
                    var url = data.result.uploadedImageURL;
                    createHeadlineForm.uploadedImage = url;
                    var img = new Image;
                    img.src = url;
                    attachmentContainer.appendChild(img);
                }
            }
        });

    }

})(window, document, jQuery);
