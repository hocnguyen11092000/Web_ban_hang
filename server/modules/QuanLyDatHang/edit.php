<?php
$sql_sua_dathang = "SELECT * FROM `dathang`, `khachhang` WHERE khachhang.MSKH = dathang.MSKH AND dathang.SoDonDH = $_GET[id]";
$query_sua_dathang = mysqli_query($mysqli, $sql_sua_dathang);
?>
<style>
  .imgBox {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 200px;
    margin-top: 20px;
    border-radius: 5px;
    padding: 10px;
    background-color: #fff;
  }

  img {
    max-width: 100%;
    object-fit: cover;
    border-radius: 5px;
  }
</style>
<div class="wrapper">
  <h1>Trang sửa</h1>
  <div class="form">
    <?php
    while ($row = mysqli_fetch_array($query_sua_dathang)) {
    ?>
      <form action="QuanLyDatHang/code.php?id=<?php echo $row['SoDonDH'] ?>" method="POST">
        <div class="form-group">
          <label>Tên Khách hàng</label>
          <input disabled type="text" name="tenkhachhang" value="<?php echo $row['HoTenKH'] ?>">
        </div>
        <div class="form-group">
          <label>Trạng thái đặt hàng</label>
          <input type="text" name="trangthaidathang" value="<?php echo $row['TrangThaiDH'] ?>">
        </div>
        <div class="form-group">
          <label>Nhân viên chỉnh sửa</label>
          <select name="MSNV">
            <?php
            $sql_nhanvien = "SELECT * FROM `nhanvien`";
            $query_nhanvien = mysqli_query($mysqli, $sql_nhanvien);
            while ($row_nhanvien = mysqli_fetch_array($query_nhanvien)) {
            ?>
              <?php
              if ($row['MSNV'] == $row_nhanvien['MSNV']) {
              ?>
                <option selected value="<?php echo $row_nhanvien['MSNV'] ?>">
                  <?php
                  if ($row_nhanvien['HoTenNV'] == '') {
                    echo "Chọn nhân viên chỉnh sửa";
                  } else {
                    echo $row_nhanvien['HoTenNV'];
                  }
                  ?></option>
              <?php
              } else {
              ?>
                <option value="<?php echo $row_nhanvien['MSNV'] ?>"><?php echo $row_nhanvien['HoTenNV'] ?></option>
              <?php
              }
              ?>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <button class="submit" name="editdathang">Sửa</button>
        </div>
      </form>
    <?php
    }
    ?>
  </div>
</div>