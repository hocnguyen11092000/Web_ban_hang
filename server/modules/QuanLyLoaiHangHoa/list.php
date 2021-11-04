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

  /* table {
    margin-left: 20px;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
  } */

  .BOX {
    margin-left: 20px;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
    padding: 20px;
    border-radius: 5px;
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
    background-color: #fb6e2e;
    padding: 5px 8px;
    border-radius: 5px;
  }

  .delete {
    background-color: rgb(255, 99, 132);
    color: #fff;
    padding: 8px 6px;
    border-radius: 5px;
  }
</style>
<?php
$sql_lietke_loai_hh = "SELECT * FROM `loaihanghoa` WHERE 1";
$query_lietke_loai_hh = mysqli_query($mysqli, $sql_lietke_loai_hh);
?>

<main id="main">
  <h2 style="font-weight: 500;margin:20px">Danh sách loại hàng hóa</h2>
  <div class="BOX">
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
        <th>Tên loại hàng hóa</th>
        <th>Quản lý</th>

      </tr>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_loai_hh)) {
        $i++;
      ?>
        <tr>
          <td style="width: 20px"><?php echo $i ?></td>
          <td><?php echo $row['TenLoaiHang'] ?></td>
          <td>
            <a class="delete" href="QuanLyLoaiHangHoa/code.php?idloaihanghoa=<?php echo $row['MaLoaiHang'] ?>">Xoá</a>
            <a class="edit" href="?action=sualoaihanghoa&idloaihanghoa=<?php echo $row['MaLoaiHang'] ?>">Sửa</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
</main>