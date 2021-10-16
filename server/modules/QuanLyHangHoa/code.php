<?php
session_start();
include('../../config/config.php');


if (isset($_POST['addsanpham'])) {
  $tenhanghoa = $_POST['tenhanghoa'];
  $quycach = $_POST['quycach'];
  $gia = $_POST['gia'];
  $soluong = $_POST['soluong'];
  $loaihanghoa = $_POST['loaihanghoa'];
  $duongdananh = $_POST['duongdananh'];

  //them
  $sql_them = "INSERT INTO `hanghoa` ( `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES ('" . $tenhanghoa . "', '" . $quycach . "', '" . $gia . "', '" . $soluong . "', '" . $loaihanghoa . "')";
  $query = mysqli_query($mysqli, $sql_them);

  if ($query) {
    $_SESSION['success'] = "Thêm hàng hóa thành công, <a href='../modules/index.php?action=themhinhanhhanghoatest'>Click để thêm hình ảnh hàng hóa</a href=''> !!!";
    header('Location:../../modules/index.php?action=themhanghoa');
  } else {
    $_SESSION['status'] = "Thêm hàng hóa thất bại !!!";
    header('Location:../../modules/index.php?action=themhanghoa');
  }
} else if (isset($_POST['edithanghoa'])) {
  $id = $_GET['idhanghoa'];;
  $tenhanghoa = $_POST['tenhanghoa'];
  $quycach = $_POST['quycach'];
  $gia = $_POST['gia'];
  $soluong = $_POST['soluong'];
  $loaihanghoa = $_POST['loaihanghoa'];
  $duongdananh = $_POST['duongdananh'];

  //sửa
  $sql_sua = "UPDATE `hanghoa` SET `TenHH` = '" . $tenhanghoa . "', `QuyCach` = '" . $quycach . "', `Gia` = '" . $gia . "', `SoLuongHang` = '" . $soluong . "', `MaLoaiHang` = '" . $loaihanghoa . "' WHERE `hanghoa`.`MSHH` = '" . $id . "'";

  $query = mysqli_query($mysqli, $sql_sua);

  if ($query) {
    $_SESSION['success'] = "Sửa hàng hóa thành công !!!";
    header('Location:../../modules/index.php?action=danhsachhanghoa');
  } else {
    $_SESSION['status'] = "Sửa hàng hóa thất bại !!!";
    header('Location:../../modules/index.php?action=suahanghoa');
  }
} else {
  $id = $_GET['idhanghoa'];

  $sql_xoa = "DELETE  FROM `hinhhanghoa` WHERE MSHH = '" . $id . "' ";

  $query = mysqli_query($mysqli, $sql_xoa);

  if ($query) {
    $sql_xoa_hh = "DELETE FROM `hanghoa` WHERE MSHH = '" . $id . "' ";

    $query_hh = mysqli_query($mysqli, $sql_xoa_hh);

    if ($query_hh) {
      $_SESSION['success'] = "Xóa thành công !!!";
      header('Location:../../modules/index.php?action=danhsachhanghoa');
    } else {
      $_SESSION['status'] = "Xóa thất bại !!!";
      header('Location:../../modules/index.php?action=danhsachhanghoa');
    }
    $_SESSION['success'] = "Xóa thành công !!!";
    header('Location:../../modules/index.php?action=danhsachhanghoa');
  } else {
    $_SESSION['status'] = "Xóa thất bại !!!";
    header('Location:../../modules/index.php?action=danhsachhanghoa');
  }
}
