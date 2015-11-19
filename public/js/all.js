;(function(window, document, $, undefined) {
    'use strict';
    
    var createHeadlineForm = new Vue({
        el: '#create-headline',
        data: {
            imageLink: '',
            youtubeLink: '',
            punchline: 'och du kan inte gissa vad som hände sen!'
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
                    var placeholder = document.getElementById('attachment-placeholder');
                    if (placeholder.childNodes) {
                        
                    } else {
                        placeholder.appendChild(img);
                    }
                }.bind(this);
            }
        }
    });

})(window, document, jQuery);
//# sourceMappingURL=all.js.map