/*
* Author:      Marco Kuiper (http://www.marcofolio.net/)
*/
google.load("jquery", "1.3.1");
google.setOnLoadCallback(function()
{
	// Safely inject CSS3 and give the search results a shadow
	var cssObj = { 'box-shadow' : '#888 5px 10px 10px', // Added when CSS3 is standard
		'-webkit-box-shadow' : '#888 5px 10px 10px', // Safari
		'-moz-box-shadow' : '#888 5px 10px 10px'}; // Firefox 3.5+
	$("#suggestions").css(cssObj);
	
	// Fade out the suggestions box when not active
	 $("input").blur(function(){
	 	$('#suggestions').fadeOut();
	 });
});

function lookup(inputString) {
	if(inputString.length == 0) {
		$('#suggestions').fadeOut(); // Hide the suggestions box
	} else {
		$.post("..\rpc.php", {queryString: ""+inputString+""}, function(data) { // Do an AJAX call
			$('#suggestions').fadeIn(); // Show the suggestions box
			$('#suggestions').html(data); // Fill the suggestions box
		});
	}
}