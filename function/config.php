<?php

function koneksi()
{
  $db_host = 'localhost';
  $db_user = 'root';
  $db_pass = '';
  $db_name = 'TodoList';

  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

  if ($conn) {
    return $conn;
  } else {
    echo 'gagal koneksi';
  }
}
