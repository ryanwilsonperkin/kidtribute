function getProjectSuccess(data) {
    console.log(data);
    $('#title').text(data.results.title);
    $('#userEmail').text('Contact: ' + data.results.userEmail);
    $('#category').text(data.results.category);
    $('#startDate').text('Start date: ' + data.results.startDate);
    $('#endDate').text('End date: ' + data.results.endDate);
    $('#description').text(data.results.description);
}

function getProjectError(data) {
    console.log("ERROR: Could not GetProject");
    console.log(data);
}

function getURLParameter(name) {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    );
}

function getProjectId() {
    var id = parseInt(getURLParameter('id'));
    return id ? id : 1;
}

GetProject(getProjectId(), getProjectSuccess, getProjectError);
