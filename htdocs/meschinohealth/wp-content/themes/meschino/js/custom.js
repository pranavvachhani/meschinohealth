jQuery(document).ready(function($) {

		function loadtime(){
          console.log($("document").find(".wpcf7-response-output.wpcf7-validation-errors").attr('class'));
        }

        loadtime();
        $(window).load(function() {
            // executes when complete page is fully loaded, including all frames, objects and images
            loadtime();
        });
});