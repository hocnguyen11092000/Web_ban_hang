<?php
session_start();
include('../../config/config.php');

if (isset($_POST['addloaisanpham'])) {
  $tenloaihanghoa = $_POST['tenloaihanghoa'];

  $sql = "INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES (NULL, '" . $tenloaihanghoa . "')";
  $query = mysqli_query($mysqli, $sql);

  if ($query) {
    $_SESSION['success'] = "Thêm loại hàng hóa thành công";
    header('Location:../../modules/index.php?action=danhsachloaihanghoa');
  } else {
    $_SESSION['status'] = "Thêm loại hàng hóa thất bại";
    header('Location:../../modules/index.php?action=danhsachloaihanghoa');
  }
} else if (isset($_POST['editloaihanghoa'])) {
  $id = $_GET['idloaihanghoa'];
  $tenloaihanghoa = $_POST['tenloaihanghoa'];

  $sql = "UPDATE `loaihanghoa` SET `TenLoaiHang` = '" . $tenloaihanghoa . "' WHERE `loaihanghoa`.`MaLoaiHang` = '" . $id . "'";

  $query = mysqli_query($mysqli, $sql);

  if ($query) {
    $_SESSION['success'] = "Sửa loại hàng hóa thành công";
    header('Location:../../modules/index.php?action=danhsachloaihanghoa');
  } else {
    $_SESSION['status'] = "Sửa loại hàng hóa thất bại";
    header('Location:../../modules/index.php?action=danhsachloaihanghoa');
  }
} else {
  $id = $_GET['idloaihanghoa'];

  $sql = "DELETE FROM `loaihanghoa` WHERE MaLoaiHang = '" . $id . "'";

  $query = mysqli_query($mysqli, $sql);

  if ($query) {
    $_SESSION['success'] = "Xóa loại hàng hóa thành công";
    header('Location:../../modules/index.php?action=danhsachloaihanghoa');
  } else {
    $_SESSION['status'] = "Xóa loại hàng hóa thất bại";
    header('Location:../../modules/index.php?action=danhsachloaihanghoa');
  }
}
