jQuery(function(a) {
    a('[data-toggle="tooltip"]').tooltip(), 
    a('[data-toggle="popover"]').popover(), 
    a('[data-toggle="popover"]').popover({
        html: !0
    }), a(".dropdown-toggle").dropdown();
        
});

Element.implement({
	hide: function () { return this; },
	show: function (v) { return this; },
	slide: function (v) { return this; }
});