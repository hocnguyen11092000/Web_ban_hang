<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanh toán thành công</title>
  <link rel="stylesheet" href="./css/grid.css">
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
            <h2>Cám ơn bạn đã đặt hàng từ shop của chúng tôi</h2>
            <h3 class="contact">Mọi thắc mắc liên hệ đến hotline: 036363636</h3>
          </div>
          <div class="status">
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include('./footer.php');
  ?>
</body>

</html>