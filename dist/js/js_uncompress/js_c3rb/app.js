jQuery(function ($) {
    
	// Initialise les tooltip Bs
	$('[data-toggle="tooltip"]').tooltip();
	
	//Autorise le html dans les tools tip
	$('[data-toggle="popover"]').popover({ html : true });
	
	// dropdown
	$('.dropdown-toggle').dropdown();

	//noconflict chosen joomla
	$('div.tab-pane-noconflictchosen').addClass( "tab-pane" ).removeClass( "tab-pane-noconflictchosen" );

	//Modal avec iframe
	$('div[data-iframe]').each(function(){
	    $(this).on('show.bs.modal', function() {
		var modalBody = $(this).find('.modal-body');
		modalBody.find('iframe').remove();
		modalBody.prepend('<iframe style="border:none" src="' + $(this).attr('data-iframe') + '" width="' + $(this).attr('data-iframe-width') + '" height="' + $(this).attr('data-iframe-height') + '"></iframe>');
	    });
	   
	});
}); 

if(window.MooTools) 
{
    Element.implement({
	    hide: function () { return this; },
	    show: function () { return this; },
	    slide: function () { return this; }
    });
}