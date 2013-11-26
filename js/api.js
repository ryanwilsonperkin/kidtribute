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

function Login(username, password) {

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
