<div class="wrapper">
  <h1>Trang Thêm Loại hàng hóa</h1>
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
  <div class="form">
    <form action="QuanLyLoaiHangHoa/code.php" method="POST">
      <div class="form-group">
        <label>Tên loại hàng hóa</label>
        <input required type="text" name="tenloaihanghoa" placeholder="Nhập tên hàng hóa:...">
      </div>
      <div class="form-group">
        <button class="submit" name="addloaisanpham">Thêm</button>
      </div>
    </form>
  </div>
</div>