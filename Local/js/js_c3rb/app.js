jQuery(function ($) {
	// Initialise les tooltip Bs
	$('[data-toggle="tooltip"]').tooltip();
	//Autorise le html dans les tools tip
	$('[data-toggle="popover"]').popover({ html : true });
	// dropdown
	$('.dropdown-toggle').dropdown();

	//noconflict chosen joomla
	$('.tab-pane-noconflictchosen').addClass( "tab-pane" );
	$('.tab-pane-noconflictchosen').removeClass( "tab-pane-noconflictchosen" );

}); 


Element.implement({
	hide: function () { return this; },
	show: function (v) { return this; },
	slide: function (v) { return this; }
});
