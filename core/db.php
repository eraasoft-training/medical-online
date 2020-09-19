<?php 

$conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


// getOne
function getOne(string $table, string $where): array
{
  global $conn;
  
  $sql = "SELECT * FROM $table WHERE $where LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    return mysqli_fetch_assoc($result);
  } else {
    return [];
  }
}                   

function getAll(string $table): array 
{
  global $conn;
  
  $sql = "SELECT * FROM $table";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    return [];
  }
}

function insert(string $table, array $data) 
{
  global $conn;
  $keys = '';
  $values = '';

  foreach ($data as $key => $value) {
    $keys .= "$key,";
    $values .= "'$value',";
  }

  $keys = substr($keys, 0, -1);
  $values = substr($values, 0, -1);

  $sql = "INSERT INTO $table ($keys) VALUES ($values)";

  return mysqli_query($conn, $sql);
}

function update(string $table, array $data, string $where) 
{
  global $conn;
  $set = '';

  foreach ($data as $key => $value) {
    $set .= "$key = '$value',";
  }

  $set = substr($set, 0, -1);

  $sql = "UPDATE $table SET $set WHERE $where";

  return mysqli_query($conn, $sql);
}

// UPDATE cities set city_name = 'cairo',
// city_is_active = 1,

// where city_id = 