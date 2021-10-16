<?php
session_start();
include('../../config/config.php');

if (isset($_POST['editdathang'])) {

  $trangthaidathang = $_POST['trangthaidathang'];
  $MSNV = $_POST['MSNV'];

  $id = $_GET['id'];
  $sql = "UPDATE `dathang` SET `TrangThaiDH` = '" . $trangthaidathang . "' WHERE `dathang`.`SoDonDH` = '" . $id . "'";
  $query = mysqli_query($mysqli, $sql);

  if ($query) {

    $sql_nhanvien_sua = "UPDATE `dathang` SET `MSNV` = '" . $MSNV . "' WHERE `dathang`.`SoDonDH` = '" . $id . "'";
    $query_nhanvien_sua = mysqli_query($mysqli, $sql_nhanvien_sua);

    $_SESSION['success'] = "Chỉnh sửa trạng thái đặt hàng thành công !!!";
    header('Location:../../modules/index.php?action=danhsachtatcadonhang');
  } else {
    $_SESSION['status'] = "Chỉnh sửa trạng thái đặt hàng thất bại !!!";
    header('Location:../../modules/index.php?action=danhsachtatcadonhang');
  }
}
