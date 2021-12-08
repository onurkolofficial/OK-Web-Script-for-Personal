$(document).ready(function(){
	// Define Properties
	initSearchText();
});

// Search Input
function initSearchText(){
    $('#webSearch').on('keypress',function(e){
        if(e.which == 13) {
            window.location.href="/search/"+$(this).val();
        }
    });
}