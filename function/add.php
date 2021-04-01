<?php
session_start();

require_once __DIR__ . '/config.php';

if (isset($_POST['submit'])) {

  if (empty($_POST['add'])) {
    $_SESSION['alert'] = [
      'pesan' => '<strong>Gagal</strong>, isi field terlebih dahulu!',
      'tipe' => 'danger'
    ];

    header("Location: ../index.php");
    exit;
  } else {
    $conn = koneksi();
    $data = mysqli_real_escape_string($conn, $_POST['add']);
    $data = htmlspecialchars($data);
    $data = trim($data);

    $query = 'INSERT INTO tb_TodoList (todo_list) VALUES (?)';
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 's', $data);
      mysqli_stmt_execute($stmt);

      if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['alert'] = [
          'pesan' => 'Todo List <strong>berhasil</strong> ditambahkan',
          'tipe' => 'success'
        ];

        header("Location: ../index.php");
        exit;
      } else {
        $_SESSION['alert'] = [
          'pesan' => 'Todo List <strong>gagal</strong> ditambahkan',
          'tipe' => 'danger'
        ];

        header("Location: ../index.php");
        exit;
      }
    }
  }
}
