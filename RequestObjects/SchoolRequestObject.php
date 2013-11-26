<?php
	class schoolRequest
	{
		public $id;
		public $name;
		public $type;
		public $schoolBoard;
		public $streetAddress;
		public $city;
		public $postalCode;
		public $donationUrl;
		
		function __construct($id=null, $name=null, $type=null, $schoolBoard=null,
							 $streetAddress=null, $city=null, $postal_code=null, $donationUrl=null)
		{
			$this->id =	$id;
			$this->name = $name;
			$this->type = $type;
			$this->schoolBoard = $schoolBoard;
			$this->streetAddress = $streetAddress;
			$this->city = $city;
			$this->postalCode = $postal_code;
			$this->donationUrl = $donationUrl;
		}
	}
?>