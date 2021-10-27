<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="icon" href="../images/logo.png">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/grid.css">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <?php
  include('./header.php')
  ?>

  <?php
  session_start();
  include('../server/config/config.php');
  ?>
  <main id="main">
    <div class="grid wide">
      <div class="main__slider">
        <div class="left-slider">
          <div class="imgBox">
            <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/b7/2d/35/4911b2039ae6d46290b536203d386190.png.webp" alt="">
            <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/1a/b3/fd/93e79ca0845b3d57df6b2ab4c219501d.png.webp" alt="">
            <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/1f/20/09/a4fff72a70a2f31616751f79e4adf4d0.jpg.webp" alt="">
            <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/2a/4d/b7/6241d711d85091c321bedce793cff6cc.png.webp" alt="">
          </div>
          <div class="slider-control-pre">
            <img src="https://salt.tikicdn.com/ts/upload/6b/59/c2/b61db5f1c32cfdc6d75e59d4fac2dbe8.png" alt="">
          </div>
          <div class="slider-control-next">
            <img src="https://salt.tikicdn.com/ts/upload/6b/59/c2/b61db5f1c32cfdc6d75e59d4fac2dbe8.png" alt="">
          </div>
        </div>
        <div class="right">
          <div class="imgBox">
            <img src="https://salt.tikicdn.com/cache/w400/ts/banner/88/04/ba/79901fbb61afb84eb29ecb5f5331ec7a.png.webp" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="wrapper">
      <div class="productSlider-control-pre">
        <i class="fas fa-angle-left"></i>
      </div>
      <div class="productSlider-control-next">
        <i class="fas fa-angle-right"></i>
      </div>
      <h2 class="hot-product">Sản phẩm hot: </h2>
      <div class="slider">
        <div class="productSlider">

          <?php
          $sql_lietke_hh = "SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.MSHH DESC LIMIT 0, 8";
          $query = mysqli_query($mysqli, $sql_lietke_hh);

          while ($row = mysqli_fetch_array($query)) {
          ?>
            <div class="product">
              <div class="product-container">
                <div class="product__img">
                  <a href="detail.php?id=<?php echo $row['MSHH'] ?>">
                    <img src="../images/<?php echo $row['TenHinh'] ?>" alt="">
                  </a>
                </div>
                <a class="product__name" href="detail.php?id=<?php echo $row['MSHH'] ?>">
                  <p>
                    <?php echo $row['TenHH'] ?>
                  </p>
                </a>
                <p class="product__price">
                  <?php echo $row['Gia'] . ' trieu' ?>
                </p>
              </div>

            </div>
          <?php
          }
          ?>

        </div>
      </div>
      <div class="grid wide">
        <h2 class="product-heading">
          Danh sách sản phẩm:
        </h2>

        <?php

        if (isset($_GET['q'])) {
          $sql_count = 'SELECT COUNT(hanghoa.MSHH) AS "soluong" FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH AND hanghoa.TenHH LIKE "%' . $_GET['q'] . '%" ORDER BY hanghoa.MSHH DESC ';
          $query_count = mysqli_query($mysqli, $sql_count);
          $row_count = mysqli_fetch_array($query_count);
          $count = $row_count['soluong'];

          if (isset($row_count)) {
            echo "<span class='search-count'>Tìm thấy '" . $count . "' sản phẩm</span>";
          }
        }
        ?>
        <div class="row product-list" id="result">
          <?php

          if (isset($_GET['q'])) {
            $sql_lietke_hh = 'SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH AND hanghoa.TenHH LIKE "%' . $_GET['q'] . '%" ORDER BY hanghoa.MSHH DESC ';
          } else {
            $sql_lietke_hh = "SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.MSHH DESC LIMIT 0, 8";
          }

          $query = mysqli_query($mysqli, $sql_lietke_hh);

          while ($row = mysqli_fetch_array($query)) {
          ?>
            <div class="product col l-3 m-4 c-12">
              <div class="product-container">
                <div class="product__img">
                  <a href="detail.php?id=<?php echo $row['MSHH'] ?>">
                    <img src="../images/<?php echo $row['TenHinh'] ?>" alt="">
                  </a>
                </div>
                <a class="product__name" href="detail.php?id=<?php echo $row['MSHH'] ?>">
                  <p>
                    <?php echo $row['TenHH'] ?>
                  </p>
                </a>
                <p class="product__price">
                  <?php echo $row['Gia'] . ' trieu' ?>
                </p>
              </div>
            </div>
          <?php
          }
          ?>

        </div>
        <p style="text-align:center" class="load"><a href="#loadMore" onclick="loadMore()" id="load-more">Load More</a></p>
      </div>
    </div>
    <div class="search-product" id="search-form">
      <form action="index.php" method="GET">
        <input type="text" name="q" placeholder="Tìm kiếm...">
      </form>
    </div>
    <div class="icon-close">
      <i class="fas fa-times"></i>
    </div>
  </main>

  <?php
  include('./footer.php')
  ?>
  <script src="./js/main.js"></script>
  <script>
    let currentPage = 1
    let height = 0

    //Gọi ajax để lấy dữ liệu
    const loadMore = () => {

      currentPage++
      let btn = $('#load-more').innerText = ''
      btn = $('#load-more').innerHTML = '<span></span>'

      setTimeout(() => {

        const span_loadMore = $('#load-more span')
        span_loadMore.style.display = 'none'
        btn = $('#load-more').innerText = 'Load More'

        fetch('loadProduct.php?page=' + currentPage)
          .then((respone) => {
            return respone.json()
          })
          .then((data) => {
            console.log(data);

            //Kiểm tra mảng rỗng
            if (Object.entries(data).length === 0) {
              $('.load').style.display = 'none'
            } else {
              productList = data

              if (productList.length <= 8) {
                $('.load').style.display = 'none'
              }

              for (let i = 0; i < productList.length; i++) {
                const result = $('#result').innerHTML += `
                <div class="product col l-3 m-4 c-12">
                  <div class="product-container">
                    <div class="product__img">
                      <a href="detail.php?id=${productList[i]['MSHH']}">
                        <img src="../images/${productList[i]['TenHinh']}" alt="">
                      </a>
                    </div>
                    <a class="product__name" href="detail.php?id=${productList[i]['MSHH']}">
                      <p>
                        ${productList[i]['TenHH']}
                      </p>
                    </a>
                    <p class="product__price">
                      ${productList[i]['Gia']} triệu
                    </p>
                  </div>
                </div>
            `
              }
            }
          })
          .then(() => {
            height++
            window.scroll({
              top: 1520 * height,
              behavior: 'smooth'
            });
          })
      }, 1000)
    }

    if (window.location.href.includes('?q=')) {
      $('.load').style.display = 'none'
    }
  </script>
</body>

</html>