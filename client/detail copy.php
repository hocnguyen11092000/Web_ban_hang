<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <title>Detail Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }

    h1 {
      text-align: center;
    }

    p {
      margin: 20px 0;
    }

    .wrapper {
      margin: 50px 0;
    }

    .imgBox {
      width: 100%;
      position: relative;
    }

    .imgBox img {
      width: 100%;
      object-fit: cover;
    }

    input.quanlity {
      max-width: 80px;
      text-align: center;
    }

    i {
      cursor: pointer;
    }

    .add-cart {
      border: none;
      outline: none;
      color: #fff;
      background-color: rgb(26, 148, 255);
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
    }

    .cart {
      position: fixed;
      display: flex;
      flex-direction: column;
      color: #fff !important;
      padding: 30px 20px;
      top: 0;
      right: 0;
      bottom: 0;
      width: 450px;
      transform: translateX(622px);
      transition: 0.3s ease;
      background-color: #bcdefb;
      overflow-y: auto;
    }

    .cart.active {
      transform: translateX(0px);
    }

    .cart__hide {
      position: absolute;
      top: -7px;
      left: -9px;
      width: 30px;
      height: 30px;
      border: none;
      outline: none;
      color: #fff;
      background-color: rgb(26, 148, 255);
      border-radius: 50%;
    }

    .cart__list {
      display: flex;
      flex-direction: column;
    }

    .cart__list .item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      list-style: none;
      background-color: #fff;
      margin-top: 20px;
      color: #333 !important;
      padding: 10px;
      border-radius: 5px;
    }

    .cart__list .item span {
      font-size: 13px;
      display: inline-block;
      padding: 10px;
    }

    .cart__list .item img {
      max-width: 60px;
      object-fit: cover;
    }

    .total {
      text-align: center;
      margin-top: 20px;
    }

    .count-cart {
      font-size: 20px;
      color: #333;
    }

    .watch-cart {
      border: none;
      outline: none;
      color: #fff;
      background-color: rgb(26, 148, 255);
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 13px;
    }

    .delete-item {
      margin-left: 5px;
      color: #fff;
      background-color: rgb(255, 99, 132);
      padding: 5px;
      border-radius: 5px;
      cursor: pointer;
    }

    .check-out {
      margin: 20px 0;
    }

    .checkout {
      padding: 8px 12px;
      border: none;
      outline: none;
      border-radius: 5px;
      background-color: #fff;
      cursor: pointer;
      text-decoration: none;
    }

    .check-out {
      text-align: center;
    }

    .sub__name {
      font-size: 18px;
      font-weight: bold;
    }

    .sub__price {
      font-size: 18px;
      color: rgb(255, 99, 132);
      font-weight: bold;
    }

    .sub__specification img {
      width: 100%;
      object-fit: cover;
    }

    .sub__specification {
      font-size: 15px;
      line-height: 1.4;
      font-weight: 500;
    }

    .sub__specification h2 {
      font-weight: bold;
      margin-top: 50px;
    }

    .short_desc {
      overflow: hidden;
      font-size: 14px;
      line-height: 1.5;
    }

    .short_desc img {
      display: none;
    }

    .sub__quanlity span {
      color: rgb(255, 99, 132);
      font-weight: 600;
    }

    .scroll-top {
      position: fixed;
      bottom: 40px;
      right: 40px;
      width: 40px;
      height: 40px;
      background-color: rgb(26, 148, 255);
      color: #fff;
      font-size: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      cursor: pointer;
    }

    .scroll-top span {
      background-color: rgb(26, 148, 255);
    }
  </style>
</head>

<body>
  <?php
  include('../server/config/config.php');
  ?>
  <?php
  $cart = '[]';
  if (isset($_COOKIE['cart'])) {
    $cart = $_COOKIE['cart'];
  }
  ?>
  <?php
  include('./header.php')
  ?>

  <div class="wrapper">
    <div class="grid wide">
      <div class="row">
        <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql_hh = "SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH AND hanghoa.MSHH = '" . $id . "'";
          $query = mysqli_query($mysqli, $sql_hh);
          $row = mysqli_fetch_array($query);
        }
        ?>
        <div class="col l-6 m-12 c-12">
          <div class="imgBox">
            <img src="../images/<?php echo $row['TenHinh'] ?>" alt="">
          </div>
        </div>
        <div class="col l-6 m-12 c-12">
          <div class="sub">
            <div class="sub__name">
              <p>
                <?php echo $row['TenHH'] ?>
              </p>
            </div>
            <div class="sub__quanlity">
              <p>Số lượng hàng hóa còn lại: <span>
                  <?php echo $row['SoLuongHang'] ?>
                </span></p>
            </div>
            <div class="sub__price">
              <p>
                <?php echo $row['Gia'] . ' triệu' ?>
              </p>
            </div>
            <div class="sub__add-quanlity">
              <input type="text">
            </div>
            <div class="sub__add-cart">
              <button class="add-cart">Thêm vào giỏ hàng</button>
              <span class="watch-cart">
                Xem giỏ hàng
              </span>
            </div>
            <div class="short_desc">
              <p style="font-weight: bold;">Mô tả ngắn</p style="font-weight: bold;">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto placeat voluptatum quis? Beatae
                delectus eos id molestias nam quisquam. Tenetur, unde? Nulla, quidem? Pariatur ad blanditiis veniam illo
                tenetur esse sunt magnam. Mollitia ad dolore similique, suscipit, eum vel modi commodi deleniti
                quibusdam necessitatibus, iusto sed. Consequuntur, quas minima corporis fugiat dignissimos corrupti
                labore aliquam. Eius, doloribus velit provident molestiae porro impedit soluta corrupti consectetur odio
                odit voluptatibus dignissimos earum voluptatum dolorem vel, officia recusandae. Ex, quis! Omnis sit
                quisquam culpa, velit, magni perferendis magnam aut facere eaque suscipit eligendi iste? Quam at quia
                hic, voluptatibus possimus obcaecati vitae, dicta a ipsa vero, omnis repudiandae consequatur
                perferendis? Atque qui, aut illum expedita molestiae sapiente similique vero ab quam quasi, pariatur nam
                perferendis non! Quasi iusto ab voluptates, laboriosam alias mollitia sed autem reiciendis est, fuga
                minima unde officia minus temporibus expedita et aut voluptas ea. Expedita nesciunt harum nobis
                asperiores sit delectus dolorum soluta nulla et doloremque? Id nostrum repellendus excepturi beatae
                voluptatum saepe eius voluptas eligendi ad, aperiam harum odit error pariatur neque laboriosam possimus
                sunt nam quisquam ipsum. Quos cum quam aut consequatur, exercitationem perferendis itaque excepturi sed
                expedita facilis rerum. Repellat aspernatur eveniet deserunt, quod eum iure.</p>
            </div>
          </div>
        </div>
        <div class="col l-12 m-12 c-12">
          <div class="sub__specification">
            <h2>Mô tả chi tiết sản phẩm</p>
              <p>
                <?php echo $row['QuyCach'] ?>
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-top">
    <i class="fas fa-arrow-up"></i>
  </div>
  <div class="cart">
    <h3 style="text-align:center;color:#333">Giỏ hàng</h3>
    <button class="cart__hide" onclick="hide()"><i class="fas fa-times"></i></button>
    <ul class="cart__list">

    </ul>
    <div class="total">
      <span class="count-cart"></span>
    </div>
    <div class="check-out"><a href="checkout.php" class="checkout">Thanh toán</a></div>
  </div>
  <script>
    const cartList = JSON.parse('<?php echo $cart ?>')
  </script>
  <script>
    const addToCart = () => {
      const quanlity = $('.sub__add-quanlity input')
      let addQuanlity = quanlity.value

      const id = '<?php echo $row['MSHH'] ?>'
      const name = '<?php echo $row['TenHH'] ?>'
      const img = '<?php echo $row['TenHinh'] ?>'
      const price = '<?php echo $row['Gia'] ?>'

      let isFind = false
      for (let i = 0; i < cartList.length; i++) {
        if (cartList[i].id == id) {
          cartList[i].num++
          isFind = true
          break
        }
      }
      if (!isFind) {
        cartList.push({
          id,
          img,
          name,
          price,
          'num': 1,
        })
      }

      console.log(cartList)
      const now = new Date();
      const time = now.getTime();
      const expireTime = time + 30 * 24 * 60 * 60 * 1000;
      now.setTime(expireTime);
      document.cookie = "cart=" + JSON.stringify(cartList) + ";path=/;expires=" + now.toUTCString()

      let total = 0
      for (let i = 0; i < cartList.length; i++) {
        total += cartList[i].num
      }
      document.querySelector('.count-cart').innerText = total
      document.querySelector('.count').innerText = total
    }

    //js for sticky navbar

    window.addEventListener('scroll', () => {
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        $('header').classList.add('sticky')
      } else {
        $('header').classList.remove('sticky')
      }
    })
  </script>
  <script src="./js/main-detail.js"></script>
</body>

</html>