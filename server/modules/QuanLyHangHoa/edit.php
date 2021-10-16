<?php
$sql_sua_hh = "SELECT * FROM hanghoa WHERE MSHH='$_GET[idhanghoa]' LIMIT 1";
$query_sua_hh = mysqli_query($mysqli, $sql_sua_hh);
?>
<div class="wrapper">
  <h1>Trang sửa</h1>
  <div class="form">
    <?php
    while ($row = mysqli_fetch_array($query_sua_hh)) {
    ?>
      <form action="QuanLyHangHoa/code.php?idhanghoa=<?php echo $row['MSHH'] ?>" method="POST">
        <div class="form-group">
          <label>Tên Hàng Hóa</label>
          <input type="text" name="tenhanghoa" placeholder="Nhập tên hàng hóa:..." value="<?php echo $row['TenHH'] ?>">
        </div>
        <div class="form-group">
          <label>Quy cách</label>
          <textarea name="quycach">
          <?php echo $row['QuyCach'] ?>
          </textarea>
        </div>
        <div class="form-group">
          <label>Nhập giá</label>
          <input type="text" name="gia" placeholder="Nhập giá:..." value="<?php echo $row['Gia'] ?>">
        </div>
        <div class="form-group">
          <label>Nhập số lượng</label>
          <input type="text" name="soluong" placeholder="Nhập số lượng:..." value="<?php echo $row['SoLuongHang'] ?>">
        </div>
        <div class="form-group">
          <label>Chọn loại hàng hóa</label>
          <select name="loaihanghoa">
            <?php
            $sql_loaihanghoa = "SELECT * FROM loaihanghoa ORDER BY MaLoaiHang DESC";
            $query_loaihanghoa = mysqli_query($mysqli, $sql_loaihanghoa);
            while ($row_loaihanghoa = mysqli_fetch_array($query_loaihanghoa)) {
            ?>
              <?php
              if ($row['MaLoaiHang'] == $row_loaihanghoa['MaLoaiHang']) {
              ?>
                <option selected value="<?php echo $row_loaihanghoa['MaLoaiHang'] ?>"><?php echo $row_loaihanghoa['TenLoaiHang'] ?></option>
              <?php
              } else {
              ?>
                <option value="<?php echo $row_loaihanghoa['MaLoaiHang'] ?>"><?php echo $row_loaihanghoa['TenLoaiHang'] ?></option>
              <?php
              }
              ?>

            <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <button class="submit" name="edithanghoa">Sửa</button>
        </div>
      </form>
    <?php
    }
    ?>
  </div>
</div>