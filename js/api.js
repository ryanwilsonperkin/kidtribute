var API_KEY = "123kidtribute";

function UserObject(id, schoolId, userType, username, password, name, title, email, skills, isVetted, bio, associatedProjects, imageUrl) {
    this.id = id;
    this.schoolId = schoolId;
    this.userType = userType;
    this.username = username;
    this.password = password;
    this.name = name;
    this.title = title;
    this.email = email;
    this.skills = skills;
    this.isVetted = isVetted;
    this.bio = bio;
    this.associatedProjects = associatedProjects;
    this.imageUrl = imageUrl;
}

function ProjectObject(id, schoolId, userId, userEmail, title, description, startDate, endDate, imageUrl, category, isApproved) {
    this.id = id;
    this.schoolId = schoolId;
    this.userId = userId;
    this.userEmail = userEmail;
    this.title = title;
    this.description = description;
    this.startDate = startDate;
    this.endDate = endDate;
    this.imageUrl = imageUrl;
    this.category = category;
    this.isApproved = isApproved;
}

function SchoolObject() {
    this.id = id;
    this.name = name;
    this.type = type;
    this.schoolBoard = schoolBoard;
    this.streetAddress = streetAddress;
    this.city = city;
    this.postalCode = postalCode;
    this.donationUrl = donationUrl;
}

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
        error: error
    });
}

function GetUser(userId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetUser",
            parameter: { 
                userId: userId 
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function CreateUser(user, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "CreateUser",
            parameter: { 
                user: user 
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function UpdateUser(user, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "UpdateUser",
            parameter: { 
                user: user 
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function VetCommunityMember(project, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "VetCommunityMember",
            parameter: { 
                project: project 
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function GetProject(projectId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetProject",
            parameter: { 
                projectId: projectId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function CreateProject(project, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "CreateProject",
            parameter: { 
                project: project
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function UpdateProject(project, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "UpdateProject",
            parameter: { 
                project: project
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function AddCommMember(projectId, userId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "AddCommMember",
            parameter: { 
                projectId: projectId,
                userId: userId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function ApproveProject(projectId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "ApproveProject",
            parameter: { 
                projectId: projectId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function RejectProject(projectId, comment, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "RejectProject",
            parameter: { 
                projectId: projectId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function GetAllUnapprovedProjects(principalId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetAllUnapprovedProjects",
            parameter: { 
                principalId: principalId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function GetAllProjectsForTeacher(teacherId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetAllProjectsForTeacher",
            parameter: { 
                teacherId: teacherId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function GetAllProjectsForPrincipal(principalId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetAllProjectsForPrincipal",
            parameter: { 
                principalId: principalId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function GetAllProjectsForCommunityMember(communityMemberId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetAllProjectsForCommunityMember",
            parameter: { 
                communityMemberId: communityMemberId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function GetAllProjectsWhere(query, school, teacher, title, subject, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetAllProjectsWhere",
            parameter: { 
                query: query,
                school: school,
                teacher: teacher,
                title: title,
                subject: subject
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function GetSchool(schoolId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetSchool",
            parameter: { 
                schoolId: schoolId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function GetAllSchools(boardId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetAllSchools",
            parameter: { 
                boardId: boardId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}

function GetProjectMembers(projectId, success, error) {
    $.ajax({
        url: 'Retrieval.php',
        type: 'POST',
        data: { 
            key: API_KEY,
            functionName: "GetProjectMembers",
            parameter: { 
                projectId: projectId
            }
        },
        dataType: 'json',
        success: success,
        error: error
    });
}
