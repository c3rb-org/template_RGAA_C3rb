jQuery(function(a) {
    a('[data-toggle="tooltip"]').tooltip(), a('[data-toggle="popover"]').popover(), 
    a('[data-toggle="popover"]').popover({
        html: !0
    }), a(".dropdown-toggle").dropdown();
});