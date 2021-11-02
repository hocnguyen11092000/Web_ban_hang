<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="icon" href="../images/logo.png">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="stylesheet" href="./css/style.css">
  <style type="text/css">
    body {
      overflow-x: hidden;
    }

    table {
      width: 100%;
    }

    .main {
      min-height: 700px;
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

    .name,
    .handle,
    .img {
      max-width: 100px;
    }

    .form {
      margin-top: 50px !important;
      padding-bottom: 50px;
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

    .back:hover {
      color: blue;
      background-color: #fff;
      transition: 0.3s;
      color: rgb(54, 162, 235);
      border: 1px solid rgb(54, 162, 235);
    }

    .noti_success {
      padding: 10px;
      font-weight: 400;
      color: #fff;
      max-width: 500px;
      border-radius: 5px;
      margin: 20px 0;
      background-color: rgb(20, 138, 20);
    }

    .noti_error {
      padding: 10px;
      font-weight: 400;
      color: #fff;
      max-width: 500px;
      border-radius: 5px;
      margin: 20px 0;
      background-color: rgb(221, 43, 43);
    }

    .table-checkout {
      padding: 10px;
      box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
      background-color: #fff;
      margin-top: 20px;
      border-radius: 10px;
    }

    tr:nth-child(2n + 1) {
      background-color: rgb(240, 240, 240);
    }

    thead {
      height: 40px;
    }

    thead tr {
      background-color: #fff !important;
    }

    .form-contaner {
      background-color: #fff;
      border-radius: 10px !important;
      box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      min-width: 150px;
      display: inline-block;
    }

    .form-group input {
      width: 250px;
      border: 1px solid #ccc;
      outline: none;
      border-radius: 2px;
      padding: 6px 10px;
    }

    .btn-checkout {
      font-size: 16px;
      padding: 6px 8px;
      outline: none;
      border: none;
      background-color: #20c997;
      color: #fff;
      border-radius: 5px;
      margin-top: 10px;
      cursor: pointer;
    }

    @keyframes bottom-to-top {
      0% {
        opacity: 0;
        transform: translateY(150px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .grid.wide.table,
    .grid.wide.form {
      opacity: 0;
      animation: bottom-to-top 1s forwards;
      transition: 0.3s ease;
    }

    .grid.wide.form {
      animation-delay: 0.5s;
    }
  </style>

  <?php
  include('./header.php')
  ?>
  <?php

  // session_start();
  $cart = '[]';
  if (isset($_COOKIE['cart'])) {
    $cart = $_COOKIE['cart'];
  }
  ?>

  <script type="text/javascript">
    let cartList = JSON.parse('<?php echo $cart ?>')

    $(function() {
      let total = 0
      for (let i = 0; i < cartList.length; i++) {
        total += cartList[i].num
      }
      $('#cart_num').html(total)
    })
  </script>
  <title>Checkout page</title>
</head>

<body>

  <div class="grid wide">
    <div class="row">
      <div class="col l-12 m-12 c-12">
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
      </div>
    </div>
  </div>
  <div class="grid wide table">
    <div class="row">
      <div class="table-checkout col l-12 m-12 c-12">
        <h2 style="font-weight: 500; margin:10px">Danh sách đơn hàng: </h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>STT</th>
              <th class="img">Ảnh hàng hóa</th>
              <th class="name">Tên hàng hóa</th>
              <th>Price</th>
              <th>Num</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="result">
          </tbody>
        </table>
        <p style="color: rgb(255, 99, 132); font-size: 20px;text-align:right;margin-top:20px" id="total_money"></p>
        <div style="text-align: right"><a href="index.php" class="back">Tiếp tục mua sắm</a></div>
      </div>
    </div>
  </div>
  <div class="grid wide form">
    <div class="row">
      <div class="col l-5 m-4 c-12">
        <div class="form-contaner" style="background: #fff; border-radius: 5px; padding:20px;box-shadow:0 7px 25px rgb(0 0 0 / 8%)">
          <h3 style="font-weight: 500;margin-bottom:20px">Thông tin đặt hàng: </h3>
          <form method="POST" action="code.php">
            <div class="form-group">
              <label>Họ tên</label>
              <input required type="text" name="hoten">
            </div>
            <div class="form-group">
              <label>Tên công ty</label>
              <input required type="text" id="" name="tencongty">
            </div>
            <div class="form-group">
              <label>Địa chỉ</label>
              <input required type="text" id="" name="diachi">
            </div>
            <div class="form-group">
              <label>Số điện thoại</label>
              <input required type="text" id="" name="sodienthoai">
            </div>
            <div class="form-group">
              <label>Số Fax</label>
              <input required type="text" id="" name="sofax">
            </div>
            <div style="text-align:right"><button class="btn-checkout" name=" checkout">Checkout</button></div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  include('./footer.php');
  ?>

  <script>
    // js for hover nav
    const nav_item = [...document.querySelectorAll('.header-item')]
    const line = document.querySelector('.line')

    nav_item.forEach(function(item, index) {
      item.onmouseover = () => {
        line.style.left = item.offsetLeft + 'px'
        line.style.width = item.offsetWidth + 'px'
      }
      item.onmouseout = () => {
        line.style.width = 0 + 'px'
        line.style.left = '207px'
      }
    })
  </script>

  <script type="text/javascript">
    $(function() {
      let total = 0
      for (let i = 0; i < cartList.length; ++i) {
        total += cartList[i].price * cartList[i].num
        $('#result').append(`
				<tr>
					<td>${i+1}</td>
					<td><img src="../images/${cartList[i].img}" style="width: 160px"></td>
					<td class="name">${cartList[i].name}</td>
					<td>${cartList[i].price} triệu</td>
					<td>${cartList[i].num}</td>
					<td>${cartList[i].price*cartList[i].num} triệu</td>
          <!-- <td><button class="btn btn-danger" onclick="deleteItem(${cartList[i].id})">Delete</button></td> --> 
				</tr>`)
      }
      $('#total_money').html('Tổng cộng: ' + total + ' triệu')
    })
  </script>
  <script>
    // js for sticky navbar

    cartList.length >= 1 ? (window.addEventListener('scroll', () => {
      if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        $('header').addClass('sticky')
      } else {
        $('header').removeClass('sticky')
      }
    })) : ''

    $('.header-search').hide()
  </script>

</body>

</html>