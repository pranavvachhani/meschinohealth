var config = {
  '.chosen-select'           : {},
  '.chosen-select-deselect'  : {allow_single_deselect:true,width:"100%"},
  '.chosen-select-no-single' : {disable_search_threshold:10},
  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
  '.chosen-select-width'     : {width:"95%"}
}



jQuery(document).ready(function($) {
	function update_chosen_terms_field(){
		for (var selector in config) {
		  $(selector).chosen(config[selector]);
		}
		$('.p2hc-taxonomy').on('change', function() {
			var $p2hc_terms_element = $(this).closest('div').find('.p2hc-terms'); //$('.p2hc-terms');
			var newOptions = taxTerms[this.value]; //JSON.stringify()
			$p2hc_terms_element.html(' ');
			$.each(newOptions, function(key, value) {
			    $p2hc_terms_element.append($("<option></option>")
			    .attr("value", value).text(key));
			});
			$p2hc_terms_element.trigger("chosen:updated");
		});	
	}

	update_chosen_terms_field();

	$(document).on('widget-updated', function(event, widget){
	    // do your awesome stuff here
	    // "widget" represents jQuery object of the affected widget's DOM element
	    update_chosen_terms_field();
	});

	$(document).on('widget-added', function(event, widget){
	    var widget_id = $(widget).attr('id');
	    $('#'+widget_id+' .chosen-container').hide();
	    update_chosen_terms_field();
	});
});