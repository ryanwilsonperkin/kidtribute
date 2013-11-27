// Used by the edit and create project pages. Updates the list of
// potential project managers when the page loads. By default it
// is set to the current user.
$(document).ready(function() {
    var user = getCurrentUser();
    if (user != undefined) {
    	$('#projectManagerDefault').html('Me (' + user.name + ')');
    }
});
