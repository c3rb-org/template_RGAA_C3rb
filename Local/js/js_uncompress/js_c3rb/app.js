jQuery(function ($) {
	// Initialise les tooltip Bs
	$('[data-toggle="tooltip"]').tooltip();
	//Autorise le html dans les tools tip
	$('[data-toggle="popover"]').popover({ html : true });
	// dropdown
	$('.dropdown-toggle').dropdown();

	//noconflict chosen joomla
	$('div.tab-pane-noconflictchosen').addClass( "tab-pane" ).removeClass( "tab-pane-noconflictchosen" );

}); 

if(window.MooTools) 
{
    Element.implement({
	    hide: function () { return this; },
	    show: function (v) { return this; },
	    slide: function (v) { return this; }
    });
}