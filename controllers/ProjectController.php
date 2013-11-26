<?php
include_once dirname(__FILE__) . '/../models/project_model.php';
include_once dirname(__FILE__) . '/../models/user_model.php';
include_once dirname(__FILE__) . '/../models/category_model.php';
include_once dirname(__FILE__) . '/../RequestObjects/ProjectRequestObject.php';
include_once dirname(__FILE__) . '/../RequestObjects/ResponseObject.php';
include_once dirname(__FILE__) . '/../DBobjects/ProjectDBObject.php';

function controller_GetProject($projectId)
{
	$project_model = new project_model();
	$user_model = new user_model();
	$category_model = new category_model();
	
	$projectDB = $project_model->load($projectId);
	$user = $user_model->load($projectDB->teacher_id); //look up user email based on ->teacher_id //use user model
	$category = $category_model->load($projectDB->category_id);//look up category name based on ->category_id //use category model
	
	$projectResponse = new projectRequest($projectDB->project_id, $projectDB->school_id, $projectDB->teacher_id, $projectDB->title,
										  $projectDB->description, $projectDB->startDate, $projectDB->endDate, $projectDB->imageUrl,
										  $user->email,$category->name);
	//create response object
	$responseObject = new ResponseObject("200", "OK", null, $projectResponse);
	echo json_encode($responseObject);
	//extract email and category from the id's provded in the project object from the DB
}

function controller_CreateProject($project)
{
	$project_model = new project_model();
	$category_model = new category_model();
    $category = $category_model->getByName($project->category);//look this up with category model

    $projectDB = new projectDB(null, $project->schoolId, $project->userId, $category->category_id, $project->title, $project->description,
							$project->startDate, $project->endDate, $project->imageUrl, 1);//assume its approved for the demo
	$creationResponse = $project_model->create_project($projectDB);
	$responseObject = new ResponseObject("200", "OK", null, $creationResponse);
	echo json_encode($responseObject);
}

function controller_UpdateProject($project)
{
    $project_model = new project_model();
	$category_model = new category_model();
    $category = $category_model->getByName($project->category);//look this up with category model

    $projectDB = new projectDB($project->id, $project->schoolId, $project->userId, $category->category_id, $project->title, $project->description,
							$project->startDate, $project->endDate, $project->imageUrl, 1);//assume its approved for the demo
	$updateResponse = $project_model->update_project($projectDB);
	$responseObject = new ResponseObject("200", "OK", null, $updateResponse);
	echo json_encode($responseObject);
}

function controller_AddCommMember($projectId, $userId)
{
	echo $projectId;
	$project_model = new project_model();
	$projectResponse = $project_model->add_comm_member($projectId, $userId);
	$responseObject = new ResponseObject("200", "OK", null, $projectResponse);
	echo json_encode($responseObject);
}

function controller_ApproveProject($projectId)
{
    $project_model = new project_model();
    $project = $project_model->load($projectId);

    $project->approved = '1';
	$updateResponse = $project_model->update_project($project);
	$responseObject = new ResponseObject("200", "OK", null, $updateResponse);
	echo json_encode($responseObject);
}

function controller_RejectProject($projectId, $comment)
{
    $project_model = new project_model();
    $project = $project_model->load($projectId);

    $project->approved = '0';
	$updateResponse = $project_model->update_project($project);
	$responseObject = new ResponseObject("200", "OK", null, $updateResponse);
    //email the teacher/project manager the comment
	echo json_encode($responseObject);
}

// Heesung
function controller_GetProjectMembers($projectId)
{
	$project_model = new project_model();
	$user_model = new user_model();
    $user_projects = $project_model->loadByProjectId($projectId);
    
    $project_return = array();
    
    foreach ($user_projects as $user_project)
    {
        $user = $user_model->load($user_project->used_id);
        array_push($user_return, $user);
    }
    
    $responseObject = new ResponseObject("200", "OK", null, $user_return);
	echo json_encode($responseObject);
}

?>