<?php

include_once dirname(__FILE__) . '/../DBobjects/SchoolDBObject.php';
include_once dirname(__FILE__) . '/school_model.php';

class school_model extends db 
{
	function load($id=-1)
	{
		$query = "SELECT * FROM Schools WHERE school_id=" . $id.";";
		$result = mysql_query($query) or die(mysql_error());
        $result = _parse_result($result);
        $user_object = new schoolDB();
        return _convert_to_object($result, $user_object);
	}
	
	function loadByBoard($boardId=-1)
	{
		$query = "SELECT * FROM Schools WHERE school_board_id=" . $boardId.";";
		$result = mysql_query($query) or die(mysql_error());
        $result = _parse_result($result);
        $user_object = new schoolDB();
        return _convert_to_object($result, $user_object);
	}
}

?>