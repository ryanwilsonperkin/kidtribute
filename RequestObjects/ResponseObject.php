<?php
	class ResponseObject
	{
		public $status;
		public $statusMessage;
		public $errors;
		public $results;
		
		function __construct($status=null, $statusMessage=null, $errors=null, $results=null)
		{
			$this->status = $status;
			$this->statusMessage = $statusMessage;
			$this->errors = $errors;
			$this->results = $results;
		}
	}
?>