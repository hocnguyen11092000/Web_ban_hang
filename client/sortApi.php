<?php
include('../server/config/config.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

if ($_GET['price'] == 'desc') {

  $sql = "SELECT * FROM `hanghoa`,`hinhhanghoa` WHERE MaLoaiHang = '" . $id . "' and hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.Gia DESC";
  $query = mysqli_query($mysqli, $sql);
  $data = [];
  while ($row = mysqli_fetch_array($query)) {
    $data[] = $row;
  }

  echo json_encode($data);
}

if ($_GET['price'] == 'asc') {

  $sql = "SELECT * FROM `hanghoa`,`hinhhanghoa` WHERE MaLoaiHang = '" . $id . "' and hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.Gia ASC";
  $query = mysqli_query($mysqli, $sql);
  $data = [];
  while ($row = mysqli_fetch_array($query)) {
    $data[] = $row;
  }

  echo json_encode($data);
}
