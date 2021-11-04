<?php
session_start();
include('../../config/config.php');

if (isset($_POST['addAnhsanpham'])) {
  $images = $_FILES["anhhanghoa"]['name'];
  $loaihanghoa = $_POST['loaihanghoa'];

  $sql = "INSERT INTO `hinhhanghoa` (`TenHinh`, `MSHH`) VALUES ('" . $images . "', '" . $loaihanghoa . "');";
  $query = mysqli_query($mysqli, $sql);

  if ($query) {
    move_uploaded_file($_FILES["anhhanghoa"]["tmp_name"], "upload/" . $_FILES["anhhanghoa"]["name"]);

    $_SESSION['success'] = "Thêm hình ảnh hàng hóa thành công!";
    header('Location:../../modules/index.php?action=danhsachhanghoa&page=1');
  } else {
    $_SESSION['status'] = "Thêm hình ảnh hàng hóa thành công!";
    header('Location:../../modules/index.php?action=danhsachhinhanhhanghoatest');
  }
}

if (isset($_POST['editanhhanghoa'])) {
  $id = $_GET['idanhhanghoa'];
  $images = $_FILES["anhhanghoa"]['name'];

  if ($images == '') {
    header('Location:../../modules/index.php?action=danhsachhinhanhhanghoatest');
  } else {
    $sql = "UPDATE `hinhhanghoa` SET `TenHinh` = '" . $images . "' WHERE `hinhhanghoa`.`MaHinh` = '" . $id . "'";
    move_uploaded_file($_FILES["anhhanghoa"]["tmp_name"], "upload/" . $_FILES["anhhanghoa"]["name"]);

    $query = mysqli_query($mysqli, $sql);

    if ($query) {
      $_SESSION['success'] = "Sửa hình ảnh hàng hóa thành công !!!";
      header('Location:../../modules/index.php?action=danhsachhinhanhhanghoatest');
    } else {
      $_SESSION['status'] = "Sửa hình ảnh hàng hóa thất bại !!!";
      header('Location:../../modules/index.php?action=danhsachhinhanhhanghoatest');
    }
  }
}
