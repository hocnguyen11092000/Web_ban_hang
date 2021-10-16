<style>
  .add-img {
    padding: 10px 12px;
    font-size: 14px;
    color: #fff;
    background-color: rgb(44, 143, 209);
    border-radius: 5px;
    position: relative;
    cursor: pointer;
    top: 45px;
    left: -200px;
    transition: 0.25s ease;
  }

  body {
    overflow-y: hidden;
  }

  .add-img:hover {
    color: rgb(44, 143, 209);
    background-color: #fff;
    border: 1px solid rgb(44, 143, 209);
  }

  input[type='file'] {
    display: none;
  }

  img {
    margin: 50px 0;
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
  }
</style>
<div class="wrapper">
  <h1>Trang Thêm Hình ảnh</h1>
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
    <form action="QuanLyAnhHangHoa_copy/code.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Thêm ảnh Hàng Hóa</label>
        <span class="add-img">Thêm ảnh</span>
        <input required type="file" name="anhhanghoa">
        <div>
          <img src="../../images/placeholder.png" alt="" class="img">
        </div>
      </div>
      <div class="form-group">
        <label>Chọn hàng hóa</label>
        <select name="loaihanghoa">
          <?php
          $sql_hanghoa = "SELECT * FROM hanghoa ORDER BY MSHH DESC";
          $query_hanghoa = mysqli_query($mysqli, $sql_hanghoa);
          while ($row_hanghoa = mysqli_fetch_array($query_hanghoa)) {
          ?>
            <option value="<?php echo $row_hanghoa['MSHH'] ?>"><?php echo $row_hanghoa['TenHH'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <button class="submit" name="addAnhsanpham">Thêm</button>
      </div>
    </form>
  </div>
</div>
<script>
  const addImg = document.querySelector('.add-img')
  const inputFile = document.querySelector('input[type="file"]')
  const img = document.querySelector('.img')
  inputFile.onchange = () => {
    img.src = `../../images/${inputFile.value.split('\\')[2]}`
  }

  addImg.onclick = () => {
    inputFile.click()
  }
</script>