jQuery(function ($) {
	
    // Initialise les tooltip Bs
    //$('[data-toggle="tooltip"]').tooltip();
	$(document).tooltip({selector:'[data-toggle="tooltip"]'});

  //Suppression des title vide générés par les tooltips
    $('[data-original-title][title=""]').removeAttr('title');

    
    //Autorise le html dans les tools tip
    //$('[data-toggle="popover"]').popover({html: true});
    $(document).popover({selector: '[data-toggle="popover"]', html: true});
    
    // dropdown
    $('.dropdown-toggle').dropdown();

    //noconflict chosen joomla
    $('div.tab-pane-noconflictchosen').addClass("tab-pane").removeClass("tab-pane-noconflictchosen");

    //Modal avec iframe
    load_modal_iframe('div[data-iframe]');

    // multi level menu nav bootstrap (Ajout MIR car non natif BS3)
    $("#target").click(function () {
    	alert("Handler for .click() called.");
    });

    //effet
    $(".item-image").hover(function () {
      //$(".fxfadeInUp").toggleClass("displaynone");
      $(this).find('.fxfadeInUp').toggleClass("fadeInUp animated");
    });

    //Génère le role alerte declenche le lecteur d'ecran
    $("#addrole").attr("role", "alert");
    
    // fonction target focus
      var $evitlinkct     = $( "#evitlnk_ct" );
  var $evitlnksearch  = $("#evitlnk_search");
  var $evitlnkmenu    = $("#evitlnk_menu"); 

  $evitlinkct.focusin(function() {
    $("#content-lnk").addClass('target');
  }).focusout(function() {
    $("#content-lnk").removeClass('target');
  });
   $evitlnkmenu.focusin(function() {
    $($( "#evitlnk_menu" ).attr('href')).addClass('target');
  }).focusout(function() {
    $($( "#evitlnk_menu" ).attr('href')).removeClass('target');
  });
   $evitlnksearch.focusin(function() {
    $($( "#evitlnk_search" ).attr('href')).addClass('target');
  }).focusout(function() {
    $($( "#evitlnk_search" ).attr('href')).removeClass('target');
  });  

});

function load_modal_iframe(selector)
{
  (function ($) {
    //$(selector).each(function () {
      $(document).on('show.bs.modal', selector, function (event) {
          var url = $(this).attr('data-iframe');
          var modalBody = $(this).find('.modal-body');
          var button = $(event.relatedTarget);
          if (button.data('iframe'))
        	  url = button.data('iframe');
          modalBody.find('iframe').remove();
          modalBody.prepend('<iframe style="border:none" src="' + url + '" width="' + $(this).attr('data-iframe-width') + '" height="' + $(this).attr('data-iframe-height') + '"></iframe>');
      }).on('hide.bs.modal', function () {
          var modalBody = $(this).find('.modal-body');
          modalBody.find('iframe').remove();
      });
      //});
  })(jQuery);
  /*(function ($) {
    $(selector).each(function () {
      $(this).on('show.bs.modal', function (event) {
          var url = $(this).attr('data-iframe');
          var modalBody = $(this).find('.modal-body');
          var button = $(event.relatedTarget);
          if (button.data('iframe'))
        url = button.data('iframe');
          modalBody.find('iframe').remove();
          modalBody.prepend('<iframe style="border:none" src="' + url + '" width="' + $(this).attr('data-iframe-width') + '" height="' + $(this).attr('data-iframe-height') + '"></iframe>');
      }).on('hide.bs.modal', function () {
          var modalBody = $(this).find('.modal-body');
          modalBody.find('iframe').remove();
      });
      });
  })(jQuery);*/
}

if (window.MooTools)
{
    Element.implement({
  hide: function () {
      return this;
  },
  show: function () {
      return this;
  },
  slide: function () {
      return this;
  }
    });
}

