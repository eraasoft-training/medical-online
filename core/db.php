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