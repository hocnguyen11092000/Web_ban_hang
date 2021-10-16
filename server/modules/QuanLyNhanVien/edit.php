<?php
$sql_sua_nhanvien = "SELECT * FROM `nhanvien` WHERE MSNV = '$_GET[idnhanvien]' LIMIT 1";
$query_sua_nhanvien = mysqli_query($mysqli, $sql_sua_nhanvien);
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
    while ($row = mysqli_fetch_array($query_sua_nhanvien)) {
    ?>
      <form action="QuanLyNhanVien/code.php?idnhanvien=<?php echo $row['MSNV'] ?>" method="POST">
        <div class="form-group">
          <label>Tên Nhân Viên</label>
          <input type="text" name="tennhanvien" placeholder="Nhập tên nhân viên:..." value="<?php echo $row['HoTenNV'] ?>">
        </div>
        <div class="form-group">
          <label>Chức Vụ</label>
          <input type="text" name="chucvu" placeholder="Nhập chức vụ:..." value="<?php echo $row['ChucVu'] ?>">
        </div>
        <div class="form-group">
          <label>Địa Chỉ</label>
          <input type="text" name="diachi" placeholder="Nhập địa chỉ:..." value="<?php echo $row['DiaChi'] ?>">
        </div>
        <div class="form-group">
          <label>Số Điện Thoại</label>
          <input type="text" name="sodienthoai" placeholder="Nhập số điện thoại:..." value="<?php echo $row['SoDienThoai'] ?>">
        </div>
        <div class="form-group">
          <button class="submit" name="editnhanvien">Sửa</button>
        </div>
      </form>
    <?php
    }
    ?>
  </div>
</div>