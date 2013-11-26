<?php
	class projectDB
	{
		public $project_id;
		public $school_id;
		public $teacher_id;
		public $category_id;
		public $title;
		public $description;
		public $startDate;
		public $endDate;
		public $imageUrl;
		public $approved;
		
		function __construct($project_id=null, $school_id=null, $teacher_id=null, $category_id=null, $title=null, $description=null,
							$startDate=null, $endDate=null, $imageUrl=null, $approved=null)
		{
			$this->project_id = $project_id;
			$this->school_id =	$school_id;
			$this->teacher_id = $teacher_id;
			$this->category_id = $category_id;
			$this->title = $title;
			$this->description = $description;
			$this->startDate = $startDate; //eg: Date("now")->format("Y-m-d")
			$this->endDate = $endDate;
			$this->imageUrl = $imageUrl;				
			$this->approved = $approved;
		}
	}
?>