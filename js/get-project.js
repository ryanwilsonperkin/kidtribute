function getProjectSuccess(data) {
    console.log(data);
}

function getProjectError(data) {
    console.log("ERROR: Could not GetProject");
    console.log(data);
}

GetProject(getProjectSuccess, getProjectError);
