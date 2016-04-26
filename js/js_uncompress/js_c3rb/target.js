jQuery(document).ready(function($) {
  var $evitlinkct     = $( "#evitlnk_ct" );
  var $evitlnksearch  = $("#evitlnk_search");
  var $evitlnkmenu    = $("#evitlnk_menu");
  var $evitlnklogin   = $("#evitlnk_login");  

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

  $evitlnklogin.focusin(function() {
    $($( "#evitlnk_login" ).attr('href')).addClass('target');
  }).focusout(function() {
    $($( "#evitlnk_login" ).attr('href')).removeClass('target');
  });
});