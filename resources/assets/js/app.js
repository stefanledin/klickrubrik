;(function(window, document, $, undefined) {
    'use strict';
    
    var createHeadlineForm = new Vue({
        el: '#create-headline',
        data: {
            punchline: '',
            imageLink: ''
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
            }
        }
    });

    $('input[name="uploaded-image"]').fileupload({
        dataType: 'json',
        done: function (e, data) {
            if (data.result.uploadedImageURL) {
                createHeadlineForm.imageLink = data.result.uploadedImageURL;
            }
        }
    });
    
})(window, document, jQuery);