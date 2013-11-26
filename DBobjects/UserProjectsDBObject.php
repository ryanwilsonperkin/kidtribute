<?php
	class userProjectsDB
	{
		public $userprojects_id;
		public $project_id;
		public $user_id;
		
		function __construct($userprojects_id=null, $project_id=null, $user_id=null)
		{
			$this->userprojects_id = $userprojects_id;
			$this->project_id =	$project_id;
			$this->user_id = $user_id;
		}
	}
?>