<?php

class db {
  protected static $dbh = false;

    function __construct($address='KidTributeDB.db.11714796.hostedresource.com', $username='KidTributeDB', $password='Edgdfnuq29!', $database_name='KidTributeDB')
    {
        $this->connect($address,$username,$password,$database_name);
    }

	function connect($address='KidTributeDB.db.11714796.hostedresource.com', $username='KidTributeDB', $password='Edgdfnuq29!', $database_name='KidTributeDB') {
		mysql_connect($address, $username, $password) or die(mysql_error()); 
		mysql_select_db($database_name) or die(mysql_error());
	}
}

function _create_insert_query($table, $keys,$values){
    $query = 'INSERT INTO `'.$table.'`(';
    foreach ($keys as $key){
        $query .= "`$key`,";
    }
    $query = rtrim($query, ",");
    $query.=") VALUES (";
    foreach ($values as $value){
        if (empty($value)){
            $query .= "NULL,";
        }
        else{
            $query .= "'$value',";
        }
    }
    $query = rtrim($query, ",");
    $query .= ")";
    return $query;
}

function _create_modify_query($table, $keys, $values, $unique_key, $uk_value){
    $num_keys = count($keys);
    $query = 'UPDATE `' . $table . '` SET ';
    for ($x = 0; $x < $num_keys; $x++){
        if (empty($values[$x])){
            $query .= "`$keys[$x]`= NULL,";}
        else{
            $query .= "`$keys[$x]`='$values[$x]',";}
    }
    $query = rtrim($query, ",");
    $query .= " WHERE `$unique_key` = '$uk_value'";
    return $query;
}

function insert_database($table, $inserts) {

    $values = array_map('mysql_real_escape_string', array_values((array)$inserts));
    $keys = array_keys((array)$inserts);
    $query = _create_insert_query($table, $keys,$values);
    return mysql_query($query) or die(mysql_error());
}

function modify_database($table, $modified_object, $unique_key, $uk_value){
    $values = array_map('mysql_real_escape_string', array_values((array)$modified_object));
    $keys = array_keys((array)$modified_object);
    $query = _create_modify_query($table, $keys, $values, $unique_key, $uk_value);
    return mysql_query($query)or die(mysql_error());
}

function delete_database_row($table, $column, $value){
    return mysql_query("DELETE FROM `". $table . "` WHERE `" . $column . "` =" . $value) or die(mysql_error());
}

function _parse_result($result){
    $queryresult = array();
    if (!$result || !mysql_num_rows($result)) {
		return $queryresult;
	}
	$num_fields = mysql_num_fields($result);
    $i = 0;
	
    while ($i < $num_fields)
    {
        $currfield = mysql_fetch_field($result, $i);
        $queryresult[$currfield->name] = mysql_result($result, 0, $currfield->name);
        $i++;
    }
	return $queryresult;
}

function _parse_result_multirow($result){
    $arrayofarrays = array();
    if (mysql_num_rows($result) > 0) {
        while($data = mysql_fetch_array($result)) {
            array_push($arrayofarrays,$data);
        }
    }
    return $arrayofarrays;
}

function _get_entire_table($table_name){
    $result = mysql_query("SELECT * FROM `" . $table_name . "`")or die (mysql_error());
    return _parse_result_multirow($result);
}

function _convert_to_object($result, $object){
    foreach ($result as $key => $value)
    {
        $object->$key = $value;
    }
    return $object;
}

?>