function getProjectSuccess(data) {
    if (data.status != "200") {
        getProjectError();
    }
    else {
        $('#title').text(data.results.title);
        $('#userEmail').text('Contact: ' + data.results.userEmail);
        $('#category').text(data.results.category);
        $('#startDate').text('Start date: ' + data.results.startDate);
        $('#endDate').text('End date: ' + data.results.endDate);
        $('#description').text(data.results.description);
    }
}

function getProjectError(data) {
    console.log("ERROR: Could not GetProject");
    console.log(data);
    $('glyphicon-calendar').remove();
    var alertDiv = $('<div>')
        .addClass('alert alert-danger')
        .text('Project not found.');
    $('content').append(alertDiv);
}

function getURLParameter(name) {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    );
}

function getProjectId() {
    return parseInt(getURLParameter('id'));
}

GetProject(getProjectId(), getProjectSuccess, getProjectError);
