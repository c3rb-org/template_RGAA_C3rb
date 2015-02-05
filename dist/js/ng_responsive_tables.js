!function(a) {
    a.fn.ngResponsiveTables = function(b) {
        var c = {
            smallPaddingCharNo: 5,
            mediumPaddingCharNo: 10,
            largePaddingCharNo: 15
        }, d = this, e = {
            opt: "",
            dataContent: "",
            globalWidth: 0,
            init: function() {
                this.opt = a.extend(c, b), e.targetTable();
            },
            targetTable: function() {
                var b = this;
                d.find("tr").each(function() {
                    a(this).find("td").each(function(c) {
                        b.checkForTableHead(a(this), c), a(this).addClass("tdno" + c);
                    });
                });
            },
            checkForTableHead: function(b, c) {
                this.dataContent = d.find("th").length ? d.find("th")[c].textContent : d.find("tr:first td")[c].textContent, 
                b.addClass(this.opt.smallPaddingCharNo > a.trim(this.dataContent).length ? "small-padding" : this.opt.mediumPaddingCharNo > a.trim(this.dataContent).length ? "medium-padding" : "large-padding"), 
                b.attr("data-content", this.dataContent);
            }
        };
        return a(function() {
            e.init();
        }), this;
    };
}(jQuery);