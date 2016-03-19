;(function(window, document, $, undefined) {
    'use strict';

    var createHeadlineForm = new Vue({
        el: '#create-headline',
        data: {
            punchline: '',
            imageLink: '',
            youtubeLink: ''
        },
        methods: {
            setPunchline: function(event) {
                var selectedOption = event.target.selectedOptions[0];
                this.$data.punchline = selectedOption.innerHTML;
            },
            loadImageLink: function(e) {
                if (this.imageLink === e.currentTarget.value) return;

                this.imageLink = e.currentTarget.value;

                var img = new Image;
                img.src = this.imageLink;
                img.onload = function() {
                    if ((img.width === 0) && (img.height == 0)) return;
                    var placeholder = document.getElementById('preview-link-image-attachment');
                    if (placeholder.childNodes.length) {
                        placeholder.childNodes[0].remove();
                    }
                    placeholder.appendChild(img);
                }.bind(this);
            },
            loadYoutubeEmbedLink: function(e) {
                this.youtubeLink = e.currentTarget.value;
                if (this.youtubeLink !== '') {
                    var url = '/youtube-embed?url=' + this.youtubeLink;
                    $.ajax(url, {
                        success: function(data) {
                            document.getElementById('preview-youtube-embed').innerHTML = data;
                        } 
                    });

                } else {
                    document.getElementById('preview-youtube-embed').innerHTML = '';
                }
            }
        }
    });
    if (matchMedia('(min-width: 767px)').matches) {
        $('input[name="uploaded-image"]').fileupload({
            dataType: 'json',
            done: function (e, data) {
                if (data.result.uploadedImageURL) {
                    var url = data.result.uploadedImageURL;
                    document.getElementById('ajax-uploaded-image-url').setAttribute('value', url);
                    var img = new Image;
                    img.src = url;
                    document.getElementById('preview-link-image-attachment').appendChild(img);
                }
            }
        });

    }

})(window, document, jQuery);
