<?php

include('../../config/config.php');

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

$numPage = 12;
$limit = ($page - 1) * $numPage;

$sql = "SELECT * FROM `chitietdathang` limit $limit, $numPage";
$query = mysqli_query($mysqli, $sql);

$data = [];
while ($row = mysqli_fetch_array($query)) {
  $data[] = $row;
}

echo json_encode($data);
