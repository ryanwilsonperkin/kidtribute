function approve(projectId) {
    ApproveProject(
        projectId,
        function (data) { console.log(data) },
        function (data) { console.log(data) }
    );
}

function reject(projectId) {
    RejectProject(
        projectId,
        function (data) { console.log(data) },
        function (data) { console.log(data) }
    );
}
