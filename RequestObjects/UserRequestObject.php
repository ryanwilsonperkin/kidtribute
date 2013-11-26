<?php
	class userRequest
	{
		public $id;
		public $schoolId;
		public $userType;
		public $email;
		public $password;
		public $name;
		public $title;
		public $skills;
		public $isVetted;
		public $bio;
		public $associatedProjects;
		public $imageUrl;
        public $username;
		
		function __construct($id=null, $school=null, $userType=null, $email=null, $password=null, $name=null,
		$title=null, $skills=null, $isVetted=null, $bio=null, $associatedProjects=null, $imageUrl=null, $username=null)
		{
			$this->id = $id;
			$this->schoolId =	$school;
			$this->userType = $userType;
			$this->email = $email;
			$this->password = $password;
			$this->name = $name;
			$this->title = $title;
			$this->skills = $skills;
			$this->isVetted = $isVetted;
			$this->bio = $bio;
			$this->associatedProjects = $associatedProjects;
			$this->imageUrl = $imageUrl;
            $this->username = $username;
		}
	}
?>