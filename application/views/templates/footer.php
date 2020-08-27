        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/animsition.min.js"></script><br>
        <script>
            $(document).ready(function() {
                $(".animsition").animsition({
                    inClass: 'fade-in-left-lg',
                    outClass: 'fade-out-left-lg',
                    inDuration: 500,
                    outDuration: 500,
                    linkElement: '.animsition-link',
                    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
                    loading: true,
                    loadingParentElement: 'body', //animsition wrapper element
                    loadingClass: 'animsition-loading',
                    loadingInner: '', // e.g '<img src="loading.svg" />'
                    timeout: false,
                    timeoutCountdown: 5000,
                    onLoadEvent: true,
                    browser: [ 'animation-duration', '-webkit-animation-duration'],
                    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
                    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
                    overlay : false,
                    overlayClass : 'animsition-overlay-slide',
                    overlayParentElement : 'body',
                    transition: function(url){ window.location.href = url; }
                });
            });
        </script>    
    </body>
</html>