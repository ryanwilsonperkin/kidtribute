// Attempts to create and submit the project. In case of an error when creating, an
// error message is shown at the top of the create project page.
var createProjectSubmit = function () {
    var user = getCurrentUser();

    // If there was an error getting the current user, redirect to the login page.
    if (user == undefined) {
        document.location.href = 'login.html';
        return;
    }

    if (!requiredFieldsFilled()) {
        $('#CreateProjectError').removeClass('hidden');
        return;
    }

    // Create the project object to send to the database.
    var newProject = {
        id: null,
        schoolId: user.schoolId,
        userId: user.id,
        userEmail: $('#projectContact').val(),
        title: $('#projectName').val(),
        description: $('#projectDescription').val(),
        startDate: formatDate($('#projectStartDate').val()),
        endDate: null,
        imageUrl: null,
        category: $('#projectCategory').val(),
        isApproved: false,
    };

    createProject(newProject, createProjectSuccess, createProjectFailure);
}

// Callback for an successful call to the CreateProject backend service.
// TODO: Currently a stub, should redirect to the view project page for the new project.
var createProjectSuccess = function (data) {
}

// Callback for an unsuccessful call to the CreateProject backend service.
// TODO: Currently a stub, we should update this with an appropriate message.
var createProjectFailure = function (data) {
    console.log('ERROR: Problem when calling the CreateProject service.');
    console.log(data);
}

// Returns true if all of the requied fields on the create project page
// have been filled; otherwise, false.
var requiredFieldsFilled = function () {
    if ($('#projectName').val() == ''
        || $('#projectLocation').val() == ''
        || $('#projectContact').val() == ''
        || $('#projectDescription').val() == ''
        || $('#projectStartDate').val() == '') {
        return false;
    }
    return true;
}

// Takes a date in the format mm/dd/yyyy and returns a string
// in the format yyyy-mm-dd.
var formatDate = function (date) {
    var split = date.split('/');
    return split[2] + '-' + split[0] + '-' + split[1];
}