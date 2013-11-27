<?php
include_once dirname(__FILE__) . '/../models/user_model.php';
include_once dirname(__FILE__) . '/../DBobjects/UserDBObject.php';
//include_once dirname(__FILE__) . '/../RequestObjects/UserRequestObject.php';

function controller_Login($username, $password){
    //get a user from the database via their email address
    $user_model = new user_model();
    $user_object = $user_model->load_from_username($username);

    //verify the passwords match
    if ($user_object->password == $password) {
        $user_response = new userRequest($user_object->user_id, $user_object->school_id,
                                         $user_object->user_type_id, $user_object->email,
                                         $user_object->password, $user_object->name,
                                         $user_object->title, "", $user_object->isVetted,
                                         $user_object->bio, "", $user_object->imageUrl, $user_object->username);
	$user_type = load_user_type($user_object->user_type_id);
	$user_response->userType = $user_type;
        $response_object = new ResponseObject("200", "OK", null, $user_response);
    }
    else {
        $response_object = new ResponseObject("404", "Not Found", array("The user matching the supplied ID could not be found."), null);
    }

    echo json_encode($response_object);
}

function controller_GetUser($userId){
    $user_model = new user_model();
    $user_object = $user_model->load($userId);

    if ($user_object->user_id != "") {
        $user_response = new userRequest($user_object->user_id, $user_object->school_id,
                                         $user_object->user_type_id, $user_object->email,
                                         $user_object->password, $user_object->name,
                                         $user_object->title, "", $user_object->isVetted,
                                         $user_object->bio, "", $user_object->imageUrl, $user_object->username);

        $response_object = new ResponseObject("200", "OK", null, $user_response);
    }
    else {
        $response_object = new ResponseObject("404", "Not Found", array("The user matching the supplied ID could not be found."), null);
    }
    echo 'hope this stops the redirection to login';
    echo json_encode($response_object);
}

function controller_CreateUser($user_request)
{
	//use all the fields from $user_request to create a UserDBObject
    $user_db = new userDB($user_request->id, $user_request->schoolId, $user_request->userType,
                                $user_request->email, $user_request->password, $user_request->name,
                                $user_request->title, $user_request->isVetted, $user_request->bio,
                                $user_request->imageUrl, $user_object->username);

	$user_model = new user_model();
	$user_object = $user_model->create_user($user_db);

    //return the new user ID
    $response_object = new ResponseObject("200", "OK", null, $user_object->user_id);
    echo json_encode($response_object);
}

function controller_UpdateUser($user_request){
    //use all the fields from $user_request to create a UserDBObject
    $user_db = new userDB($user_request->id, $user_request->schoolId, $user_request->userType,
                                $user_request->email, $user_request->password, $user_request->name,
                                $user_request->title, $user_request->isVetted, $user_request->bio,
                                $user_request->imageUrl, $user_request->username);

    $user_model = new user_model();
    $user_object = $user_model->update_user($user_db);

    //return the new user ID
    $response_object = new ResponseObject("200", "OK", null, "true");
    echo json_encode($response_object);
}

function controller_VetCommunityMember($communityMemberId){
    $user_model = new user_model();
    $user_object = $user_model->load($communityMemberId);

    $user_object->isVetted = 1;
    $user_object = $user_model->update_user($user_object);

    $response_object = new ResponseObject("200", "OK", null, "true");
    echo json_encode($response_object);
}

?>
