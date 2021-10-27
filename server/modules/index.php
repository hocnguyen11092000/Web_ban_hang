<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="icon" href="../../images/logo.png">
  <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <style>
    .loadding {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #fff;
      z-index: 10;
      display: flex;
      justify-content: center;
      align-items: center;
      /* display: none; */
    }

    .box {
      position: relative;
      width: 50px;
      height: 50px;
      animation: rotatBx 10s linear infinite;
    }

    @keyframes rotatBx {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .box .circle {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #38c1ff;
      border-radius: 50%;
      animation: animate 2s linear infinite;
    }

    .box .circle:nth-child(2) {
      background: #ff3378;
      animation-delay: -1s;
    }

    @keyframes animate {
      0% {
        transform: scale(1);
        transform-origin: left;
      }

      50% {
        transform: scale(0);
        transform-origin: left;
      }

      50.01% {
        transform: scale(0);
        transform-origin: right;
      }

      100% {
        transform: scale(1);
        transform-origin: right;
      }
    }

    .loadding h2 {
      position: fixed;
      top: 57%;
      left: 47%;
      font-size: 20px;
      font-weight: 400;
      letter-spacing: 4px;
      color: #444;
    }
  </style>
  <title>index</title>
</head>

<body>
  <div class="loadding">
    <div class="box">
      <div class="circle"></div>
      <div class="circle"></div>
    </div>
    <h2>Loading...</h2>
  </div>
  <div class="container">
    <?php
    require_once('../config/config.php');
    include('sideBar.php');
    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'themhanghoa') {
        include('./QuanLyHangHoa/add.php');
      } elseif ($_GET['action'] == 'suahanghoa') {
        include('./QuanLyHangHoa/edit.php');
      } elseif ($_GET['action'] == 'danhsachhanghoa') {
        include('./QuanLyHangHoa/list.php');
      } elseif ($_GET['action'] == 'themhinhanhhanghoatest') {
        include('./QuanLyAnhHangHoa_copy/add.php');
      } else if ($_GET['action'] == 'danhsachhinhanhhanghoatest') {
        include('./QuanLyAnhHangHoa_copy/list.php');
      } else if ($_GET['action'] == 'suaanhhanghoatest') {
        include('./QuanLyAnhHangHoa_copy/edit.php');
      } else if ($_GET['action'] == 'themloaihanghoa') {
        include('./QuanLyLoaiHangHoa/add.php');
      } else if ($_GET['action'] == 'danhsachloaihanghoa') {
        include('./QuanLyLoaiHangHoa/list.php');
      } else if ($_GET['action'] == 'sualoaihanghoa') {
        include('./QuanLyLoaiHangHoa/edit.php');
      } else if ($_GET['action'] == 'themnhanvien') {
        include('./QuanLyNhanVien/add.php');
      } else if ($_GET['action'] == 'danhsachnhanvien') {
        include('./QuanLyNhanVien/list.php');
      } else if ($_GET['action'] == 'suanhanvien') {
        include('./QuanLyNhanVien/edit.php');
      } else if ($_GET['action'] == 'suadathang') {
        include('./QuanLyDatHang/edit.php');
      } else if ($_GET['action'] == 'danhsachtatcadonhang') {
        include('./QuanLyDatHang/listAll.php');
      } else if ($_GET['action'] == 'chitietdathang') {
        include('./QuanLyDatHang/order-detail.php');
      } else if ($_GET['action'] == 'diachikhachhang') {
        include('./QuanLyDatHang/customer-address.php');
      }
    } else {
      include('./QuanLyDatHang/list.php');
    }
    ?>
  </div>
  <script src="./main.js"></script>
  <script>
    const loadding = document.querySelector('.loadding')
    setTimeout(function() {
      loadding.style.display = 'none'
    }, 400)
    const noti = document.querySelector('.noti_success')
    noti && (setTimeout(() => {
      noti.style.display = 'none'
    }, 5000))

    const noti_err = document.querySelector('.noti_error')
    noti_err && (setTimeout(() => {
      noti_err.style.display = 'none'
    }, 5000))
  </script>
</body>

</html>