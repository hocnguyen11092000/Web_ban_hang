<?php
session_start();
include('../server/config/config.php');

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

$numPage = 8;
$limit = ($page - 1) * $numPage;

$sql = "SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.MSHH DESC LIMIT $limit, 8";
$query = mysqli_query($mysqli, $sql);

$data = [];
while ($row = mysqli_fetch_array($query)) {
  $data[] = $row;
}

echo json_encode($data);
