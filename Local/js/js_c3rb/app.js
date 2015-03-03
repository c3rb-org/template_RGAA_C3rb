jQuery(function ($) {
	// Initialise les tooltip Bs
	$('[data-toggle="tooltip"]').tooltip();
	// Initialise le po-over
	$('[data-toggle="popover"]').popover();
	//Autorise le html dans les tools tip
	$('[data-toggle="popover"]').popover({ html : true });
	// dropdown
	$('.dropdown-toggle').dropdown();

	
}); 

