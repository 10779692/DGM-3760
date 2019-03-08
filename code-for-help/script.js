$(document).click(function(event) {
	if (!$(event.target).closest('nav').length) {
		if ($('#toggle').is(":checked")) {
			$('#toggle').attr('checked', false);
		}
	}
    
});
