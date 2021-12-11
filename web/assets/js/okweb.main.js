// This Script Required 'jQuery'
// by Onur KOL
$(document).ready(function(){
	// Define Properties
	initLoadingCard();
	initDialogButtons();
});
// Variables
var dialogData;

// Functions
// Loading Cards
function initLoadingCard(){
	// Click 'a' element
	$("a").click(function(){
		if($(this).attr('href')!="#"){
			$($(".dialog")[0]).css("display","flex");
		}
		// <FIXED> Hide loading card at short time if clicked download link.
		setTimeout(function(){$(".loadingCard").css("display","none")},6000);
	});
}

// Dialog Buttons
function initDialogButtons(){
	// Show dialog on click.
	$("[dialog]").click(function(){
		var dialogId="#"+$(this).attr("dialog");
		// Set Data
		dialogData=$(this).attr("dialog-data");
		
		$(dialogId).css("display","flex");
	});
	// Close dialog on click.
	$("[dialog-close]").click(function(){
		var dialogId="#"+$(this).attr("dialog-close");
		// Reset Data
		dialogData=null;
		
		$(dialogId).css("display","none");
	});
	// Action Dialog
	$("[dialog-action]").click(function(){
		var dialogId="#"+$(this).attr("dialog-action");
		// Get Dialog Data
		var dataLink=$(dialogId).attr("data-link");
		var dataProcess=$(dialogId).attr("data-process");
		// Converting Data to Web (Method GET) Type
		// Note! This function required update!!
		dataProcess=dataProcess.replace("%s",dialogData);
		// Hide Dialog & Show Loading Card
		$(dialogId).css("display","none");
		$(".loadingCard").css("display","block");
		// Redirect
		window.location.href=dataLink+dataProcess;
	});
	// Dialog Dismiss
	$(".dialog").click(function(){
		$(this).css("display","none");
	});
}