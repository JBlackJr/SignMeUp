<?php
	class Item
	{
		public $title;
		public $priority;
		public $date;
		
		public function __construct($title, $priority, $date) 
		{
			$this -> title = $title;  		
			$this -> priority = $priority;
			$this -> date = $date;
		}
		public function getTitle()
		{
			return $this -> title;
		}
		public function getPriority()
		{
			return $this -> priority;
		}
		public function getDate()
		{
			return $this -> date;
		}
	}
?>