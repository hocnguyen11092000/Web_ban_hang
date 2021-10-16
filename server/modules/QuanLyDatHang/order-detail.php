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

  h2 {
    margin: 20px;
    font-weight: 600;
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

  .succ {
    color: #fff !important;
    background-color: #20c997;
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
$sql_lietke_chi_tiet_dathang = "SELECT * FROM `chitietdathang`";
$query_lietke_chitiet_dathang = mysqli_query($mysqli, $sql_lietke_chi_tiet_dathang);
?>
<?php
$cart = '[]';
if (isset($_COOKIE['cart'])) {
  $cart = $_COOKIE['cart'];
}
?>

<script type="text/javascript">
  let cartList = JSON.parse('<?php echo $cart ?>')
</script>

<main id="main">
  <h2 style="font-weight: 500;">Danh sách chi tiết đơn hàng:</h2>
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
      <th>Số đơn đặt hàng</th>
      <th>Mã số hàng hóa</th>
      <th>Số lượng</th>
      <th>Giá đặt hàng</th>
      <th>Giảm giá</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_chitiet_dathang)) {
      $i++;
    ?>
      <tr>
        <td style="width: 20px">
          <?php echo $i ?>
        </td>
        <td>
          <?php echo $row['SoDonDH'] ?>
        </td>
        <td>
          <?php echo $row['MSHH'] ?>
        </td>
        <td>
          <?php echo $row['SoLuong'] ?>
        </td>
        <td>
          <?php echo $row['GiaDatHang'] ?>
        </td>
        <td>
          <?php echo $row['GiamGia'] ?>
        </td>
      </tr>
    <?php
    }
    ?>

  </table>
</main>