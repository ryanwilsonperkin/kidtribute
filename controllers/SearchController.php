<?php
include_once dirname(__FILE__) . '/../models/project_model.php';
include_once dirname(__FILE__) . '/../models/user_model.php';
include_once dirname(__FILE__) . '/../models/school_model.php';
include_once dirname(__FILE__) . '/../models/category_model.php';
include_once dirname(__FILE__) . '/../RequestObjects/ProjectRequestObject.php';
include_once dirname(__FILE__) . '/../RequestObjects/SchoolRequestObject.php';
include_once dirname(__FILE__) . '/../RequestObjects/ResponseObject.php';
include_once dirname(__FILE__) . '/../DBobjects/ProjectDBObject.php';

function controller_GetAllUnapprovedProjects($principalId)
{
	$project_model = new project_model();
    $user_model = new user_model();
    $category_model = new category_model();
    $projects = $project_model->loadByPricipalUnapproved($principalId);
    
    $project_return = array();
    
    foreach($projects as $project)
    {
        $user = $user_model->load($project->teacher_id); //look up user email based on ->teacher_id //use user model
        $category = $category_model->load($project->category_id);//look up category name based on ->category_id //use category model
	
        $projectResponse = new projectRequest($project->project_id, $project->school_id, $project->teacher_id, $project->title,
                                            $project->description, $project->startDate, $project->endDate, $project->imageUrl,
                                            $user->email,$category->name);
        array_push($project_return, $projectResponse);
    }
    
    $responseObject = new ResponseObject("200", "OK", null, $project_return);
	echo json_encode($responseObject);
}

function controller_GetAllProjectsForTeacher($teacherId)
{
    $project_model = new project_model();
    $user_model = new user_model();
    $category_model = new category_model();
    $projects = $project_model->loadByTeacher($teacherId);
    
    $project_return = array();
    
    foreach($projects as $project)
    {
        $user = $user_model->load($project->teacher_id); //look up user email based on ->teacher_id //use user model
        $category = $category_model->load($project->category_id);//look up category name based on ->category_id //use category model
	
        $projectResponse = new projectRequest($project->project_id, $project->school_id, $project->teacher_id, $project->title,
                                            $project->description, $project->startDate, $project->endDate, $project->imageUrl,
                                            $user->email,$category->name);
        array_push($project_return, $projectResponse);
    }
    
    $responseObject = new ResponseObject("200", "OK", null, $project_return);
	echo json_encode($responseObject);
}

function controller_GetAllProjectsForPrincipal($principalId)
{
    controller_GetAllProjectsForTeacher($principalId);
}

function controller_GetAllProjectsForCommunityMember($communityMemberId)
{
    $project_model = new project_model();
    $user_projects = $project_model->loadByCommunityMember($communityMemberId);
    
    $project_return = array();
    
    foreach ($user_projects as $user_project)
    {
        $project = $project_model->load($user_project->project_id);
        array_push($project_return, $project);
    }
    
    $responseObject = new ResponseObject("200", "OK", null, $project_return);
	echo json_encode($responseObject);
}

function controller_GetAllProjectsWhere($query, $school=null, $teacher=null, $title=null, $category=null)
{
    $project_model = new project_model();
    $user_model = new user_model();
    $category_model = new category_model();

    $project_return = array();
    $projects = $project_model->searchByTitle($query);
    
    foreach($projects as $project)
    {
        $user = $user_model->load($project->teacher_id); //look up user email based on ->teacher_id //use user model
        $category = $category_model->load($project->category_id);//look up category name based on ->category_id //use category model
	
        $projectResponse = new projectRequest($project->project_id, $project->school_id, $project->teacher_id, $project->title,
                                            $project->description, $project->startDate, $project->endDate, $project->imageUrl,
                                            $user->email,$category->name);
        array_push($project_return, $projectResponse);
    }
    
    $responseObject = new ResponseObject("200", "OK", null, $project_return);
	echo json_encode($responseObject);
    
}

function controller_GetSchool($schoolId)
{
	$school_model = new school_model();
	$schoolDB = $school_model->load($schoolId);
	$schoolResponse = new schoolRequest($schoolDB->school_id, $schoolDB->name, $schoolDB->school_type_id, $schoolDB->school_board_id,
										$schoolDB->address, $schoolDB->city, $schoolDB->postal_code, null);
	
	//create response object
	$responseObject = new ResponseObject("200", "OK", null, $schoolResponse);
	echo json_encode($responseObject);
}

function controller_GetAllSchools($schoolBoardId)
{
	$school_model = new school_model();
	$schoolDB = $school_model->loadByBoard($schoolBoardId);
	$schoolResponse = new schoolRequest($schoolDB->school_id, $schoolDB->name, $schoolDB->school_type_id, $schoolDB->school_board_id,
										$schoolDB->address, $schoolDB->city, $schoolDB->postal_code, null);
	
	//create response object
	$responseObject = new ResponseObject("200", "OK", null, $schoolResponse);
	echo json_encode($responseObject);
}

?>