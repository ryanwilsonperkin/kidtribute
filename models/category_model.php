<?php

include_once dirname(__FILE__) . '/../DBobjects/CategoryDBObject.php';
include_once dirname(__FILE__) . '/db_model.php';

class category_model extends db 
{
	function load($id=-1)
	{
		$query = "SELECT * FROM `Categories` WHERE `category_id`=$id";
		$result = mysql_query($query) or die(mysql_error());
        $result = _parse_result($result);
        $category_object = new categoryDB();
        return _convert_to_object($result, $user_object);
	}	
   
    function getByName($name)
	{
		$query = "SELECT * FROM `Categories` WHERE `name`= '$name'";
		$result = mysql_query($query) or die(mysql_error());
        $result = _parse_result($result);
        $category_object = new categoryDB();
        return _convert_to_object($result, $user_object);
	}	
}

?>