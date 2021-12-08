// Page: /install/

$(document).ready(function(){
	// Define Properties
	initConnectionTest();
    initFormsSubmit();
});
// Variables
var dialogData;

// Functions
// Connection Test
function initConnectionTest(){
    $('#connectionTest').click(function(e){
        e.preventDefault();
        // Data
        var data='test=true&' + $('#serverForm').serialize();
        // Load Page
        window.location.href="?"+data;
    });
}

// Form Submit
function initFormsSubmit(){
    $('#serverForm').submit(function(e){
        e.preventDefault();
        // Data
        var data='load=true&' + $('#serverForm').serialize();
        // Load Page
        window.location.href="?"+data;
    });
}