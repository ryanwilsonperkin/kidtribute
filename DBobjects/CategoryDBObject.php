<?php
	class categoryDB
	{
		public $category_id;
		public $name;
		
		function __construct($category_id=null, $name=null)
		{
			$this->category_id = $category_id;
			$this->name = $name;
		}
	}
?>