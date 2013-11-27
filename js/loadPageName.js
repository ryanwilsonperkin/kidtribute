// Used by the browse by category and browse by school pages. Gets the
// title for the page from the url parameters.
$(document).ready(function() {
    var pageTitle = getURLParameter('pageTitle');
    if (pageTitle == 'null') {
    	$('#pageTitle').text('Unknown School/Category');
    }
    else {
    	$('#pageTitle').text(pageTitle);
    }
});

function getURLParameter(name) {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    );
}