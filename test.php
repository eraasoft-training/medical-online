<?php 

require_once "app.php";

$data = [
  'city_name' => "cairooo",
];

update("cities", $data, "city_id = 1");
