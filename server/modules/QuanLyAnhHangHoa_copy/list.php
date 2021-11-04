<style>
  img {
    width: 60px;
    height: 60px;
    object-fit: cover;
  }

  #main {
    flex: 1;
    height: auto;
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
    height: 30px;
  }

  tr th {
    height: 30px;
    padding: 10px;
  }

  .BOX {
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
    padding: 20px;
    margin-left: 20px;
    border-radius: 5px;
  }

  tr:first-child {
    background-color: #fff !important;
  }

  tr:nth-child(2n + 1) {
    background-color: rgba(224, 228, 228, 0.5);
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
$sql_lietke_hinh_hh = "SELECT hinhhanghoa.MaHinh,hanghoa.TenHH, hinhhanghoa.TenHinh FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hinhhanghoa.MaHinh DESC";
$query_lietke_hinh_hh = mysqli_query($mysqli, $sql_lietke_hinh_hh);
?>

<main id="main">
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
  <h2 style="font-weight: 500;margin:20px">Danh sách ảnh hàng hóa: </h2>
  <div class="BOX">
    <table style="width:100%">
      <tr>
        <th>Id</th>
        <th>Tên hàng hóa</th>
        <th>Hình ảnh</th>
        <th>Quản lý</th>

      </tr>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_hinh_hh)) {
        $i++;
      ?>
        <tr>
          <td style="width: 20px"><?php echo $i ?></td>
          <td><?php echo $row['TenHH'] ?></td>
          <td><img src="../../images/<?php echo $row['TenHinh'] ?>" alt=""></td>
          <td>
            <!-- Không cần chức năng xóa vì khi xóa 1 hàng hóa thì đã viết query để xóa hình ảnh trước rồi -->
            <a class="edit" href="?action=suaanhhanghoatest&idanhhanghoa=<?php echo $row['MaHinh'] ?>">Sửa</a>
          </td>
        </tr>
      <?php
      }
      ?>

    </table>
  </div>
</main>