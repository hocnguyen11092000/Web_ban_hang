<div class="sidebar">
  <a href="index.php">
    <h3 class="sidebar__heading">
      Dashboard
      <?php
      include('../config/config.php');

      $sql = "SELECT COUNT(SoDonDH) FROM `dathang` WHERE TrangThaiDH = 0";
      $query = mysqli_query($mysqli, $sql);
      $row = mysqli_fetch_array($query);
      $sodonchuaduyet = $row[0];

      echo '<span class="count-order">' . $sodonchuaduyet . '</span>';
      ?>
    </h3>
  </a>
  <ul class="sidebar__list">
    <li class="item">
      <i class="far fa-folder"></i>
      <a href="#">Hàng Hóa</a>
      <ul class="sub">
        <li class="sub-item">
          <a href="index.php?action=themhanghoa">Thêm hàng hóa</a>
        </li>
        <li class="sub-item">
          <a href="index.php?action=danhsachhanghoa&page=1">Danh sách hàng hóa</a>
        </li>
      </ul>
    </li>
    <li class="item">
      <i class="far fa-folder"></i>
      <a href="#">Hình ảnh</a>
      <ul class="sub">
        <!-- <li class="sub-item">
          <a href="index.php?action=themhinhanhhanghoa">Thêm Hình ảnh hàng hóa</a>
        </li> -->
        <li class="sub-item">
          <a href="index.php?action=themhinhanhhanghoatest">Thêm Hình ảnh hàng hóa test</a>
        </li>
        <li class="sub-item">
          <a href="index.php?action=danhsachhinhanhhanghoatest">Danh sách hình ảnh hàng hóa</a>
        </li>
      </ul>
    </li>
    <li class="item">
      <i class="far fa-folder"></i>
      <a href="#">Loại Hàng Hóa</a>
      <ul class="sub">
        <li class="sub-item">
          <a href="index.php?action=themloaihanghoa">Thêm Loại hàng hóa</a>
        </li>
        <li class="sub-item">
          <a href="index.php?action=danhsachloaihanghoa">Danh sách Loại hàng hóa</a>
        </li>
      </ul>
    </li>
    <li class="item">
      <i class="far fa-folder"></i>
      <a href="#">Nhân viên</a>
      <ul class="sub">
        <li class="sub-item">
          <a href="index.php?action=themnhanvien">Thêm Nhân viên</a>
        </li>
        <li class="sub-item">
          <a href="index.php?action=danhsachnhanvien">Danh sách Nhân viên</a>
        </li>
      </ul>
    </li>
    <li class="item">
      <i class="far fa-folder"></i>
      <a href="#">Đặt Hàng</a>
      <ul class="sub">
        <li class="sub-item">
          <a href="index.php?action=danhsachtatcadonhang">Danh sách tất cả đơn hàng</a>
        </li>
        <li class="sub-item">
          <a href="index.php?action=chitietdathang">Danh sách chi tiết đơn hàng</a>
        </li>
        <li class="sub-item">
          <a href="index.php?action=diachikhachhang">Danh sách địa chỉ khách hàng</a>
        </li>
      </ul>
    </li>
  </ul>
</div>