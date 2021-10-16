<style>
  .ck.ck-label.ck-voice-label {
    display: none !important;
  }

  .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
    height: 200px;
  }
</style>
<div class="wrapper">
  <h1>Trang Thêm Hàng Hóa</h1>
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
    <form action="QuanLyHangHoa/code.php" method="POST">
      <div class="form-group">
        <label>Tên Hàng Hóa</label>
        <input required type="text" name="tenhanghoa" placeholder="Nhập tên hàng hóa:...">
      </div>
      <div class="form-group">
        <label>Quy cách</label>
        <textarea required id="editor" name="quycach"></textarea>
      </div>
      <div class="form-group">
        <label>Nhập giá</label>
        <input required type="text" name="gia" placeholder="Nhập giá:...">
      </div>
      <div class="form-group">
        <label>Nhập số lượng</label>
        <input required type="text" name="soluong" placeholder="Nhập số lượng:...">
      </div>
      <div class="form-group">
        <label>Chọn loại hàng hóa</label>
        <select name="loaihanghoa">
          <?php
          $sql_loaihanghoa = "SELECT * FROM loaihanghoa ORDER BY MaLoaiHang DESC";
          $query_loaihanghoa = mysqli_query($mysqli, $sql_loaihanghoa);
          while ($row_loaihanghoa = mysqli_fetch_array($query_loaihanghoa)) {
          ?>
            <option value="<?php echo $row_loaihanghoa['MaLoaiHang'] ?>"><?php echo $row_loaihanghoa['TenLoaiHang'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <button class="submit" name="addsanpham">Thêm</button>
      </div>
    </form>
  </div>
</div>

<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
      console.log(editor);
    })
    .catch(error => {
      console.error(error);
    });
</script>