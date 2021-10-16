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

  tr {
    border-radius: 5px;
  }

  table {
    margin: 0 10px;
  }

  tr:nth-child(2n + 1) {
    background-color: rgba(224, 228, 228, 0.5);
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
    background-color: rgb(255, 205, 86);
    padding: 5px 8px;
    border-radius: 5px;
  }

  .list-product {
    margin-left: 20px;
    margin-bottom: 10px;
  }

  .statistics {
    position: relative;
    margin-top: 0px;
    margin-left: 20px;
    margin-bottom: 50px;
  }

  .content {
    position: relative;
    display: flex;
  }

  .content .content__box {
    width: calc((100% - 20px * 3) / 4);
    padding: 15px;
    margin-right: 20px;
  }

  .content .content__box p.title {
    margin-bottom: 15px;
    font-size: 18px;
    text-transform: uppercase;
  }

  .content .content__box p.count {
    margin-bottom: 15px;
    font-size: 16px;
  }

  .approved {
    background-color: rgb(54, 162, 235);
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 7px 25px rgb(54, 162, 235);
  }

  .not-approved-yet {
    background-color: rgb(255, 205, 86);
    color: #333;
    border-radius: 5px;
    box-shadow: 0 7px 25px rgb(255, 205, 86);
  }

  .sales {
    background-color: #20c997;
    color: #333;
    border-radius: 5px;
    box-shadow: 0 7px 25px #20c997;
  }

  .refuse {
    background-color: rgb(255, 99, 132);
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 7px 25px rgb(255, 99, 132);
  }

  .CONTAINER {
    display: flex;
    flex-direction: column;
  }

  .box-char {
    width: 100%;
    height: 320px;
    display: flex;
  }


  .char {
    width: 22%;
    height: 100%;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
    border-radius: 10px;
    margin-left: 20px;
    display: flex;
    align-items: center;
  }

  .char_2 {
    width: 50%;
    margin-left: 145px;
    max-height: 100%;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
    border-radius: 10px;
    padding: 10px;
  }

  .table {
    flex: 1;
    margin-top: 20px;
    overflow: hidden;
    padding: 20px;
    padding-left: 0;
    border-radius: 10px;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
  }
</style>

<main id="main">
  <div class="statistics">
    <div class="content">
      <?php
      $sql_da_duyet = "SELECT COUNT(SoDonDH) AS soluong FROM `dathang` WHERE TrangThaiDH = 1";
      $query_daduyet = mysqli_query($mysqli, $sql_da_duyet);
      ?>
      <?php
      while ($row_da_duyet = mysqli_fetch_array($query_daduyet)) {
      ?>
        <div class="content__box approved">
          <p class="title">Đơn hàng đã duyệt</p>
          <p class="count duyet" data-count-da-duyet="<?php echo $row_da_duyet['soluong'] ?>"><?php echo $row_da_duyet['soluong'] ?></p>
          <small>Đơn đã được nhân viên duyệt</small>
        </div>
      <?php
      }
      ?>
      <?php
      $sql_chua_duyet = "SELECT COUNT(SoDonDH) AS soluong FROM `dathang` WHERE TrangThaiDH = 0";
      $query_chuaduyet = mysqli_query($mysqli, $sql_chua_duyet);
      ?>
      <?php
      while ($row_chua_duyet = mysqli_fetch_array($query_chuaduyet)) {
      ?>
        <div class="content__box not-approved-yet">
          <p class="title">Đơn hàng chưa duyệt</p>
          <p class="count chua" data-count-chua-duyet="<?php echo $row_chua_duyet['soluong'] ?>"><?php echo $row_chua_duyet['soluong'] ?></p>
          <small>Đơn chưa được nhân viên duyệt</small>
        </div>
      <?php
      } ?>
      <?php
      $sql_soluong = "SELECT SoLuong FROM dathang, chitietdathang WHERE dathang.TrangThaiDH = 1 and dathang.SoDonDH = chitietdathang.SoDonDH";
      $query_soluong = mysqli_query($mysqli, $sql_soluong);

      $sql_gia = "SELECT GiaDatHang FROM dathang, chitietdathang WHERE dathang.TrangThaiDH = 1 and dathang.SoDonDH = chitietdathang.SoDonDH";
      $query_gia = mysqli_query($mysqli, $sql_gia);

      (float)$count = 0;
      while (($row_soluong = mysqli_fetch_array($query_soluong)) && ($row_gia = mysqli_fetch_array($query_gia))) {
        $count += (float)$row_soluong['SoLuong'] * (float)$row_gia['GiaDatHang'];
      }
      ?>
      <div class=" content__box sales">
        <p class="title">Doanh thu</p>
        <p class="count tong" data-count-doanh-so="<?php echo $count ?>"><?php echo $count ?></p>
        <small>
          doanh số trong hệ thống
        </small>
      </div>
      <?php
      $sql_bi_huy = "SELECT COUNT(SoDonDH) AS soluong FROM `dathang` WHERE TrangThaiDH = 2";
      $query_bi_huy = mysqli_query($mysqli, $sql_bi_huy);
      ?>
      <?php
      while ($row_bi_huy = mysqli_fetch_array($query_bi_huy)) {
      ?>
        <div class=" content__box refuse">
          <p class="title">Đơn hàng đã bị hủy</p>
          <p class="count huy" data-count-bi-huy="<?php echo $row_bi_huy['soluong'] ?>"><?php echo $row_bi_huy['soluong'] ?></p>
          <small>Đơn đã bị nhân viên hủy</small>
        </div>
      <?php
      } ?>
    </div>
  </div>
  <?php
  $sql_lietke_dathang = "SELECT * FROM `dathang`, `khachhang` WHERE khachhang.MSKH = dathang.MSKH AND dathang.TrangThaiDH = '0' ORDER BY dathang.SoDonDH DESC";
  $query_lietke_dathang = mysqli_query($mysqli, $sql_lietke_dathang);
  ?>

  <div class="CONTAINER">
    <div class=" box-char">
      <div class="char">
        <canvas id="myChart"></canvas>
      </div>
      <div class="char_2">
        <canvas id="myChart_2"></canvas>
      </div>
    </div>
    <div class="table">
      <h3 class="list-product">Danh sách đơn hàng chưa duyệt: </h3>
      <table style="width:100%">
        <tr>
          <td colspan="4" style="border:none !important;padding:0 !important;">
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
          </td>
        </tr>
        <tr>
          <th>Id</th>
          <th>Tên Khách Hàng</th>
          <th>Ngày Đặt Hàng</th>
          <th>Ngày Giao Hàng</th>
          <th>Trạng Thái Đặt Hàng</th>
          <th>Nhân viên chỉnh sửa</th>
          <th style="width:80px">Quản lý</th>
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
    </div>

  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const chuaDuyet = document.querySelector('.chua').getAttribute('data-count-chua-duyet')
  const daDuyet = document.querySelector('.duyet').getAttribute('data-count-da-duyet')
  const doanhSo = document.querySelector('.tong').getAttribute('data-count-doanh-so')
  const biHuy = document.querySelector('.huy').getAttribute('data-count-bi-huy')
  console.log(daDuyet, chuaDuyet, doanhSo, biHuy);
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];


  const data = {
    labels: [
      'chưa duyệt',
      'đã duyệt',
      'bị hủy',
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [chuaDuyet, daDuyet, biHuy],
      backgroundColor: [

        'rgb(255, 205, 86)',
        'rgb(54, 162, 235)',
        'rgb(255, 99, 132)',
      ],
      hoverOffset: 4
    }]
  };
  const config = {
    type: 'pie',
    data: data,
  };
  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<script>
  var ctx = document.getElementById('myChart_2');
  var myChart_2 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
      datasets: [{
        label: 'Doanh thu từng tháng',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>