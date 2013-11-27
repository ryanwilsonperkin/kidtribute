function getProjectSuccess(data) {
    console.log(data);
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
