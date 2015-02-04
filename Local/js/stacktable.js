!function(a) {
    var b = document.createElement("div"), c = b.getElementsByTagName("i"), d = a(document.documentElement);
    b.innerHTML = "<!--[if lte IE 8]><i></i><![endif]-->", c[0] && d.addClass("ie-lte8"), 
    "querySelector" in document && (!window.blackberry || window.WebKitPoint) && !window.operamini && (d.addClass("tablesaw-enhanced"), 
    a(function() {
        a(document).trigger("enhance.tablesaw");
    }));
}(jQuery), "undefined" == typeof Tablesaw && (Tablesaw = {}), Tablesaw.config || (Tablesaw.config = {}), 
function(a) {
    var b = "table", c = {
        toolbar: "tablesaw-bar"
    }, d = {
        create: "tablesawcreate",
        destroy: "tablesawdestroy",
        refresh: "tablesawrefresh"
    }, e = "stack", f = "table[data-tablesaw-mode],table[data-tablesaw-sortable]", g = function(b) {
        if (!b) throw new Error("Tablesaw requires an element.");
        this.table = b, this.$table = a(b), this.mode = this.$table.attr("data-tablesaw-mode") || e, 
        this.init();
    };
    g.prototype.init = function() {
        this.$table.attr("id") || this.$table.attr("id", b + "-" + Math.round(1e4 * Math.random())), 
        this.createToolbar();
        var a = this._initCells();
        this.$table.trigger(d.create, [ this, a ]);
    }, g.prototype._initCells = function() {
        var b, c = this.table.querySelectorAll("thead tr"), d = this;
        return a(c).each(function() {
            var e = 0;
            a(this).children().each(function() {
                var f = parseInt(this.getAttribute("colspan"), 10), g = ":nth-child(" + (e + 1) + ")";
                if (b = e + 1, f) for (var h = 0; f - 1 > h; h++) e++, g += ", :nth-child(" + (e + 1) + ")";
                this.cells = d.$table.find("tr").not(a(c).eq(0)).not(this).children(g), e++;
            });
        }), b;
    }, g.prototype.refresh = function() {
        this._initCells(), this.$table.trigger(d.refresh);
    }, g.prototype.createToolbar = function() {
        var b = this.$table.prev("." + c.toolbar);
        b.length || (b = a("<div>").addClass(c.toolbar).insertBefore(this.$table)), this.$toolbar = b, 
        this.mode && this.$toolbar.addClass("mode-" + this.mode);
    }, g.prototype.destroy = function() {
        this.$table.prev("." + c.toolbar).each(function() {
            this.className = this.className.replace(/\bmode\-\w*\b/gi, "");
        });
        var e = this.$table.attr("id");
        a(document).unbind("." + e), a(window).unbind("." + e), this.$table.trigger(d.destroy, [ this ]), 
        this.$table.removeAttr("data-tablesaw-mode"), this.$table.removeData(b);
    }, a.fn[b] = function() {
        return this.each(function() {
            var c = a(this);
            if (!c.data(b)) {
                var d = new g(this);
                c.data(b, d);
            }
        });
    }, a(document).on("enhance.tablesaw", function(c) {
        a(c.target).find(f)[b]();
    });
}(jQuery), function(a, b) {
    var c = {
        stackTable: "tablesaw-stack",
        cellLabels: "tablesaw-cell-label",
        cellContentLabels: "tablesaw-cell-content"
    }, d = {
        obj: "tablesaw-stack"
    }, e = {
        labelless: "data-tablesaw-no-labels",
        hideempty: "data-tablesaw-hide-empty"
    }, f = function(a) {
        this.$table = b(a), this.labelless = this.$table.is("[" + e.labelless + "]"), this.hideempty = this.$table.is("[" + e.hideempty + "]"), 
        this.labelless || (this.allHeaders = this.$table.find("th")), this.$table.data(d.obj, this);
    };
    f.prototype.init = function(a) {
        if (this.$table.addClass(c.stackTable), !this.labelless) {
            var d = b(this.allHeaders), f = this.hideempty;
            d.each(function() {
                var d = b(this), g = b(this.cells).filter(function() {
                    return !(b(this).parent().is("[" + e.labelless + "]") || f && b(this).is(":empty"));
                }), h = g.not(this).filter("thead th").length && " tablesaw-cell-label-top", i = d.find(".tablesaw-sortable-btn"), j = i.length ? i.html() : d.html();
                if ("" !== j) if (h) {
                    var k = parseInt(b(this).attr("colspan"), 10), l = "";
                    k && (l = "td:nth-child(" + k + "n + " + a + ")"), g.filter(l).prepend("<b class='" + c.cellLabels + h + "'>" + j + "</b>");
                } else g.wrapInner("<span class='" + c.cellContentLabels + "'></span>"), g.prepend("<b class='" + c.cellLabels + "'>" + j + "</b>");
            });
        }
    }, f.prototype.destroy = function() {
        this.$table.removeClass(c.stackTable), this.$table.find("." + c.cellLabels).remove(), 
        this.$table.find("." + c.cellContentLabels).each(function() {
            b(this).replaceWith(this.childNodes);
        });
    }, b(document).on("tablesawcreate", function(a, b, c) {
        if ("stack" === b.mode) {
            var d = new f(b.table);
            d.init(c);
        }
    }), b(document).on("tablesawdestroy", function(a, c) {
        "stack" === c.mode && b(c.table).data(d.obj).destroy();
    });
}(this, jQuery);