<div class="wrapper">
  <h1>Trang Thêm Nhân Viên</h1>
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
    <form action="QuanLyNhanVien/code.php" method="POST">
      <div class="form-group">
        <label>Tên Nhân Viên</label>
        <input required type="text" name="tennhanvien" placeholder="Nhập tên nhân viên:...">
      </div>
      <div class="form-group">
        <label>Chức Vụ</label>
        <input required type="text" name="chucvu" placeholder="Nhập tên chức vụ:...">
      </div>
      <div class="form-group">
        <label>Địa Chỉ</label>
        <input required type="text" name="diachi" placeholder="Nhập địa chỉ:...">
      </div>
      <div class="form-group">
        <label>Số Điện Thoại</label>
        <input required type="text" name="sodienthoai" placeholder="Nhập số số điện thoại:...">
      </div>
      <div class="form-group">
        <button class="submit" name="addnhanvien">Thêm</button>
      </div>
    </form>
  </div>
</div>

</html>