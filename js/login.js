// Checks whether the user is logged in or not on the page load.
$(document).ready(function() {
    if (getCurrentUser() != undefined) {
        $('#Logout').removeClass('hidden');
        $('#Login').addClass('hidden');
        $('#Username').removeClass('hidden');
        $('#Username').children().html('Logged in as ' + getCurrentUser());

        // Hide the principal stuff if this is the teacher
        if (getCurrentUser() == 'teacher')
            $('#PrincipalViewProjects').addClass('hidden');
    }
    else {
        $('#Logout').addClass('hidden');
        $('#Username').addClass('hidden');
        $('#Login').removeClass('hidden');

        // Hide the extra sidebar stuff.
        $('#CreateProject').addClass('hidden');
        $('#TeacherViewProjects').addClass('hidden');
        $('#PrincipalViewProjects').addClass('hidden');
    }
});

// The callback for a successful call to the Login backend service.
// If the login was successful, sets the 'KidTributeLogin' cookie to
// be a JSON version of the User object. If unsuccessful, makes the wrong
// username/password warning message visible to the user.
var loginSuccess = function (data) {
    var user = data.results;

    // Check whether the user was found in the database.
    if (user.id == null) {
        $('#LoginError').removeClass('hidden');
    }
    else {
        // Create the cookie if the user object was returned successfully.
        $.removeCookie('KidTributeLogin');
        $.cookie('KidTributeLogin', JSON.stringify(user), {path: '/', expires: 7});
        document.location.href = 'index.html';
    }
}

// Callback for an unsuccessful call to the Login backend service.
// TODO: Currently a stub, we should update this with an appropriate message.
var loginFailure = function (data) {
    console.log('ERROR: Problem when calling the Login service.')
}

// Called when the user presses the Login button on the Login page.
// Verifies the credentials given on the login screen.
var verifyCredentials = function () {
    var username = $('#username').val();
    var password = $('#password').val();
    Login(username, password, loginSuccess, loginFailure);
}

// Gets the username of the current user, or undefined if not logged in.
var getCurrentUser = function () {
    var user = JSON.parse($.cookie('KidTributeLogin'));
    return user.username;
}

// Is called upon the user pressing the logout button.
var logout = function () {
    $.removeCookie('KidTributeLogin', {path: '/'});
    $('#Logout').addClass('hidden');
    $('#Username').addClass('hidden');
    $('#Login').removeClass('hidden');

    // Hide the extra sidebar stuff.
    $('#CreateProject').addClass('hidden');
    $('#TeacherViewProjects').addClass('hidden');
    $('#PrincipalViewProjects').addClass('hidden');

    document.location.href = 'index.html';
}
