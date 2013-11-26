<?php
	class userDB
	{
		public $user_id;
		public $school_id;
		public $user_type_id;
		public $email;
		public $password;
		public $name;
		public $title;
		public $isVetted;
		public $bio;
		public $imageUrl;

		function __construct($user_id=null, $school_id=null, $user_type_id=null, $email=null, $password=null, $name=null,
		$title=null, $isVetted=null, $bio=null, $imageUrl=null)
		{
			$this->user_id = $id;
			$this->school_id =	$type;
			$this->user_type_id = $user_type_id;
			$this->email = $email;
			$this->password = $password;
			$this->name = $name;
			$this->title = $title;
			$this->isVetted = $isVetted;
			$this->bio = $bio;
			$this->imageUrl = $imageUrl;
		}
	}
?>