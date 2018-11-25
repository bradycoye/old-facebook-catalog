<?php
	class reader {
		
		public $vehicle_id;
		public $VIN;
		public $state_of_vehicle;
		public $year;
		public $make;
		public $model;
		public $trim;
		public $title;
		public $body_style;
		public $exterior_color;
		public $mileage.value;
		public $mileage.unit = "MI";
		public $price;
		public $transmission;
		public $drivetrain;
		public $description;
		public $imageUrl;
		public $url;
		public $dealer_name = "Tom O'Brien Chrysler Jeep Dodge Ram - Greenwood";
		public $dealer_phone = "317.534.2233";
		public $postal_code = "46142";
		public $address = "{addr1: '750 US 31 N', city: 'Greenwood', region: 'IN', postal_code: '46142', country: 'US'}";
		public $price;
		public $latitude = 39.6248;
		public $longitude = -86.120;
		private object $query;
		
		function __construct($query) {
			$this->query = $query;
		}
		
	}