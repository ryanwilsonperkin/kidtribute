<?php
ini_set("display_errors","On");
class ResponseObject
{
  public function __construct($status, $statusMessage, $errors, $results) {
    $this->status = $status;
    $this->statusMessage = $statusMessage;
    $this->errors = $errors;
    $this->results = $results;
  }
}

class ProjectObject
{
  public function __construct($id, $schoolId, $userId, $userEmail, $title, $description, $startDate, $endDate, $category, $isApproved, $imageUrl=null) {
    $this->id = $id;
    $this->schoolId = $schoolId;
    $this->userEmail = $userEmail;
    $this->title = $title;
    $this->description = $description;
    $this->startDate = $startDate;
    $this->endDate = $endDate;
    $this->category = $category;
    $this->isApproved = $isApproved;
    $this->imageUrl = $imageUrl;
  }
}

class SchoolObject
{
  public function __construct($id, $name, $type, $schoolBoard, $streetAddress, $city, $postalCode, $donationUrl) {
    $this->id = $id;
    $this->name = $name;
    $this->type = $type;
    $this->schoolBoard = $schoolBoard;
    $this->streetAddress = $streetAddress;
    $this->city = $city;
    $this->postalCode = $postalCode;
    $this->donationUrl = $donationUrl;
  }
}

class UserObject
{
  public function __construct($id, $schoolId, $userType, $username, $password, $name, $title, $email, $skills, $isVetted, $bio, $associatedProjects, $imageUrl=null) {
    $this->id = $id;
    $this->schoolId = $schoolId;
    $this->userType = $userType;
    $this->username = $username;
    $this->password = $password;
    $this->name = $name;
    $this->title = $title;
    $this->email = $email;
    $this->skills = $skills;
    $this->isVetted = $isVetted;
    $this->bio = $bio;
    $this->associatedProjects = $associatedProjects;
    $this->imageUrl = $imageUrl;
  }
}

function project_object_factory() {
  return new ProjectObject(
    1,
    1234,
    1337,
    "teacher@example.com",
    "Super Awesome Mega Project",
    "Whole bunch of text goes here describing the project. Maximum 512 characters.",
    "2013-01-01",
    "2013-03-01",
    "art",
    true
  );
}

function school_object_factory() {
  return new SchoolObject(
    1234,
    "Priory Park",
    "Elementary",
    "Upper Grand District School Board",
    "123 Fake St.",
    "Guelph",
    "H0H 0H0",
    "http://example.com"
  );
}

function user_object_factory() {
  return new UserObject(
    1337,
    1234,
    "teacher",
    "username",
    "password",
    "Teacher McTeachey",
    "Mr.",
    "teacher@example.com",
    Array("art","gym"),
    false,
    "Loves horses",
    Array(1,2,3)
  );
}

function respond($status, $statusMessage, $errors, $results) { 
  $response = new ResponseObject(
    $status,
    $statusMessage,
    $errors,
    $results
  );
  echo json_encode($response);
}

function login_function($key, $parameters) {
  $user = user_object_factory();
  respond(200, "OK", Array(), $user);
}

function get_project_function($key, $parameters) {
  $project = user_object_factory();
  respond(200, "OK", Array(), $project);
}

function create_project_function($key, $parameters) {
  respond(200, "OK", Array(), 1);
}

$requestJson = file_get_contents("php://input");
$requestObject = json_decode($requestJson);

if ($requestObject->functionName == "Login") {
  login_function($requestObject->key, $requestObject->parameters);
}
else if ($requestObject->functionName == "GetProject") {
  get_project_function($requestObject->key, $requestObject->parameters);
}
else if ($requestObject->functionName == "CreateProject") {
  create_project_function($requestObject->key, $requestObject->parameters);
}
else {
  respond(400, "Bad Request", Array("Function not recognized"), null);
}
?>
