var users = [
    ['teacher', 'password'],
    ['principal', 'password']
];

// Checks whether the user is logged in or not on the page load.
$(document).ready(function() {
    if ($.cookie('KidTributeLogin') != undefined) {
        $('#Logout').removeClass('hidden');
        $('#Login').addClass('hidden');
    }
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

var logout = function () {
    $.removeCookie('KidTributeLogin');
    $('#Logout').addClass('hidden');
    $('#Login').removeClass('hidden');
}
