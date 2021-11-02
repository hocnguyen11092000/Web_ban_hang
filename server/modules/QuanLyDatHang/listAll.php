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
<style>
  .tab__list ul {
    display: flex;
    list-style-type: none;
    padding: 20px 0;
  }

  .tab__list ul>li {
    margin-left: 20px;
    color: #333;
  }

  .tab__list ul>li.active {
    color: rgb(54, 162, 235);
  }

  .tab__list ul>li>a {
    color: inherit;
    font-size: 16px;
  }

  .tab {
    position: relative;
  }

  .tab__content {
    position: absolute;
    width: 100%;
    transform: scale(0);
    transform-origin: center center;
    transition: 0.5s ease;
    opacity: 0;
    visibility: hidden;
  }

  .tab__content.active {
    transform: scale(1);
    opacity: 1;
    visibility: visible;
  }
</style>
<!-- <?php
      $sql_lietke_dathang = "SELECT * FROM `dathang`, `khachhang` WHERE khachhang.MSKH = dathang.MSKH ORDER BY dathang.SoDonDH DESC";
      $query_lietke_dathang = mysqli_query($mysqli, $sql_lietke_dathang);
      ?> -->

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
  <!-- <h2 style="font-weight: 500;margin:20px">Danh sách tất cả đơn hàng: </h2>
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

  </table> -->

  <div class="tab">
    <div class="tab__list">
      <ul>
        <li class="active"><a href="#">Đơn hàng chưa duyệt</a></li>
        <li><a href="#">Đơn hàng đã duyệt</a></li>
        <li><a href="#">Đơn hàng đã bị hủy</a></li>
      </ul>
    </div>
    <div class="tab__content active">
      <?php
      $sql_lietke_chuaduyet = "SELECT * FROM `dathang`, `khachhang` WHERE khachhang.MSKH = dathang.MSKH AND dathang.TrangThaiDH = '0' ORDER BY dathang.SoDonDH DESC";
      $query_lietke_chuaduyet = mysqli_query($mysqli, $sql_lietke_chuaduyet);
      ?>
      <table style="width:100%">

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
        while ($row_chuaduyet = mysqli_fetch_array($query_lietke_chuaduyet)) {
          $i++;
        ?>
          <tr>
            <td style="width: 20px">
              <?php echo $i ?>
            </td>
            <td>
              <?php echo $row_chuaduyet['HoTenKH'] ?>
            </td>
            <td>
              <?php echo $row_chuaduyet['NgayDH'] ?>
            </td>
            <td>
              <?php echo $row_chuaduyet['NgayGH'] ?>
            </td>
            <td>
              <?php
              if ($row_chuaduyet['TrangThaiDH'] == 0) {
                echo '<span class="await">Chưa Duyệt</span>';
              } else if ($row_chuaduyet['TrangThaiDH'] == 1) {
                echo '<span class="succ">Đã Duyệt</span>';
              } else {
                echo '<span class="err">Đã bị hủy</span>';
              }
              ?>
            </td>
            <td>
              <?php
              $sql_get_nv = "SELECT HoTenNV FROM `nhanvien` WHERE MSNV = '" . $row_chuaduyet['MSNV'] . "'";
              $query_get_nv = mysqli_query($mysqli, $sql_get_nv);
              $row_get_nv = mysqli_fetch_array($query_get_nv);

              echo $row_get_nv['HoTenNV']
              ?>
            </td>
            <td>
              <a class="edit" href="?action=suadathang&id=<?php echo $row_chuaduyet['SoDonDH'] ?>">Sửa</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </table>
    </div>
    <div class="tab__content">
      <?php
      $sql_lietke_daduyet = "SELECT * FROM `dathang`, `khachhang` WHERE khachhang.MSKH = dathang.MSKH AND dathang.TrangThaiDH = '1' ORDER BY dathang.SoDonDH DESC";
      $query_lietke_daduyet = mysqli_query($mysqli, $sql_lietke_daduyet);
      ?>
      <table style="width:100%">
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
        while ($row_daduyet = mysqli_fetch_array($query_lietke_daduyet)) {
          $i++;
        ?>
          <tr>
            <td style="width: 20px">
              <?php echo $i ?>
            </td>
            <td>
              <?php echo $row_daduyet['HoTenKH'] ?>
            </td>
            <td>
              <?php echo $row_daduyet['NgayDH'] ?>
            </td>
            <td>
              <?php echo $row_daduyet['NgayGH'] ?>
            </td>
            <td>
              <?php
              if ($row_daduyet['TrangThaiDH'] == 0) {
                echo '<span class="await">Chưa Duyệt</span>';
              } else if ($row_daduyet['TrangThaiDH'] == 1) {
                echo '<span class="succ">Đã Duyệt</span>';
              } else {
                echo '<span class="err">Đã bị hủy</span>';
              }
              ?>
            </td>
            <td>
              <?php
              $sql_get_nv = "SELECT HoTenNV FROM `nhanvien` WHERE MSNV = '" . $row_daduyet['MSNV'] . "'";
              $query_get_nv = mysqli_query($mysqli, $sql_get_nv);
              $row_get_nv = mysqli_fetch_array($query_get_nv);

              echo $row_get_nv['HoTenNV']
              ?>
            </td>
            <td>
              <a class="edit" href="?action=suadathang&id=<?php echo $row_daduyet['SoDonDH'] ?>">Sửa</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </table>
    </div>
    <div class="tab__content">
      <?php
      $sql_lietke_dahuy = "SELECT * FROM `dathang`, `khachhang` WHERE khachhang.MSKH = dathang.MSKH AND dathang.TrangThaiDH = '2' ORDER BY dathang.SoDonDH DESC";
      $query_lietke_dahuy = mysqli_query($mysqli, $sql_lietke_dahuy);
      ?>
      <table style="width:100%">
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
        while ($row_dahuy = mysqli_fetch_array($query_lietke_dahuy)) {
          $i++;
        ?>
          <tr>
            <td style="width: 20px">
              <?php echo $i ?>
            </td>
            <td>
              <?php echo $row_dahuy['HoTenKH'] ?>
            </td>
            <td>
              <?php echo $row_dahuy['NgayDH'] ?>
            </td>
            <td>
              <?php echo $row_dahuy['NgayGH'] ?>
            </td>
            <td>
              <?php
              if ($row_dahuy['TrangThaiDH'] == 0) {
                echo '<span class="await">Chưa Duyệt</span>';
              } else if ($row_dahuy['TrangThaiDH'] == 1) {
                echo '<span class="succ">Đã Duyệt</span>';
              } else {
                echo '<span class="err">Đã bị hủy</span>';
              }
              ?>
            </td>
            <td>
              <?php
              $sql_get_nv = "SELECT HoTenNV FROM `nhanvien` WHERE MSNV = '" . $row_dahuy['MSNV'] . "'";
              $query_get_nv = mysqli_query($mysqli, $sql_get_nv);
              $row_get_nv = mysqli_fetch_array($query_get_nv);

              echo $row_get_nv['HoTenNV']
              ?>
            </td>
            <td>
              <a class="edit" href="?action=suadathang&id=<?php echo $row_dahuy['SoDonDH'] ?>">Sửa</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </div>
</main>

<script>
  const tabList = [...document.querySelectorAll('.tab__list ul li')]
  const content = [...document.querySelectorAll('.tab__content')]
  tabList.forEach(function(item, index) {
    item.onclick = function() {
      document.querySelector('.tab__content.active').classList.remove('active')
      document.querySelector('.tab__list ul li.active').classList.remove('active')
      content[index].classList.add('active')
      this.classList.add('active')
    }
  })
  const contentActive = document.querySelector('.tab__content.active');
  console.log(contentActive.style);
</script>