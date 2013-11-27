<?php

include_once dirname(__FILE__) . '/../DBobjects/ProjectDBObject.php';
include_once dirname(__FILE__) . '/../DBobjects/UserProjectsDBObject.php';
include_once dirname(__FILE__) . '/db_model.php';

class project_model extends db 
{
	function load($id=-1)
	{
		$query = "SELECT * FROM `Projects` WHERE `project_id`=" . $id;
		$result = mysql_query($query) or die(mysql_error());
        $result = _parse_result($result);
        $user_object = new projectDB();
        return _convert_to_object($result, $user_object);
	}
	
    function loadByTeacher($teacherId)
    {
        $query = "SELECT * FROM `Projects` WHERE `teacher_id`=" . $teacherId;
		$result = mysql_query($query) or die(mysql_error());
        $table_values = _parse_result_multirow($result);
        
        $multirow_array = array();
		
        foreach($table_values as $row)
        {
            $project = $this->_create_project_object($row);
            array_push($multirow_array, $project);
        }
	    return $multirow_array;
    }
	
	function loadByPricipalUnapproved($principalId)
    {
        $query = "SELECT * FROM `Projects` WHERE `teacher_id`=" . $principalId." AND `approved` = 0;";
		$result = mysql_query($query) or die(mysql_error());
        $table_values = _parse_result_multirow($result);
        
        $multirow_array = array();
		
        foreach($table_values as $row)
        {
            $project = $this->_create_project_object($row);
            array_push($multirow_array, $project);
        }
	    return $multirow_array;
    }
    
    function loadByCommunityMember($communityMemberId)
    {
        $query = "SELECT * FROM `UserProjects` WHERE `used_id`=" . $communityMemberId; //TODO: change used_id to user_id with a freaking r
		$result = mysql_query($query) or die(mysql_error());
        $table_values = _parse_result_multirow($result);
        
        $multirow_array = array();
		
        foreach($table_values as $row)
        {
            $project = $this->_create_user_project_object($row);
            array_push($multirow_array, $project);
        }
	    return $multirow_array;
    }
	
	function loadByProjectId($projectId)
    {
        $query = "SELECT * FROM `UserProjects` WHERE `project_id`=" . $projectId; //TODO: change used_id to user_id with a freaking r
		$result = mysql_query($query) or die(mysql_error());
        $table_values = _parse_result_multirow($result);
        
        $multirow_array = array();
		
        foreach($table_values as $row)
        {
            $project = $this->_create_user_project_object($row);
            array_push($multirow_array, $project);
        }
	    return $multirow_array;
    }
	
    
    function searchByTitle($title)
    {
        $query = "SELECT * FROM `Projects` WHERE `title` LIKE '%$title%' AND `approved` = 1";
		$result = mysql_query($query) or die(mysql_error());
        $table_values = _parse_result_multirow($result);
        
        $multirow_array = array();
		
        foreach($table_values as $row)
        {
            $project = $this->_create_project_object($row);
            array_push($multirow_array, $project);
        }
	    return $multirow_array;
    }
    
	function create_project($project)
	{
		
		if ($project->title ==null)
			$project->title="null";
		
		if ($project->description == null)
			$project->description = "null";
		
		if ($project->startDate == null)
			$project->startDate = "null";
		
		if ($project->endDate == null)
			$project->endDate = "null";
		
		if ($project->imageUrl == null)
			$project->imageUrl = "null";
		
		
		$query = "INSERT INTO `Projects` (school_id, teacher_id, category_id, title, description, startDate, endDate, imageUrl, approved) VALUES ($project->school_id, $project->teacher_id, $project->category_id, '$project->title', '$project->description', CAST ('$project->startDate' AS DATETIME), CASE('$project->endDate' AS DATETIME), '$project->imageUrl', $project->approved)";
		echo $query;
		$result = mysql_query($query);
		$result = $this->load(mysql_insert_id()); //loads the newly created project from DB so we can return it.
		return $result;
	}
	
	function update_project($project)
	{
        $result =  modify_database("Projects", $project, "project_id", $project->project_id);
		$result = $this->load($project->project_id); //loads the newly created project from DB so we can return it.
		return $result;
	}
	
	function add_comm_member($projectId, $userId)
	{
		$query = "INSERT INTO UserProjects (project_id, used_id) VALUES (".$projectId. ", ".$userId.");";
		$result = mysql_query($query) or die(mysql_error());
		if(!$result)
		{
			return false;
		}

		return $result;
	}
    
    function _create_project_object($row)
	{
		$project = new projectDB($row['project_id'], $row['school_id'], $row['teacher_id'],
					$row['category_id'], $row['title'], $row['description'], $row['startDate'],
					$row['endDate'], $row['imageUrl'], $row['approved']);
		return $project;
	}
    
    function _create_user_project_object($row)
    {
        $project = new userProjectsDB($row['userprojects_id'], $row['project_id'], $row['user_id']);
		return $project;
    }
}

?>
