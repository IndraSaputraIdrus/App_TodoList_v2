<?php

session_start();
require_once __DIR__ . '/config.php';

if (!isset($_GET['id'])) {
  header('Location: ../index.php');
  exit;
} else {
  $conn = koneksi();
  $id = $_GET['id'];
  $id = mysqli_real_escape_string($conn, $id);
  $id = trim($id);

  $query = 'DELETE FROM tb_TodoList WHERE id = ?';
  $stmt = mysqli_prepare($conn, $query);
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($conn) == 1) {
      $_SESSION['alert'] = [
        'pesan' => 'Todo List berhasil dihapus',
        'tipe' => 'success'
      ];

      header("Location: ../index.php");
      exit;
    } else {
      $_SESSION['alert'] = [
        'pesan' => 'Todo List gagal dihapus',
        'tipe' => 'danger'
      ];

      header("Location: ../index.php");
      exit;
    }
  }
}
