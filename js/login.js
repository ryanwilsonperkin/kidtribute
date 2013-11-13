var users = [
    ['teacher', 'password'],
    ['principal', 'password']
];

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

    $('#LoginButton').bind('click', loginButtonClick);
});

// Verifies the credentials given on the login screen. Returns true if a match
// was found for the given credentials, false otherwise. In the case of a
// successful login, the 'kidTributeLogin' cookie is set to the username.
var verifyCredentials = function () {
    var username = $('#username').val();
    var password = $('#password').val();

    // Check the list of users for a match.
    for (var i = 0; i < users.length; i++) {
        if (username == users[i][0] && password == users[i][1]) {
            $.removeCookie('KidTributeLogin');
            $.cookie('KidTributeLogin', username, {path: '/', expires: 7});
            return true;
        }
    }

    // No match was found.
    return false;
}

// Is called upon the user pressing the login button.
var loginButtonClick = function () {
    if (verifyCredentials()) {
        document.location.href = 'index.html';
    } else {
        $('#LoginError').removeClass('hidden');
    }
}

// Gets the username of the current user, or undefined if not logged in.
var getCurrentUser = function () {
    return $.cookie('KidTributeLogin');
}

// Is called upon the user pressing the logout button.
var logout = function () {
    $.removeCookie('KidTributeLogin');
    $('#Logout').addClass('hidden');
    $('#Username').addClass('hidden');
    $('#Login').removeClass('hidden');

    // Hide the extra sidebar stuff.
    $('#CreateProject').addClass('hidden');
    $('#TeacherViewProjects').addClass('hidden');
    $('#PrincipalViewProjects').addClass('hidden');
}
