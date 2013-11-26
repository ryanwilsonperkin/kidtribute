<?php
	class schoolDB
	{
		public $school_id;
		public $school_board_id;
		public $school_type_id;
		public $name;
		public $address;
		public $city;
		public $postal_code;
		
		function __construct($school_id=null, $school_board_id=null, $school_type_id=null, $name=null,
		$address=null, $city=null, $postal_code=null)
		{
			$this->school_id =	$school_id;
			$this->school_board_id = $school_board_id;
			$this->school_type_id = $school_type_id;
			$this->name = $name;
			$this->address = $address;
			$this->city = $city;
			$this->postal_code = $postal_code;
		}
	}
?>