;(function(window, document, $, undefined) {
    'use strict';
    
    var createHeadlineForm = new Vue({
        el: '#create-headline',
        data: {
            punchline: '– du kan inte gissa vad som hände sen!'
        },
        methods: {
            setPunchline: function(event) {
                var selectedOption = event.target.selectedOptions[0];
                //selectedOption.innerHTML
                this.$data.punchline = selectedOption.innerHTML;
            }
        }
    });

})(window, document, jQuery);