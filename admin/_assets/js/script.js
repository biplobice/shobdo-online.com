$(function() {
	// dynamic selection active menu
     var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
     $("ul.nav li").each(function(){
          if($("a", this).attr("href") == pgurl || $("a", this).attr("href") == '' ) {
          $(this).addClass("active");
		  }
     })
});


/**
 *
 * Crop Image While Uploading With jQuery
 * 
 * Copyright 2013, Resalat Haque
 * http://www.w3bees.com/
 *
 */

// set info for cropping image using hidden fields
function setInfo(i, e) {
	$('#x').val(e.x1);
	$('#y').val(e.y1);
	$('#w').val(e.width);
	$('#h').val(e.height);
}

$(document).ready(function() {
	var p = $("#uploadPreview");

	// prepare instant preview
	$("#uploadImage").change(function(){
		// fadeOut or hide preview
		p.fadeOut();

		// prepare HTML5 FileReader
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

		oFReader.onload = function (oFREvent) {
	   		p.attr('src', oFREvent.target.result).fadeIn();
		};
	});

	// implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
	$('img#uploadPreview').imgAreaSelect({
		// set crop ratio (optional)
		onSelectEnd: setInfo
	});
	
	/*************** text copy to clipboard **************/
    $("#copy-button").zclip({
        path: "http://www.steamdev.com/zclip/js/ZeroClipboard.swf",
        copy: function(){return $('#txtCopyText').val();},
        beforeCopy: function () { },
        afterCopy: function () {
            alert('Copy To Clipboard : \n'+ $('#txtCopyText').val());
        }
    });	
	/******************************************************/
});