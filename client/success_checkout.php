<?php
include('../server/config/config.php');
$tenkhachhang = '';
$query_danh_sach_don_hang = '';
if (isset($_GET['tenkhachhang'])) {
  $tenkhachhang = trim($_GET['tenkhachhang']);

  $sql_ma_khach_hang = "SELECT MSKH FROM `khachhang` WHERE HoTenKH = '" . $tenkhachhang . "'";
  $query_ma_khach_hang = mysqli_query($mysqli, $sql_ma_khach_hang);
  $row_ma_khach_hang = [];
  while ($row =  mysqli_fetch_array($query_ma_khach_hang)) {
    $row_ma_khach_hang[] = $row;
  }

  $idList = [];
  foreach ($row_ma_khach_hang as $item) {
    array_push($idList, $item[0]);
  }

  $idList = implode(',', $idList);


  $sql_danh_sach_don_hang = "SELECT * FROM chitietdathang, hanghoa, dathang, hinhhanghoa WHERE hanghoa.MSHH = chitietdathang.MSHH AND chitietdathang.SoDonDH = dathang.SoDonDH AND hanghoa.MSHH = hinhhanghoa.MSHH AND dathang.MSKH IN ($idList)";
  $query_danh_sach_don_hang = mysqli_query($mysqli, $sql_danh_sach_don_hang);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanh toán thành công</title>
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="icon" href="../images/logo.png">
  <link rel="stylesheet" href="./css/style.css">
  <style>
    .checkout-info {
      margin-top: 50px;
      background-color: #fff;
      box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
      border-radius: 10px;
      padding: 20px;
    }

    h2 {
      font-weight: 500;
      margin: 10px 0;

    }

    h3.contact {
      font-weight: 500;
      font-size: 14px;
      margin-bottom: 20px;
      color: rgb(255, 99, 132);
    }

    #success-main {
      min-height: 642px !important;
    }

    .watch-order-detail {
      display: inline-block;
      padding: 8px 12px;
      color: #fff;
      background-color: #20c997;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
    }

    .login-client {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translate(-50%, -140px);
      width: 400px;
      height: 140px;
      background-color: #fff;
      z-index: 10;
      border-radius: 5px;
      box-shadow: 0px 7px 25px rgba(0 0 0 / 8%);
      opacity: 0;
      visibility: hidden;
      transition: 0.3s ease;
    }

    .login-client.active {
      opacity: 1;
      visibility: visible;
      transform: translate(-50%, 0px);
    }

    .form-group {
      padding: 20px;
    }

    .form-group label {
      display: inline-block;
      font-size: 14px;
    }

    .form-group input {
      margin-left: 15px;
      padding: 10px 12px;
      border-radius: 5px;
      border: 1px solid #ccc;
      outline: none;
      font-size: 13px;
    }

    .form-group .btn-search-customer {
      border: 1px solid transparent;
      border-radius: 5px;
      padding: 8px 10px;
      color: #fff;
      background-color: rgb(54, 162, 235);
      cursor: pointer;
    }

    .blur {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #333;
      opacity: 0;
      visibility: hidden;
      z-index: 0;
    }

    .blur.active {
      opacity: 0.3;
      visibility: visible;
      z-index: 9;
    }

    body {
      overflow-x: hidden;
    }

    table {
      width: 100%;
    }

    table,
    tr,
    th,
    td {
      text-align: center;
      border: none;
      border-collapse: collapse;
      font-size: 14px;
    }

    img {
      max-width: 60px;
      object-fit: cover;
    }

    tr,
    td {
      padding: 10px;
    }

    .img {
      max-width: 100px;
    }

    .back {
      text-decoration: none;
      padding: 8px 12px;
      background-color: rgb(54, 162, 235);
      color: #fff;
      border-radius: 5px;
      margin: 10px 0;
      display: inline-block;
      border: 1px solid;
    }

    .table-checkout {
      padding: 10px;
      box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
      background-color: #fff;
      margin-top: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
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

    .order {
      opacity: 0;
      visibility: hidden;
      transition: 0.8s ease;
      transform: translateY(-150px);
    }
  </style>
</head>

<body>
  <?php
  include('./header.php')
  ?>
  <main id="success-main">
    <div class="grid wide">
      <div class="row">
        <div class="checkout-info col l-12 m-12 c-12">
          <div class="thanks">
            <h2>ĐẶT HÀNG THÀNH CÔNG. Cám ơn bạn đã đặt hàng từ shop của chúng tôi</h2>
            <h3 class="contact">Mọi thắc mắc liên hệ đến hotline: 036363636</h3>
          </div>
          <div class="status">
            <span class="watch-order-detail">Xem đơn hàng đã đặt</span>
          </div>
        </div>
      </div>
    </div>
    <div class="login-client">
      <form action="" method="GET">
        <div class="form-group">
          <label for="">Tên Khách Hàng: </label>
          <input name="tenkhachhang" type="text" placeholder="Nhập tên...">
        </div>
        <div class="form-group" style="text-align: right; padding-top:5px">
          <button class="btn-search-customer" type="submit">Tìm kiếm</button>
        </div>
      </form>
    </div>
    <div class="blur"></div>
    <div class="grid wide order">
      <div class="row">
        <div class="table-checkout col l-12 m-12 c-12">
          <h2 style="font-weight: 500; margin:10px">Danh sách đơn hàng: </h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Số đơn đặt hàng: </th>
                <th class="img">Ảnh hàng hóa</th>
                <th class="name">Tên hàng hóa</th>
                <th>Price</th>
                <th>Num</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($query_danh_sach_don_hang) {
                while ($row_danh_sach_dơn_hang = mysqli_fetch_array($query_danh_sach_don_hang)) {
              ?>
                  <tr>
                    <td><?php echo $row_danh_sach_dơn_hang['SoDonDH'] ?></td>
                    <td><img src="../images/<?php echo $row_danh_sach_dơn_hang['TenHinh'] ?>" alt=""></td>
                    <td><?php echo $row_danh_sach_dơn_hang['TenHH'] ?></td>
                    <td><?php echo $row_danh_sach_dơn_hang['GiaDatHang'] ?></td>
                    <td><?php echo $row_danh_sach_dơn_hang['SoLuong'] ?></td>
                    <td><?php
                        $trang_thai = $row_danh_sach_dơn_hang['TrangThaiDH'];
                        if ($trang_thai == '0') {
                          echo '<span class="await">Đang chờ duyệt</span>';
                        } elseif ($trang_thai == '1') {
                          echo '<span class="succ">Đã duyệt</span>';
                        } else {
                          echo '<span class="err">Đã bị hủy</span>';
                        } ?></td>
                  </tr>


              <?php
                }
              } ?>
            </tbody>
          </table>
          <p style="color: rgb(255, 99, 132); font-size: 20px;text-align:right;margin-top:20px" id="total_money"></p>
          <div style="text-align: right"><a href="index.php" class="back">Tiếp tục mua sắm</a></div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include('./footer.php');
  ?>
</body>

<script>
  const watchOrderDetail = document.querySelector('.watch-order-detail')

  watchOrderDetail.onclick = () => {
    document.querySelector('.login-client').classList.toggle('active')
    document.querySelector('.blur').classList.toggle('active')
  }

  const blur = document.querySelector('.blur')

  blur.onclick = function() {
    this.classList.remove('active');
    document.querySelector('.login-client').classList.remove('active')
  }

  if (window.location.href.includes('?tenkhachhang=')) {
    const order = document.querySelector('.order')

    Object.assign(order.style, {
      opacity: '1',
      visibility: 'visible',
      transform: 'translateY(0)'
    })
  }
</script>

</html>