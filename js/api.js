function Login(username, password, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: {
                key: API_KEY,
                functionName: "Login",
                parameters: {
                    username: username,
                    password: password
                },
        },
        dataType: 'json',
        success: success,
    });
}

function GetUser(userId) {

}

function CreateUser(user) {

}

function UpdateUser(user) {

}

function VetCommunityMember(project) {

}

function GetProject(projectId) {

}

function CreateProject(project) {

}

function UpdateProject(project) {

}

function AddCommMember(projectId, userId) {

}

function ApproveProject(projectId) {

}

function RejectProject(projectId, comment) {

}

function GetAllUnapprovedProjects(principalId) {

}

function GetAllProjectsForTeacher(teacherId) {

}

function GetAllProjectsForPrincipal(principalId) {

}

function GetAllProjectsForCommunityMember(communityMemberId) {

}

function GetAllProjectsWhere(query, school, teacher, title, subject) {

}

function GetSchool(schoolId) {

}

function GetAllSchools(boardId) {

}

function GetProjectMembers(projectId) {

}
