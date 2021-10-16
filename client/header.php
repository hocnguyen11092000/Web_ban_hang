<header class="header">
  <div class="grid wide">
    <div class="row">
      <div class="header-container col l-12 m-12 c-12">
        <a class="header-logo" href="index.php">shop</a>
        <ul class="header-list">
          <li class="header-item"><a href="index.php">Trang chủ</a></li>
          <?php
          include('../server/config/config.php');
          $sql_loaihanghoa = "SELECT * FROM `loaihanghoa`";
          $query_loaihanghoa = mysqli_query($mysqli, $sql_loaihanghoa);

          while ($row_loaihanghoa = mysqli_fetch_array($query_loaihanghoa)) {
          ?>
            <li class="header-item"><a href="category.php?id=<?php echo $row_loaihanghoa['MaLoaiHang'] ?>"><?php echo $row_loaihanghoa['TenLoaiHang'] ?></a></li>
          <?php
          } ?>
          <span class="line"></span>
        </ul>
        <div class="header-group">
          <div class="header-search"><img src="../images/search.png"></div>
          <div class="header-cart"><a href="checkout.php"><img src="../images/cart.png"><span class="count">0</span></a></div>
        </div>
      </div>
    </div>
  </div>
</header>

<?php
// session_start();
$cart = '[]';
if (isset($_COOKIE['cart'])) {
  $cart = $_COOKIE['cart'];
}
?>

<script>
  let countNum = 0
  cartList = [...JSON.parse('<?php echo $cart ?>')]
  cartList.forEach((item) => {
    countNum += item.num
  })
  document.querySelector('.count').innerText = countNum
</script>