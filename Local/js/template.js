jQuery(function(a) {
    a('[data-toggle="tooltip"]').tooltip(), a('[data-toggle="popover"]').popover({
        html: !0
    }), a(".dropdown-toggle").dropdown(), a("div.tab-pane-noconflictchosen").addClass("tab-pane").removeClass("tab-pane-noconflictchosen");
}), Element.implement({
    hide: function() {
        return this;
    },
    show: function() {
        return this;
    },
    slide: function() {
        return this;
    }
});