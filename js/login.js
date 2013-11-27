// Checks whether the user is logged in or not on the page load.
$(document).ready(function() {
    if (getCurrentUsername() != undefined) {
        $('#Logout').removeClass('hidden');
        $('#Login').addClass('hidden');
        $('#Username').removeClass('hidden');
        $('#Username').children().html('Logged in as ' + getCurrentUsername());

        // Hide the principal stuff if this is the teacher
        if (getCurrentUserType() == 'teacher')
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
    if (data.status != '200') {
        $('#LoginError').removeClass('hidden');
        $('#LoginError').html('Wrong username/password. Please try again.');
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
    $('#LoginError').removeClass('hidden');
    $('#LoginError').html('Unable to connect to the database to authenticate you. Please try again later.');
    console.log('ERROR: Problem when calling the Login service.');
    console.log(data);
}

// Called when the user presses the Login button on the Login page.
// Verifies the credentials given on the login screen.
var verifyCredentials = function () {
    var username = $('#username').val();
    var password = $('#password').val();
    Login(username, password, loginSuccess, loginFailure);
}

// Returns the User object of the current user or undefined if no one is logged in.
var getCurrentUser = function () {
    var userJSON = $.cookie('KidTributeLogin');
    if (userJSON != undefined) {
        return JSON.parse(userJSON);
    }
    else {
        return undefined;
    }
}

// Gets the username of the current user, or undefined if not logged in.
var getCurrentUsername = function () {
    var userJSON = $.cookie('KidTributeLogin');
    if (userJSON != undefined) {
        return JSON.parse(userJSON).username;
    }
    else {
        return undefined;
    }
}

// Gets the type of the current user (ie. teacher, principle),
// or undefined if not logged in.
var getCurrentUserType = function () {
    var userJSON = $.cookie('KidTributeLogin');
    if (userJSON != undefined) {
        return JSON.parse(userJSON).userType;
    }
    else {
        return undefined;
    }
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
