<?php

include_once dirname(__FILE__) . '/../RequestObjects/UserRequestObject.php';
include_once dirname(__FILE__) . '/../DBobjects/UserDBObject.php';
include_once dirname(__FILE__) . '/db_model.php';

class user_model extends db
{
	function load($id=-1)
	{
		$query = "SELECT * FROM `Users` WHERE `user_id`=" . $id;
		$result = mysql_query($query) or die(mysql_error());
        $result = _parse_result($result);
        $user_object = new userDB();
        return _convert_to_object($result, $user_object);
	}

	function load_user_type($usertype_id)
	{
		$query = "Select * FROM 'UserTypes' WHERE `user_type_id`=".$usertype_id;
		$result = mysql_query($query) or die(mysql_error());
		$result = _parse_result($result);
		return $result['name'];
	}

	function load_from_username($username)
	{
		$query = "SELECT * FROM `Users` WHERE `username`='" . $username ."';";
		$result = mysql_query($query) or die(mysql_error());
        $result = _parse_result($result);
        $user_object = new userDB();
        return _convert_to_object($result, $user_object);
	}

	function create_user($user_db)
	{
		$query = "INSERT INTO `Users` (school_id, user_type_id, email, password, name, title, isVetted, bio, imageUrl, username)
                  VALUES (" . $user_db->school_id . ",
                          " . $user_db->user_type_id .",
                          '". $user_db->email ."',
                          '". $user_db->password ."',
                          '". $user_db->name ."',
                          '". $user_db->title ."',
                          " . $user_db->isVetted .",
                          '". $user_db->bio ."',
                          '". $user_db->imageUrl ."',
                          '". $user_db->username ."')";
		$result = mysql_query($query) or die(mysql_error());
		$result = $this->load(mysql_insert_id());
		return $result;
	}

    function update_user($user_db) {
        $query = "  UPDATE `Users`
                    SET    `school_id` = " . $user_db->school_id . ",
                           `user_type_id` = " . $user_db->user_type_id . ",
                           `email` = '" . $user_db->email . "',
                           `password` = '" . $user_db->password . "',
                           `name` = '" . $user_db->name . "',
                           `title` = '" . $user_db->title . "',
                           `isVetted` = '" . $user_db->isVetted . "',
                           `bio` = '" . $user_db->bio . "',
                           `imageUrl` = '" . $user_db->imageUrl . "',
                           `username` = '" . $user_db->username . "',
                    WHERE  `user_id` = " . $user_db->user_id . ";";
        $result = mysql_query($query) or die(mysql_error());
        $result = $this->load($user_db->user_id);
        return $result;
    }
}

?>
