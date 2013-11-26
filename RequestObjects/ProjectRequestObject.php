<?php
	class projectRequest
	{
		public $id;
		public $schoolId;
		public $userId;
		public $title;
		public $description;
		public $startDate;
		public $endDate;
		public $imageUrl;
		public $category;
        public $userEmail;
        public $isApproved;
		
		function __construct($project_id=null, $school_id=null, $teacher_id=null, $title=null, $description=null,
							$startDate=null, $endDate=null, $imageUrl=null, $user_email=null, $category=null, $approved=null)
		{
			$this->id = $project_id;
			$this->schoolId =	$school_id;
			$this->userId = $teacher_id;
			$this->userEmail = $user_email;
			$this->title = $title;
			$this->description = $description;
			$this->startDate = $startDate; //eg: Date("now")->format("Y-m-d")
			$this->endDate = $endDate;
			$this->imageUrl = $imageUrl;
			$this->category = $category;
            $this->isApproved = $approved;
		}
	}
?>