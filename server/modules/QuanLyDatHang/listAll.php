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
    background-color: #fb6e2e;
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

  .err {
    color: #fff !important;
    background-color: rgb(255, 99, 132);
    padding: 5px 8px;
    border-radius: 5px;
  }

  .succ {
    color: #fff !important;
    background-color: rgb(54, 162, 235);
    padding: 5px 8px;
    border-radius: 5px;
  }

  .await {
    color: #fff !important;
    background-color: #ffc107;
    padding: 5px 8px;
    border-radius: 5px;
  }
</style>
<?php
$sql_lietke_dathang = "SELECT * FROM `dathang`, `khachhang` WHERE khachhang.MSKH = dathang.MSKH ORDER BY dathang.SoDonDH DESC";
$query_lietke_dathang = mysqli_query($mysqli, $sql_lietke_dathang);
?>

<main id="main">
  <h2 style="font-weight: 500;margin:20px">Danh sách tất cả đơn hàng: </h2>
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
      <th>Tên Khách Hàng</th>
      <th>Ngày Đặt Hàng</th>
      <th>Ngày Giao Hàng</th>
      <th>Trạng Thái Đặt Hàng</th>
      <th>Nhân viên chỉnh sửa</th>
      <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dathang)) {
      $i++;
    ?>
      <tr>
        <td style="width: 20px">
          <?php echo $i ?>
        </td>
        <td>
          <?php echo $row['HoTenKH'] ?>
        </td>
        <td>
          <?php echo $row['NgayDH'] ?>
        </td>
        <td>
          <?php echo $row['NgayGH'] ?>
        </td>
        <td>
          <?php
          if ($row['TrangThaiDH'] == 0) {
            echo '<span class="await">Chưa Duyệt</span>';
          } else if ($row['TrangThaiDH'] == 1) {
            echo '<span class="succ">Đã Duyệt</span>';
          } else {
            echo '<span class="err">Đã bị hủy</span>';
          }
          ?>
        </td>
        <td>
          <?php
          $sql_get_nv = "SELECT HoTenNV FROM `nhanvien` WHERE MSNV = '" . $row['MSNV'] . "'";
          $query_get_nv = mysqli_query($mysqli, $sql_get_nv);
          $row_get_nv = mysqli_fetch_array($query_get_nv);

          echo $row_get_nv['HoTenNV']
          ?>
        </td>
        <td>
          <a class="edit" href="?action=suadathang&id=<?php echo $row['SoDonDH'] ?>">Sửa</a>
        </td>
      </tr>
    <?php
    }
    ?>

  </table>
</main>