jQuery(function ($) {
    "use strict";

    $(document).ready(function () {

	$('#bt_importparams').on('click', function () {
	    	    
	    if ($('#file_importparams')[0].files.length != 1)
	    {
		alert(Joomla.JText._('TPL_C3RB_RGAA_IMPORT_ERR_FILE_SELECT'));
		return;
	    }

	    var files = $('#file_importparams')[0].files;
	    var file = files[0];
	    if (file.size == 0)
	    {
		alert(Joomla.JText._('TPL_C3RB_RGAA_IMPORT_ERR_FILE_CONFIG'));
		return;
	    }

	    if (confirm(Joomla.JText._('TPL_C3RB_RGAA_IMPORT_CONFIRM')) != true)
	    {
		return false;
	    }

	    $(this).attr("disabled", "disabled");
	    $('#file_importparams').attr("disabled", "disabled");
	    
	    var data = new FormData();
	    $.each(files, function (key, value)
	    {
		data.append(key, value);
	    });
	    
	    $.ajax({
		url: 'index.php?files&option=com_ajax&plugin=rgaac3rb&format=json&action=import&templateId=' + $(this).attr('data-template-id'),
		type: 'POST',
		data: data,
		cache: false,
		dataType: 'json',
		processData: false,
		contentType: false
	    })
	    .done(function(response){
		if(response.success == false)
		{
		    alert(response.message);
		    return;
		}
		
		alert(Joomla.JText._('TPL_C3RB_RGAA_IMPORT_OK'));
		window.location.reload();
	    })
	    .fail(function(response){
		alert(Joomla.JText._('TPL_C3RB_RGAA_IMPORT_ERR'));
	    });

	});

    });

});