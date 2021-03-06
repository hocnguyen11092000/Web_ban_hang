<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="icon" href="../images/logo.png">
  <link rel="stylesheet" href="./css/style.css">
  <title>

    <?php
    require_once('../server/config/config.php');
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    }

    $sql_title = "SELECT TenLoaiHang FROM `loaihanghoa` WHERE MaLoaiHang = '" . $id . "'";
    $query_title = mysqli_query($mysqli, $sql_title);
    $row = mysqli_fetch_array($query_title);

    echo $row['TenLoaiHang'];
    ?>

  </title>
  <style>
    .wrapper {
      margin: 50px 0;
      min-height: 540px;
    }

    .heading {
      font-weight: 500;
      margin: 10px 0;
    }

    .sort {
      text-align: right;
      margin-bottom: 15px;
    }

    .sort span {
      margin-left: 10px;
      font-size: 14px;
      color: #333;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .sort span:hover {
      color: rgb(54, 162, 235);
    }

    .sort span.active {
      color: rgb(54, 162, 235);
    }
  </style>
</head>

<body>

  <?php
  include('./header.php')
  ?>
  <div class="wrapper">
    <div class="grid wide">
      <?php

      require_once('../server/config/config.php');
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
      }

      $sql_title = "SELECT TenLoaiHang FROM `loaihanghoa` WHERE MaLoaiHang = '" . $id . "'";
      $query_title = mysqli_query($mysqli, $sql_title);
      $row = mysqli_fetch_array($query_title);

      echo "<h2 class='heading'>" . $row['TenLoaiHang'] . "</h2>";
      ?>
      <div class="row">
        <div class="col l-12 m-12 c-12 sort">
          <span onclick=sortDesc(this) class="sort_desc">Giá cao xuống thấp</span>
          <span onclick=sortAsc(this) class="sort_asc">Giá thấp tới cao</span>
        </div>
      </div>
      <div class="row product-list">
        <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
        }
        $sql_loaihang = "SELECT * FROM `hanghoa`,`hinhhanghoa` WHERE MaLoaiHang = '" . $id . "' and hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.MSHH DESC";
        $query_loaihang = mysqli_query($mysqli, $sql_loaihang);

        while ($row_loaihoang = mysqli_fetch_array($query_loaihang)) {
        ?>
          <div class="product col l-3 m-4 c-12">
            <div class="product-container">
              <div class="product__img">
                <a href="detail.php?id=<?php echo $row_loaihoang['MSHH'] ?>">
                  <img src="../images/<?php echo $row_loaihoang['TenHinh'] ?>" alt="">
                </a>
              </div>
              <a class="product__name" href="detail.php?id=<?php echo $row_loaihoang['MSHH'] ?>">
                <p>
                  <?php echo $row_loaihoang['TenHH'] ?>
                </p>
              </a>
              <p class="product__price">
                <?php echo $row_loaihoang['Gia'] . ' trieu' ?>
              </p>
            </div>

          </div>
        <?php
        }
        ?>

      </div>
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

  <?php
  include('./footer.php');
  ?>

</body>
<script>
  // js for hover nav
  const $ = document.querySelector.bind(document)
  const $$ = document.querySelectorAll.bind(document)

  const nav_item = [...$$('.header-item')]
  const line = $('.line')

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

  // search 
  const search = $('.header-search')
  const iconClose = $('.icon-close')
  iconClose.onclick = function() {
    $('.search-product').style.width = '0'
    this.style.display = 'none'
    document.body.style.overflow = 'auto'
  }

  const searchProduct = () => {
    $('.search-product').style.width = 'auto'
    document.body.style.overflow = 'hidden'
    iconClose.style.display = 'flex'
    let input = $('.search-product input')

    input.style.display = 'block'
  }

  window.location.href.includes('?q=') ? window.scroll({
    'top': 1050,
    'behavior': 'smooth'
  }) : ''

  search.addEventListener('click', searchProduct)
</script>

<script>
  const id = location.search.slice(4)
  const screen = document.querySelector('.product-list')

  const sortDesc = async function(that) {

    that.classList.add('active')
    that.nextElementSibling.classList.remove('active')
    const respone = await fetch(`sortApi.php?id=${id}&price=desc`)
    const data = await respone.json()

    const result = data.map((item, index) => {
      return `
      <div class="product col l-3 m-4 c-12">
            <div class="product-container">
              <div class="product__img">
                <a href="detail.php?id=${item.MSHH}">
                  <img src="../images/${item.TenHinh}" alt="">
                </a>
              </div>
              <a class="product__name" href="detail.php?id=${item.MSHH}">
                <p>
                  ${item.TenHH}
                </p>
              </a>
              <p class="product__price">
                ${item.Gia}  triệu 
              </p>
            </div>

          </div>
      `
    })

    screen.innerHTML = result.join('')
  }
  const sortAsc = async function(that) {

    that.classList.add('active')
    that.previousElementSibling.classList.remove('active')
    const respone = await fetch(`sortApi.php?id=${id}&price=asc`)
    const data = await respone.json()

    const result = data.map((item, index) => {
      return `
      <div class="product col l-3 m-4 c-12">
            <div class="product-container">
              <div class="product__img">
                <a href="detail.php?id=${item.MSHH}">
                  <img src="../images/${item.TenHinh}" alt="">
                </a>
              </div>
              <a class="product__name" href="detail.php?id=${item.MSHH}">
                <p>
                  ${item.TenHH}
                </p>
              </a>
              <p class="product__price">
                ${item.Gia}  triệu 
              </p>
            </div>

          </div>
      `
    })

    screen.innerHTML = result.join('')
  }
</script>

</html>