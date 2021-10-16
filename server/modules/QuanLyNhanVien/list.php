<style>
  img {
    width: 120px;
    height: 120px;
    object-fit: cover;
  }

  #main {
    flex: 1;
    margin-left: 20px;
  }

  table,
  tr,
  th,
  td {
    border-collapse: collapse;
    text-align: center;
    font-size: 14px;
  }


  td {
    width: 100px;
  }

  table {
    margin-left: 20px;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
  }

  tr:nth-child(2n + 1) {
    background-color: rgba(224, 228, 228, 0.5);
  }

  tr:first-child {
    background-color: #fff;
  }

  th,
  td {
    padding: 15px 0;
  }

  .delete {
    background-color: rgb(255, 99, 132);
    color: #fff;
    padding: 8px 6px;
    border-radius: 5px;
  }

  .edit {
    background-color: #20c997;
    color: #fff;
    padding: 8px 6px;
    border-radius: 5px;
  }
</style>
<?php
$sql_lietke_nhanvien = "SELECT * FROM `nhanvien` WHERE 1";
$query_lietke_nhanvien = mysqli_query($mysqli, $sql_lietke_nhanvien);
?>

<main id="main">
  <h2 style="font-weight: 500;margin:20px;">Danh sách nhân viên: </h2>
  <table style="width:100%">
    <?php

    if (isset($_SESSION['success']) && $_SESSION['success'] != "") {
      echo '<h2 class="noti_success" >' . $_SESSION['success'] . '</h2>';
      unset($_SESSION['success']);
    }
    if (isset($_SESSION['status']) && isset($_SESSION['status']) != "") {
      echo '<h2 class="noti_error">' . $_SESSION['status'] . '</h2>';
      unset($_SESSION['status']);
    }
    ?>
    <tr>
      <th>Id</th>
      <th>Tên Nhân Viên</th>
      <th>Chức Vụ</th>
      <th>Địa Chỉ</th>
      <th>Quản lý</th>

    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_nhanvien)) {
      $i++;
    ?>
      <tr>
        <td style="width: 20px"><?php echo $i ?></td>
        <td><?php echo $row['HoTenNV'] ?></td>
        <td><?php echo $row['ChucVu'] ?></td>
        <td><?php echo $row['DiaChi'] ?></td>
        <td>
          <a class="delete" href="QuanLyNhanVien/code.php?idnhanvien=<?php echo $row['MSNV'] ?>">Xoá</a>
          <a class="edit" href="?action=suanhanvien&idnhanvien=<?php echo $row['MSNV'] ?>">Sửa</a>
        </td>
      </tr>
    <?php
    }
    ?>

  </table>
</main>