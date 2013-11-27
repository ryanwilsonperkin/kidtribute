function approve(projectId) {
    ApproveProject(
        function (data) { console.log(data) },
        function (data) { console.log(data) }
    );
}

function reject(projectId) {
    RejectProject(
        function (data) { console.log(data) },
        function (data) { console.log(data) }
    );
}
