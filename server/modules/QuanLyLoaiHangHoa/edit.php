<?php
$sql_sua_loai_hh = "SELECT * FROM `loaihanghoa` WHERE MaLoaiHang = '$_GET[idloaihanghoa]' LIMIT 1";
$query_sua_loai_hh = mysqli_query($mysqli, $sql_sua_loai_hh);
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
    while ($row = mysqli_fetch_array($query_sua_loai_hh)) {
    ?>
      <form action="QuanLyLoaiHangHoa/code.php?idloaihanghoa=<?php echo $row['MaLoaiHang'] ?>" method="POST">
        <div class="form-group">
          <label>Tên Loại Hàng Hóa</label>
          <input type="text" name="tenloaihanghoa" placeholder="Nhập tên Loại hàng hóa:..." value="<?php echo $row['TenLoaiHang'] ?>">
        </div>
        <div class="form-group">
          <button class="submit" name="editloaihanghoa">Sửa</button>
        </div>
      </form>
    <?php
    }
    ?>
  </div>
</div>