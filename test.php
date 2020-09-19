<?php 

require_once "app.php";

$data = [
  'city_name' => "cairo",
  'city_is_active' => 1,
];

insert("cities", $data);
