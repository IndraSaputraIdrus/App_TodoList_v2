<?php

require_once __DIR__ . '/config.php';

function queryAllData()
{
  $conn = koneksi();

  $query = 'SELECT * FROM tb_TodoList';
  $result = mysqli_query($conn, $query);

  if (!$result) {
    return false;
  } else {
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }
}
